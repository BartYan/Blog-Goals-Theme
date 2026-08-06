# Blog Goals — dokumentacja motywu (baza pod przyszłe projekty)

Ten plik dokumentuje motyw jako punkt wyjścia do kolejnych projektów WP — co tu jest, jak działa i na co uważać przy starcie nowego projektu na tej bazie.

**Sposób reużycia (ustalony):** nowy projekt startuje z kopii **całej instalacji** (pliki + baza danych) zrobionej wtyczką All-in-One WP Migration, a nie z samego katalogu motywu. W praktyce oznacza to, że wszystko, co żyje w bazie danych (ACF, definicje CPT/taksonomii zarejestrowane przez UI, treść) **jedzie razem z kopią** i nie wymaga ręcznego odtwarzania. Realnej pracy przy starcie nowego projektu wymaga tylko to, co jest zaszyte na sztywno w plikach PHP/JS/SCSS motywu — pełna lista w §12.

---

## 1. Tożsamość motywu

|                            |                                                                        |
| -------------------------- | ---------------------------------------------------------------------- |
| **Katalog motywu**         | `blog-goals`                                                           |
| **Theme Name (style.css)** | `Blog Goals`                                                           |
| **Theme URI**              | `https://blog-goals.com`                                               |
| **Opis (style.css)**       | „Motyw bazowy WordPress — punkt wyjścia do kolejnych projektów.”       |
| **Wersja**                 | 1.0                                                                    |
| **Stała katalogu**         | `BLOGGOALS_THEME_DIR`, `BLOGGOALS_THEME_URL` (`functions.php`)         |
| **`<title>`**              | „Blog Goals!” (`header.php`, na sztywno)                               |
| **Stopka**                 | „Copyright © Blog Goals - Web Design by blog-goals.com” (`footer.php`) |

✅ **Placeholdery zamiast realnych danych klienta**: `about.php`, `news.php`, `privacypolicy.php` oraz linki social w `header.php`/`404.php` nie zawierają już treści/danych osobowych „Wyprawiam Dobre” — zastąpione neutralnym tekstem placeholder i domeną `blog-goals.com`. Treść oznaczoną `[nawiasami kwadratowymi]` trzeba uzupełnić przy starcie nowego projektu (patrz §12).

---

## 2. Wymagane pluginy (środowisko WP, nie pliki motywu)

Zainstalowane w `wp-content/plugins` na tej instalacji:

- **Advanced Custom Fields PRO** — silnik pól niestandardowych, layoutów elastycznych, opcji itd. (wymagane, motyw jest z tym mocno zrośnięty)
- **Advanced Custom Fields** (darmowa wersja obok PRO — do weryfikacji, czy potrzebna równolegle)
- **Akismet** — antyspam do komentarzy
- **All-in-One WP Migration** + **Unlimited Extension** — migracja/eksport całej instalacji (baza + pliki)
- **LiteSpeed Cache** — cache serwerowy
- **Polylang** — wielojęzyczność (plugin zainstalowany, ale **w kodzie motywu nie ma żadnej integracji** — brak `pll_e()`, przełącznika języka w markupie itp. Flagi `img/uk.png`, `img/uk-large.png`, `img/poland.png` istnieją jako assety, ale jedyne odwołania do nich w PHP są zakomentowane w `404.php` i `about.php`)

Motyw **nie ma własnego CPT UI ani żadnego pluginu rejestrującego treści** — patrz sekcja 4.

---

## 3. Build / workflow frontendu

Brak `package.json`, `gulpfile`, `webpack.config` — **nie ma zbudowanego toolchaina JS/CSS**. Jedyna komenda do budowania stylów:

```
sass --watch sass:css
```

- Źródło stylów: `sass/` (Sass/SCSS, architektura 7‑1-podobna: `abstracts/`, `base/`, `components/`, `layout/`, `pages/`, `sections/`, wejściowy `sass/style.scss`).
- Kompilacja do: `css/style.css` (+ `.min.css`, `.map`) — ręcznie przez Dart Sass CLI (`sass --watch sass:css`) z terminala.
- `style.css` w katalogu głównym to **plik nagłówkowy WP** (metadane motywu) — osobny od `css/style.css` (skompilowany CSS). Oba są wpięte w `header.php`.
- Brak lintera/formattera JS, brak minifikacji JS — pliki `.js` w `js/` są ładowane pojedynczo, ręcznie w `footer.php`, bez bundlera.
- Cache-busting robiony ręcznie przez query string w linku (`?2`, `?3`, `?25` itd. w `<script src>`/`<link>`), nie automatycznie.

---

## 4. Model treści: Custom Post Type i taksonomia

Zdefiniowane w kodzie motywu (`libs/posttypes.php`):

- **CPT `topics`** („Posty Tematyczne”) — publiczny, archiwum włączone, wspiera title/editor/author/thumbnail/excerpt/comments/custom-fields.
- **Taksonomia `topic-type`** (hierarchiczna, dla `topics`).

To jedyny customowy content model, którego motyw obecnie używa — reszta treści to standardowe WP `post`/`page`.

---

## 5. ACF — pola i struktura (w bazie, nie w kodzie)

Brak katalogu `acf-json/` w motywie — grupy pól są zdefiniowane przez UI w adminie i żyją w bazie danych, nie w kodzie. Kod motywu tylko je *konsumuje* (`get_field`, `get_sub_field`, `have_rows`). **To nie problem** przy ustalonym sposobie reużycia (§0/intro) — kopia bazy danych niesie te definicje ze sobą. Poniższy inwentarz pól to dokumentacja tego, co faktycznie istnieje, przydatna np. gdy trzeba coś odtworzyć ręcznie w wyjątkowej sytuacji (np. świeża instalacja bez kopii bazy):

### 5.1 Strona opcji (Options Page)

Rejestrowana w `functions.php` (`acf_add_options_page()`):

- `social_media` (repeater/pole na Options page) — pola podrzędne: `name`, `link`, `image`. Renderowane w `footer.php` (lista social media).
- Pole `logo` przypisane do **obiektu menu nawigacyjnego** (`get_field('logo', $menu)`) — logo w headerze.

### 5.2 Elastyczny layout stron (`flexible_content`)

Renderowany przez wspólny partial `template-parts/flexible-content.php`, includowany z dwóch szablonów: `home_content.php` (Template Name: Home Page) i `single-topics.php`. Dostępne layouty (`get_row_layout()`):

| Layout                  | Pola podrzędne                                                                                                           |
| ----------------------- | ------------------------------------------------------------------------------------------------------------------------ |
| `hero`                  | `background_image`, `background_color`, `title`, `description`, `text_color`, `button` (link)                            |
| `highlight_overlay`     | `background_image`, `overlay_color`, `title`, `description`, `text_color`, `button`                                      |
| `image_and_text`        | `image`, `background_color`, `title`, `description`, `text_color`, `button`                                              |
| `large_text_banner`     | `background_color`, `title`, `small_text`, `text_color`                                                                  |
| `section_title`         | `title_section`                                                                                                          |
| `cards_section`         | `cards` (repeater: `title`, `image`, `desc`, `button`)                                                                   |
| `icon_cards_section`    | `cards` (repeater: `image`, `title`, `desc`, `button`)                                                                   |
| `subject_posts_section` | `subject_posts` (relacja do postów) + per-post pole `hero_img`                                                           |
| `blog_posts_section`    | flaga `blog_posts` (bool/checkbox „czy pokazać”) + auto-pobranie 4 najnowszych `post` + per-post `hero_img` + `post_tag` |
| `half_and_half`         | `layout_position`, `image`, `title`, `description`, `button`, `text_position`                                            |

### 5.3 Pole `topics` (CPT)

- `hero_img` (image, miniatura na kartach `postcard`)

**Uwaga:** żadna z powyższych grup pól nie ma odpowiednika w kodzie (`acf_add_local_field_group`) — to tylko odczyt nazw pól z szablonów. Nie eksportujemy ich do JSON — przy ustalonym sposobie pracy (kopia całej instalacji + bazy) nie ma takiej potrzeby.

---

## 6. AJAX

Motyw obecnie **nie ma żadnego mechanizmu AJAX**. Jeśli w nowym projekcie będzie potrzebny filtr archiwum przez AJAX, standardowy wzorzec: handler w `functions.php` na hookach `wp_ajax_{action}` / `wp_ajax_nopriv_{action}`, JS przez `$.ajax` + `wp_localize_script` do przekazania `admin_url('admin-ajax.php')`.

---

## 7. Karuzele / JS / interakcje frontendowe

### Karuzele — dwie równoległe implementacje

1. **Slick Carousel 1.8.1** (`slick-1.8.1/` — pełny zrzut biblioteki z GitHuba, własny `README`, `LICENSE`, `bower.json` itd.). Podłączony w:
   - `header.php` — CSS (`slick.css`, `slick-theme.css`)
   - `footer.php` — JS: jQuery 3.6.0 (CDN) + `slick.min.js` + `js/slick-carousel.js`
   - `js/slick-carousel.js` — inicjalizacja `$('.carousel').slick({...})` (autoplay 10s, infinite, lazyLoad on-demand; warianty responsywne są zakomentowane).
2. **Własna, ręczna karuzela** — `js/carousel.js` (vanilla JS, `translateX` na `.carousel_slider`, klony pierwszego/ostatniego slajdu do efektu infinite, przyciski `#prevBtn`/`#nextBtn`). **Obecnie wyłączona** — `<script>` w `footer.php` jest zakomentowany, klasa `.carousel_slider` nie jest renderowana w żadnym aktywnym szablonie. Gotowy wzorzec „karuzeli bez zależności” do ew. ponownego użycia.

### Pozostałe skrypty (`js/`, ładowane pojedynczo w `footer.php`)

| Plik                   | Rola                                                                                                                 |
| ---------------------- | ---------------------------------------------------------------------------------------------------------------------- |
| `cookies.js`           | baner/obsługa cookies                                                                                                |
| `searchRoller.js`      | animacja/rotacja w polu wyszukiwania                                                                                 |
| `overlays.js`          | hamburger + overlay menu mobilnego (toggle `.nav_hamburger` / `#overlay_menu`)                                       |
| `backToTopButton.js`   | przycisk „do góry” — JS istnieje, ale markup przycisku w `footer.php` jest zakomentowany, więc obecnie nic nie robi  |
| `activeLink_filter.js` | podświetlanie aktywnego linku menu                                                                                   |
| `imgCopyDisabled.js`   | blokada kopiowania/prawego klawisza na obrazkach                                                                     |

---

## 8. Struktura szablonów PHP

| Plik                                  | Typ                         | Uwagi                                                                                                                                    |
| ------------------------------------- | ---------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------ |
| `index.php`                           | fallback WP                  | pusta sekcja, minimalna zawartość                                                                                                        |
| `header.php` / `footer.php`           | części wspólne               | zawierają nav (desktop+mobile+overlay), enqueue CSS/JS na sztywno (bez `wp_enqueue_*`)                                                   |
| `comments.php`                        | szablon komentarzy           | callback: `bloggoals_comment_theme()` z `functions.php`                                                                                  |
| `searchform.php`                      | formularz wyszukiwania       | prosty `GET` na `s`                                                                                                                      |
| `search.php`                          | wyniki wyszukiwania          | własna logika przez `getQueryParams()`/`title_like_posts_where` (LIKE po tytule, z `libs/utils.php`); karty renderowane przez `template-parts/post-card.php` |
| `404.php`                             | `Template Name: 404`         | **to jest page template**, nie natywny plugin/hierarchy fallback `404.php` — trzeba go ręcznie przypisać stronie w adminie               |
| `about.php`                           | `Template Name: O Nas`       | strona „o nas”, treść firmowa na sztywno wpisana w PHP (nie z WYSIWYG)                                                                   |
| `news.php`                            | `Template Name: Newsletter`  | treść marketingowa na sztywno w PHP                                                                                                      |
| `privacypolicy.php`                   | `Template Name: Polityka Prywatności` | treść prawna na sztywno w PHP, z realnymi danymi osobowymi/adresem — **do wymiany przy nowym projekcie**                        |
| `home_content.php`                    | `Template Name: Home Page`   | includuje `template-parts/flexible-content.php` (patrz §5.2)                                                                             |
| `single-topics.php`                   | szablon `topics`             | includuje `template-parts/flexible-content.php`                                                                                          |
| `template-parts/flexible-content.php` | partial                      | wspólna logika 10 layoutów `flexible_content`, używana przez `home_content.php` i `single-topics.php`                                    |
| `template-parts/post-card.php`        | partial                      | generyczna karta posta (miniaturka, tytuł, skrócony excerpt) — używana w `search.php`                                                    |
| `single.php`                          | szablon domyślnych postów (`post`) | prosty layout z miniaturą i treścią                                                                                                |
| `archive-topics.php`                  | archiwum `topics`            | lista postów `topics` jako `postcard`                                                                                                    |

---

## 9. `functions.php` — spis funkcji

| Funkcja / hook                                            | Co robi                                                                                       |
| --------------------------------------------------------- | --------------------------------------------------------------------------------------------- |
| `my_filter_head()`                                        | usuwa `_admin_bar_bump_cb` z `wp_head` (naprawia odstęp po adminbarze)                        |
| `search_query_fix()`                                      | jeśli `?s=` puste, podstawia frazę „brak wpisów” (żeby wyszukiwarka nie zwracała wszystkiego) |
| `register_nav_menus()`                                    | jedna lokalizacja: `main_nav` → „Main Menu”                                                   |
| `bloggoals_comment_theme()`                                | custom render komentarza (podpięty w `comments.php`)                                          |
| `acf_add_options_page()` + `acf_set_options_page_title()` | strona opcji ACF „Theme Options”                                                              |
| `cc_mime_types()`                                          | dopuszcza upload SVG do biblioteki mediów                                                     |
| `ini_set(...)` na końcu                                    | podnosi limity uploadu/pamięci/czasu wykonania (64M upload, 256M memory, 300s)                |

`libs/utils.php` (dołączany osobno): `the_excerpt_max_charlength()`, `cutText()` (przycinanie tekstu po słowach), `getQueryParams()`/`getQuerySingleParam()`/`getCurrentPageUrl()`, filtr `posts_where` → `title_like_posts_where()` (LIKE po tytule, używane w `search.php`).

---

## 10. Assety statyczne

- `img/` — głównie SVG (ikony, wzory, liście, gwiazdki) + kilka PNG (flagi, `blueberry.svg`). **`img/photos/` jest referencjonowane w `about.php` i `404.php`, ale katalog fizycznie nie istnieje** — brakujące zdjęcia (`sesja3.png`, `sesja5.png` itd.), trzeba je dostarczyć w nowym projekcie.
- `screenshot.png` — obecny (600×450), używany przez WP w Wyglądzie/Motywach.
- Typografia działa na Google Fonts ładowanych w `header.php` (`Great Vibes`, `Playfair Display`, `Quicksand`). Zmienne `$fontSerif`/`$fontWrite` w `sass/abstracts/_variables.scss` wskazują na nazwy custom fontów (`CreativeVintage`, `FabulousScript`), dla których nie ma plików źródłowych ani `@font-face` — jeśli chcesz ich użyć w nowym projekcie, trzeba dodać pliki fontów i wpisy `@font-face` w `sass/abstracts/_webfonts.scss` (obecnie pusty).

---

## 11. Podsumowanie stacku

- **CMS:** WordPress (klasyczny, PHP templates, brak block themes / FSE, brak `theme.json`)
- **PHP:** proceduralny, bez namespace/autoloadera, bez Composera
- **CSS:** Sass kompilowany ręcznie do `css/`, brak PostCSS/Autoprefixer/preprocessora w pipeline poza samym Sassem
- **JS:** vanilla + jQuery 3.6.0, brak modułów/bundlera, skrypty ładowane liniowo w `footer.php`
- **Treść:** ACF PRO (flexible content jako główny mechanizm layoutu stron), jeden custom post type (`topics`) zdefiniowany w kodzie (patrz §4)
- **Wielojęzyczność:** Polylang zainstalowany, brak integracji w motywie
- **i18n/translacje tekstów:** brak `load_theme_textdomain`, brak plików `.pot/.po/.mo` — wszystkie stringi są po polsku, wpisane na sztywno w kodzie (nie przez `__()`/`_e()`)

---

## 12. Start nowego projektu

Checklista rzeczy do zrobienia przy starcie nowego projektu na bazie tego motywu (branding, placeholdery, braki, decyzje, ogólne ustawienia nowej strony WP) — w osobnym pliku: **`CHECKLIST.md`**.
