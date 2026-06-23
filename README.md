# Czarodziejski Dworek — strona WWW

Strona internetowa integracyjnego przedszkola niepublicznego **Czarodziejski Dworek**
(Warszawa, ul. Górczewska 89, Wola). Repozytorium zawiera dwie zsynchronizowane wersje
tej samej strony.

```
.
├─ static-site/       # wersja statyczna (HTML/CSS/JS) — bez zależności, bez budowania
└─ wordpress-theme/   # autorski motyw WordPress (zero wtyczek)
```

Obie wersje mają identyczny wygląd i treść — różnią się tylko technologią.

---

## 1. Wersja statyczna — `static-site/`

Czysty HTML/CSS/JS. Nie wymaga niczego do uruchomienia.

- **Podgląd lokalny:** otwórz `static-site/index.html` w przeglądarce, albo uruchom prosty serwer:
  ```bash
  cd static-site
  python3 -m http.server 8080
  # → http://localhost:8080
  ```
- **Hosting:** pliki można wrzucić na dowolny hosting statyczny (GitHub Pages, Netlify, zwykły serwer WWW).

Struktura: `index.html` + 12 podstron, `assets/` (css, js, img, icons, docs), `favicon.ico`, `og-image.jpg`.

---

## 2. Motyw WordPress — `wordpress-theme/`

Autorski motyw, **bez żadnych wtyczek**. Treści edytowalne natywnie (Customizer + typy treści: kadra, galeria, blog).

- **Instalacja (przez panel):** spakuj zawartość folderu `wordpress-theme/` do pliku `.zip`,
  a następnie w WordPressie: **Wygląd → Motywy → Dodaj nowy → Wyślij motyw** → wgraj ZIP → **Aktywuj**.
- **Instalacja (przez FTP):** skopiuj folder `wordpress-theme/` do `wp-content/themes/` na serwerze i aktywuj w **Wygląd → Motywy**.

### Formularze kontaktowe (Web3Forms)
Trzy formularze (Kontakt, „Oddzwonimy", WWR) wysyłają zgłoszenia na e-mail bez wtyczki i bez bazy danych — przez darmową usługę **Web3Forms**. Aby je uruchomić, trzeba **raz** wkleić darmowy klucz:

1. Wygeneruj klucz na <https://web3forms.com> (podajesz e-mail, na który mają przychodzić zgłoszenia).
2. W panelu: **Wygląd → Dostosuj → Formularze kontaktowe** → pole „Klucz Web3Forms (Access Key)" → **Opublikuj**.

> Klucz **nie jest** zapisany w kodzie — wkleja go właściciel strony w panelu.

---

## Technologia

- HTML5, CSS3, vanilla JavaScript (bez frameworków, bez kroku budowania).
- Responsywność (mobile-first), dostępność (WCAG), dane strukturalne schema.org, meta Open Graph.
- Motyw WordPress: PHP, zero wtyczek, natywny Customizer i własne typy treści.

## Uwagi

- Zdjęcia i dokumenty pochodzą od klienta i są częścią strony.
- Wersję statyczną i motyw WP utrzymuje się równolegle — zmiany wprowadzaj w obu.
