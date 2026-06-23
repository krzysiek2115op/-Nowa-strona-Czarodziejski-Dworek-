#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Pobiera zdjęcia 1:1 ze strony czarodziejski-dworek.pl.
Strategia: pobierz realny HTML 7 podstron -> wyłuskaj URL-e z uploads
(src, data-src, srcset, href do lightboxa) -> dla każdego wyznacz
"oryginał" (zdejmij prefiks pagespeed 'x', segment .pagespeed.ic.*,
prefiks resize NxNx, sufiks -150x150 itd.) -> próbuj kandydatów od
najlepszego; zapisz pierwszy działający obraz do assets/img/.
Tworzy manifest.txt (kategoria/strona -> plik)."""
import os, re, sys, urllib.request, urllib.parse, ssl

BASE = "https://www.czarodziejski-dworek.pl"
PAGES = {
    "index": "/", "o-nas": "/o-nas/", "program": "/program/",
    "nauczyciele": "/nauczyciele/", "blog": "/blog/",
    "galeria": "/menu-galeria/", "kontakt": "/kontakt/",
}
OUT = os.path.join(os.path.dirname(os.path.abspath(__file__)), "assets", "img")
os.makedirs(OUT, exist_ok=True)
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE
HDRS = {"User-Agent": "Mozilla/5.0 (archiwizacja zlecenia 1:1)"}

def get(url, binary=False, timeout=40):
    req = urllib.request.Request(url, headers=HDRS)
    with urllib.request.urlopen(req, timeout=timeout, context=ctx) as r:
        data = r.read()
        ct = r.headers.get("Content-Type", "")
        return (data if binary else data.decode("utf-8", "ignore")), ct

URL_RE = re.compile(r'https?://(?:www\.)?czarodziejski-dworek\.pl/wp-content/uploads/[^\s"\'<>()\\]+', re.I)
IMG_EXT = (".jpg", ".jpeg", ".png", ".webp")

def harvest(html):
    found = set()
    for m in URL_RE.finditer(html):
        u = m.group(0)
        # srcset zawiera przecinki + deskryptory szerokości
        for part in re.split(r'[,\s]+', u):
            part = part.strip().rstrip('\\')
            if part.lower().split('?')[0].endswith(IMG_EXT):
                found.add(part.split('?')[0])
    return found

def clean_candidates(url):
    """Zwraca listę URL-i kandydatów od najbardziej 'oryginalnego'."""
    p = urllib.parse.urlsplit(url)
    path = p.path
    if '/' not in path:
        return [url]
    d, base = path.rsplit('/', 1)
    cands = []
    raw = base
    # 1) zdejmij .pagespeed.ic.* (zostaw rozszerzenie sprzed niego)
    mm = re.match(r'^(.*?\.(?:jpg|jpeg|png|webp))\.pagespeed\..*$', base, re.I)
    if mm:
        base = mm.group(1)
    # 2) zdejmij prefiks resize 'NxNx' oraz wiodące 'x'
    base = re.sub(r'^\d+x\d+x', '', base)
    base = re.sub(r'^x', '', base)
    name, ext = os.path.splitext(base)
    # 3) wariant bez sufiksu rozmiaru -WxH lub -WxH przed scaled
    name_nosize = re.sub(r'-\d+x\d+$', '', name)
    # kolejność prób: oryginał bez rozmiaru, oryginał z rozmiarem, surowy
    for nm in [name_nosize, name]:
        for e in [ext, '.jpg', '.png', '.jpeg']:
            cands.append(f"{BASE}{d}/{nm}{e}")
    cands.append(url)  # ostateczny fallback: dokładny URL (pagespeed/webp)
    # unikalne z zachowaniem kolejności
    seen, out = set(), []
    for c in cands:
        if c not in seen:
            seen.add(c); out.append(c)
    return out

def safe_name(url):
    base = url.rsplit('/', 1)[1].split('?')[0]
    base = re.sub(r'\.pagespeed\..*$', '', base)
    base = re.sub(r'^\d+x\d+x', '', base)
    base = re.sub(r'^x', '', base)
    return urllib.parse.unquote(base)

def main():
    all_urls = {}
    for pg, path in PAGES.items():
        try:
            html, _ = get(BASE + path)
        except Exception as e:
            print(f"[!] {pg}: błąd pobrania HTML: {e}"); continue
        urls = harvest(html)
        print(f"[i] {pg}: znaleziono {len(urls)} URL-i obrazów")
        for u in urls:
            all_urls.setdefault(u, set()).add(pg)
    print(f"[i] łącznie unikalnych URL-i: {len(all_urls)}")

    # DEDUP: grupuj warianty rozmiarowe po wyznaczonym oryginale (1. kandydat)
    groups = {}  # klucz_oryginalu -> {"pages": set, "cands": [..]}
    for url, pages in all_urls.items():
        cands = clean_candidates(url)
        key = cands[0]
        g = groups.setdefault(key, {"pages": set(), "cands": cands})
        g["pages"].update(pages)
    print(f"[i] po deduplikacji oryginałów: {len(groups)} zdjęć do pobrania")

    manifest, downloaded, failed = [], {}, []
    for key, g in sorted(groups.items()):
        url, pages = key, g["pages"]
        target = None
        for cand in g["cands"]:
            try:
                data, ct = get(cand, binary=True)
                if data and (ct.startswith("image") or cand.lower().endswith(IMG_EXT)) and len(data) > 800:
                    name = safe_name(cand if not cand.endswith('.webp') else url)
                    # jeśli kandydat to webp pagespeed, użyj nazwy oryginalnej z .webp? zachowaj realne rozszerzenie pliku
                    if cand.lower().endswith('.webp'):
                        name = os.path.splitext(safe_name(url))[0] + '.webp'
                    dest = os.path.join(OUT, name)
                    if os.path.exists(dest) and os.path.getsize(dest) >= len(data):
                        target = name; break
                    with open(dest, 'wb') as f:
                        f.write(data)
                    target = name
                    print(f"  ✓ {name}  <- {cand.split('/uploads/')[1]}  ({len(data)//1024} KB)")
                    break
            except Exception:
                continue
        if target:
            downloaded[url] = target
            manifest.append(f"{target}\t{','.join(sorted(pages))}\t{url.split('/uploads/')[1]}")
        else:
            failed.append(url)
            print(f"  ✗ NIE POBRANO: {url}")

    with open(os.path.join(OUT, "manifest.txt"), "w", encoding="utf-8") as f:
        f.write("# plik_lokalny\tstrony\tzrodlo(uploads/...)\n")
        f.write("\n".join(sorted(manifest)) + "\n")
        if failed:
            f.write("\n# NIE POBRANO:\n" + "\n".join(failed) + "\n")
    print(f"\n=== GOTOWE: pobrano {len(downloaded)}, nie pobrano {len(failed)} ===")
    print(f"Manifest: {os.path.join(OUT,'manifest.txt')}")

if __name__ == "__main__":
    main()
