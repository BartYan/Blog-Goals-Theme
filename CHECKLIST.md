# Checklista — start nowego projektu na bazie motywu Blog Goals

## Kontekst

Ten katalog to motyw WordPress **Blog Goals** — świadomie ogólnikowy starter (wcześniej konkretny projekt kulinarny „Wyprawiam Dobre”, oczyszczony i zgenerycyzowany, żeby służyć jako baza pod kolejne projekty).

Pełna dokumentacja architektury (stack, ACF, szablony, JS, SCSS, spis funkcji) jest w **`README.md`** w tym samym katalogu — przeczytaj je najpierw, zanim zaczniesz cokolwiek zmieniać. Ten plik nie duplikuje tamtych informacji, tylko mówi co zrobić przy starcie nowego projektu i na co uważać.

## Sposób pracy z tym motywem (ustalone z userem)

- Nowy projekt zaczyna się od **kopii całej instalacji WP (pliki + baza danych)**, zrobionej wtyczką All-in-One WP Migration — nie od samego katalogu motywu. Baza niesie ze sobą definicje ACF/CPT/taksonomii i realną treść, więc **nie trzeba** ręcznie odtwarzać pól ACF ani eksportować ich do `acf-json`, chyba że user wyraźnie o to poprosi.
- Środowisko lokalne: MAMP. PHP CLI nie jest w domyślnym `PATH` — do lintowania używaj pełnej ścieżki: `/Applications/MAMP/bin/php/php8.2.0/bin/php -l plik.php`.
- Build CSS: `sass --watch sass:css` z terminala. Brak `package.json`/npm/gulp/webpack — nic więcej nie trzeba instalować.
- Brak testów automatycznych i lintera JS. Po każdej zmianie w PHP: `php -l` na dotkniętych plikach + ręczny smoke test (np. `curl` na działający MAMP albo podgląd w przeglądarce) — sprawdź kod 200 i brak `Fatal error`/`Parse error` w odpowiedzi.

## 1. Tożsamość / branding (kod motywu)

- [ ] `style.css` — Theme Name, Theme URI, Author, Opis → dane nowego projektu
- [ ] `header.php` — `<title>Blog Goals!</title>` → nazwa nowego projektu
- [ ] `footer.php` — stopka „Copyright © Blog Goals - Web Design by blog-goals.com” → dane nowego projektu
- [ ] `screenshot.png` — podmień na zrzut nowego projektu (widoczny w Wyglądzie → Motywy w adminie; to nie to samo co Site Icon/favicon, patrz sekcja 6)
- [ ] Stałe `BLOGGOALS_THEME_DIR`/`BLOGGOALS_THEME_URL` w `functions.php` można zostawić bez zmian — to tylko wewnętrzne stałe PHP, nie są widoczne na froncie

## 2. Treść placeholder do uzupełnienia

Wszystkie miejsca oznaczone `[nawiasami kwadratowymi]` — znajdziesz je przez `grep -rn '\[.*\]' *.php`:

- [ ] `about.php` — opis zespołu / historii marki (2 miejsca)
- [ ] `news.php` — opis projektu + 3 punkty korzyści newslettera
- [ ] `privacypolicy.php` — `[Imię i Nazwisko / Nazwa firmy], [adres]` administratora danych. **To musi zawierać prawdziwe dane** — bez tego dokument jest prawnie bezużyteczny. Reszta polityki to ogólny boilerplate RODO/cookies, ale i tak przejrzyj całość pod kątem zgodności z faktycznym przetwarzaniem danych w nowym projekcie (to nie jest porada prawna).

## 3. Linki i domeny placeholder

Wszystkie odwołania do `blog-goals.com` / `bloggoals` — znajdziesz przez `grep -rln "blog-goals.com\|bloggoals" *.php`:

- [ ] `header.php`, `404.php`, `about.php` — linki Facebook/Instagram (`facebook.com/bloggoals`, `instagram.com/bloggoals`) → prawdziwe konta
- [ ] `privacypolicy.php` — domena właściciela + e-mail kontaktowy (`kontakt@blog-goals.com`) → prawdziwe dane
- [ ] `footer.php` — stopka (patrz punkt 1)

## 4. Braki / rzeczy do decyzji (kod motywu)

- [ ] `img/photos/` nie istnieje w repo, a jest referencjonowany w `about.php`/`404.php` — dostarcz zdjęcia albo usuń/zaktualizuj referencje
- [ ] Polylang zainstalowany, ale bez integracji w motywie — zbuduj ją, jeśli projekt ma być wielojęzyczny, albo zignoruj/odinstaluj plugin
- [ ] Brak i18n (`__()`/`_e()`) — jeśli projekt ma wspierać więcej niż polski, trzeba to dobudować od zera
- [ ] `get_header('center')` wołane w kilku szablonach bez istniejącego `header-center.php` (działa przez fallback na `header.php`, ale nazwa myli) — dodaj plik albo ujednolić wywołania do `get_header()`
- [ ] `backToTopButton.js` — JS istnieje, markup przycisku w `footer.php` jest zakomentowany — dodaj z powrotem, jeśli przycisk ma działać
- [ ] `404.php` musi zostać ręcznie przypisany jako strona błędu w Ustawienia → Czytanie (to page template, nie natywny fallback WP)

## 5. Model treści (`topics` CPT)

- [ ] Zdecyduj, czy CPT `topics` / taksonomia `topic-type` („Posty Tematyczne”) pasuje do nowego projektu, czy trzeba go przemianować/zastąpić innym modelem — to jedyny customowy content type zdefiniowany w kodzie (`libs/posttypes.php`)
- [ ] Po sklonowaniu bazy sprawdź w adminie, czy pola ACF dla `topics`, `flexible_content` i strony opcji faktycznie istnieją i renderują się poprawnie. Jeśli baza **nie** została sklonowana (świeża instalacja bez kopii) — trzeba je odtworzyć ręcznie wg inwentarza pól w `README.md` §5.

## 6. Ogólne ustawienia nowej strony WP (admin, niezależne od kodu motywu)

Rzeczy, które trzeba zrobić przy każdym nowym kliencie/projekcie, niezależnie od tego, co jest w kodzie motywu:

- [ ] **Site Icon / favicon** — Ustawienia → Ogólne → Ikona strony. To co innego niż `screenshot.png` (sekcja 1) — favicon widać w karcie przeglądarki i wynikach wyszukiwania, screenshot tylko w adminie WP.
- [ ] **Obrazek do social media (Open Graph / og:image, Twitter Card)** — motyw **nie ma** wbudowanych meta tagów Open Graph. Trzeba je dodać ręcznie w `header.php` (`og:title`, `og:description`, `og:image`) albo przez plugin SEO (Yoast/RankMath/SEOPress), inaczej udostępnianie linku na Facebooku/Messengerze/Twitterze pokaże się bez obrazka lub z losowym.
- [ ] **Tytuł i opis strony** — Ustawienia → Ogólne (Site Title, Tagline). Uwaga: `<title>` w tym motywie jest zaszyty na sztywno w `header.php` (sekcja 1), więc samo to ustawienie go nie zmieni — trzeba zmienić w obu miejscach.
- [ ] **Adres e-mail administratora** — Ustawienia → Ogólne.
- [ ] **Struktura bezpośrednich odnośników (permalinks)** — Ustawienia → Bezpośrednie odnośniki → zapisz ponownie po sklonowaniu instalacji, żeby odświeżyć rewrite rules (częsty powód, że strony nagle zwracają 404 po migracji).
- [ ] **„Odradzaj wyszukiwarkom indeksowanie tej witryny”** — Ustawienia → Czytanie. Sprawdź, czy nie zostało zaznaczone po sklonowaniu ze stagingu — częsty błąd, który wyłącza indeksowanie w Google na produkcji.
- [ ] **SSL / wymuszenie https** — zależnie od hostingu nowego projektu.
- [ ] **Klucz API Akismet** — plugin jest zainstalowany, ale wymaga aktywnego klucza, żeby antyspam faktycznie działał.
- [ ] **Użytkownicy i role WP** — przejrzyj i usuń/zmień dostęp starych kont z poprzedniego projektu, jeśli baza była klonowana razem z userami.
- [ ] **LiteSpeed Cache** — przejrzyj konfigurację cache pod nowy hosting/projekt (nie każdy hosting wspiera LiteSpeed tak samo).
- [ ] **Analytics / Search Console / Meta Pixel** itp. — podłącz dla nowego projektu (stare identyfikatory ze sklonowanej bazy będą wysyłać dane do konta poprzedniego klienta).
- [ ] **Harmonogram backupów** (All-in-One WP Migration) — ustaw dla nowego projektu, nie zostaw wskazującego na stary.
- [ ] **WP Address (URL) / Site Address** — Ustawienia → Ogólne — upewnij się, że wskazują na docelową domenę nowego projektu, nie na starą.

## Decyzje z poprzedniej pracy — nie cofaj ich bez pytania

- Motyw **celowo nie ma** modelu „przepisów” (`recipes` CPT, `meal-type`, `recipe-card.php`, `single-recipes.php`) — usunięty, bo projekt miał przestać być blogiem kulinarnym. Nie odtwarzaj go, jeśli user o to nie poprosi.
- Motyw **celowo nie ma** mechanizmu AJAX — poprzedni (filtr archiwum przepisów) był osierocony i został usunięty razem z całym `inc/`. Dodawaj nowy tylko na wyraźną prośbę.
- Pola ACF **celowo nie są** eksportowane do `acf-json` — świadoma decyzja wynikająca ze sposobu pracy (patrz sekcja wyżej), nie sugeruj włączenia tego bez pytania.
- `home_content.php` i `single-topics.php` renderują `flexible_content` przez wspólny `template-parts/flexible-content.php` — nie duplikuj tej logiki z powrotem do dwóch plików.

## Gdzie szukać czego

- Architektura, stack, spis szablonów, pola ACF, JS, SCSS → `README.md`
- Checklista startowa nowego projektu → ten plik (`CHECKLIST.md`)
