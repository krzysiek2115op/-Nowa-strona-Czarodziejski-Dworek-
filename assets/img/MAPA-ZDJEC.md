# Mapa zdjęć → użycie (dla frontendu)

89 zdjęć pobranych 1:1 ze źródła (oryginały/`-scaled`). `manifest.txt` = surowe mapowanie plik→strony→źródło. Poniżej semantyka. **Frontend: zoptymalizuj wszystko do WebP + `srcset`, `width/height`, lazy poza hero.**

## Logo / brand / favicon
- `długie-logo-większy-tekst.png` — logo poziome z tekstem → nav + stopka
- `LOGO.png`, `LOGO-małe2.png` — warianty logo (zapas, np. nav scrolled / favicon-fallback)
- `cropped-cute_owl.png` — maskotka SOWA → akcent dekoracyjny (nie nadużywać; pasuje do „magicznego" detalu)
- `cropped-android-chrome-512x512-1.png` — ŹRÓDŁO favicon/apple-touch + og-image bazowy

## Hero / tła / ogólne zdjęcia dzieci i sal
- Kandydaci na HERO (ostre, kadr dzieci/sale): `IMG_8789-scaled.jpg`, `12-scaled.jpg`, `P1019177.jpg`, `zdjęcie-w-tle.jpg`, `background-img1.jpg`
- `lat-1-denoised_..._exposure_correction.png` — duża grafika (prawdopodobnie baner/„lata doświadczenia") → sekcja statystyk/hero tło (5.7MB → mocno skompresować)
- `94355495_*`, `94574499_*`, `95486100_*` — zdjęcia z życia przedszkola → sekcja „co u nas słychać"/Instagram, tło recenzji
- `img2.jpg`, `img14-540x510-1.jpg`, `img59-2.jpg`, `img61-2*`, `img62-2*`, `background-img14/16-540x510-1.jpg` — ogólne zajęcia/sale → kafle „co nas wyróżnia", uzupełnienia

## Zajęcia (kafle programu)
- `basen-on3l0yahma...jpg` — **Basen**
- `mapa.jpg` — **Język angielski** (mapa) · `Francja-mapa.png` — **Język francuski**
- `Integracja-sensoryczna.jpg` — **Integracja sensoryczna (SI)**
- `kinesis-fizjoterapia-dzieci-2.png` — **Fizjoterapia**
- `tańce1.png` — **Zajęcia taneczne (PRO-DANCE)**
- `kubki.png` — akcent (kubki) → muzyka/plastyka lub dekoracja
- (Edukacja/Muzyka/Gimnastyka/Joga/Logopedia/Psycholog/TUS/Terapia ped. — brak dedykowanego zdjęcia → użyć ogólnych powyżej lub ikon SVG z design-systemu; ZERO pustych kafli)

## Kadra — portrety (nauczyciele.html)
PEWNE:
- `zdjęcie-biznesowe-A.Mering.png` — **Agnieszka Mering (DYREKTOR)**
- `Natalia.jpg` — **Natalia Łucka**
- `Monika-Sawczuk.png` — **Monika Sawczuk**
PRAWDOPODOBNE (zweryfikuj wizualnie, ostrożnie):
- `p.-Paulina.jpg` — Paulina Chłap · `Olga-J.jpg` — Olga Jakuć · `Anna-J.png` — Anna Jurska
NIEPEWNE PRZYPISANIE (NIE podpisuj błędnie):
- `Ania-w-pracy.jpg`, `DSC_1453-scaled.jpg`, `Nowy-obraz-mapy-bitowej-258x300.jpg`, `IMG_7139.jpg`, `IMG_7141.jpg`, `IMG_7143.jpg`
> Zasada: 18 osób w kadrze, ~12 zdjęć. Dla osób bez pewnego zdjęcia użyj **placeholdera z inicjałami** (komponent z design-systemu, łukowa maska) — eleganckiego, NIE pustego boxa. Nie przypisuj twarzy „na oko".

## Galeria (galeria.html)
- Seria `DSCN2147.jpg … DSCN2178.jpg` (pełna rozdz.) + `DSCN8672-scaled.jpg … DSCN8693-scaled.jpg` → siatka + lightbox. `alt` opisowe wg wytycznych meta-onpage.

## Certyfikaty / pasek zaufania
- `Karta-Dużej-Rodziny.png` — badge „Karta Dużej Rodziny"
- `Certyfikat-NVC.png` — „Certyfikat NVC"

## Blog (blog.html — karty linkujące do żywych wpisów WP)
- `dzień-otwarty.jpg` / `Dzień-otwarty.png` — wpis „Dzień otwarty! 28.02.2026"
- `slajd-smp-2.png` — wpis „Szkoła Myślenia Pozytywnego!"
- wpis francuski → `Francja-mapa.png` lub `mapa.jpg`
