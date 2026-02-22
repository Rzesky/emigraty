<?php

declare(strict_types=1);

const CATEGORIES = [
  'urzedy' => ['name' => 'Urzędy', 'description' => 'Formalności urzędowe, meldunek, podatki i ubezpieczenia.'],
  'praca' => ['name' => 'Praca', 'description' => 'Zatrudnienie, umowy, rekrutacja i rozwój zawodowy.'],
  'finanse' => ['name' => 'Finanse', 'description' => 'Budżet domowy, świadczenia i podatki w Niemczech.'],
  'mieszkanie' => ['name' => 'Mieszkanie', 'description' => 'Najem, media, przeprowadzka i prawa lokatora.'],
  'zycie' => ['name' => 'Życie', 'description' => 'Codzienność emigranta: zdrowie, szkoła, integracja i bezpieczeństwo.'],
];

function articleBlueprints(): array
{
  return [
    ['slug' => 'anmeldung-krok-po-kroku', 'category' => 'urzedy', 'title' => 'Anmeldung w Niemczech krok po kroku: jak zameldować się bez błędów', 'description' => 'Praktyczny przewodnik po meldunku w Niemczech: dokumenty, terminy, opłaty i najczęstsze błędy nowych emigrantów.'],
    ['slug' => 'steuer-id-jak-zdobyc', 'category' => 'urzedy', 'title' => 'Steuer-ID: jak zdobyć i do czego jest potrzebny numer podatkowy', 'description' => 'Wyjaśniamy jak działa Steuer-ID, gdzie go znaleźć i kiedy urząd skarbowy wysyła numer podatkowy.'],
    ['slug' => 'elster-rozliczenie-podatku', 'category' => 'urzedy', 'title' => 'ELSTER dla początkujących: rozliczenie podatku krok po kroku', 'description' => 'Jak założyć konto ELSTER, wysłać deklarację i odzyskać nadpłatę podatku w Niemczech.'],
    ['slug' => 'kindergeld-wniosek', 'category' => 'urzedy', 'title' => 'Kindergeld 2026: jak wypełnić wniosek i nie stracić świadczenia', 'description' => 'Checklista dokumentów i procedura składania wniosku o Kindergeld dla rodzin mieszkających w Niemczech.'],
    ['slug' => 'karta-pobytu-dla-rodziny-ue', 'category' => 'urzedy', 'title' => 'Karta pobytu dla rodziny obywatela UE: procedura i terminy', 'description' => 'Jak przygotować legalizację pobytu dla członków rodziny w Niemczech i uniknąć opóźnień.'],
    ['slug' => 'ubezpieczenie-zdrowotne-wybor', 'category' => 'urzedy', 'title' => 'Ubezpieczenie zdrowotne w Niemczech: publiczne czy prywatne?', 'description' => 'Porównanie GKV i PKV, koszty, składki oraz praktyczne wskazówki dla nowych emigrantów.'],

    ['slug' => 'cv-po-niemiecku-profesjonalnie', 'category' => 'praca', 'title' => 'CV po niemiecku: wzór i zasady, które naprawdę działają', 'description' => 'Jak napisać Lebenslauf pod niemiecki rynek pracy i zwiększyć liczbę zaproszeń na rozmowę.'],
    ['slug' => 'list-motywacyjny-bewerbung', 'category' => 'praca', 'title' => 'Bewerbung w praktyce: list motywacyjny i komplet dokumentów', 'description' => 'Sprawdzone standardy aplikacji o pracę w Niemczech: Anschreiben, Zeugnisse i portfolio.'],
    ['slug' => 'rozmowa-kwalifikacyjna-niemcy', 'category' => 'praca', 'title' => 'Rozmowa kwalifikacyjna w Niemczech: pytania i dobre odpowiedzi', 'description' => 'Jak przygotować się do rozmowy o pracę po niemiecku i pewnie negocjować warunki.'],
    ['slug' => 'umowa-o-prace-niemcy', 'category' => 'praca', 'title' => 'Umowa o pracę w Niemczech: co sprawdzić przed podpisaniem', 'description' => 'Kluczowe zapisy umowy, okres próbny, wypowiedzenie i ochrona pracownika.'],
    ['slug' => 'zmiana-pracy-bez-ryzyka', 'category' => 'praca', 'title' => 'Zmiana pracy w Niemczech bez ryzyka finansowego i prawnego', 'description' => 'Plan przejścia do nowego pracodawcy z zachowaniem ciągłości dochodów i ubezpieczenia.'],
    ['slug' => 'samozatrudnienie-gewerbe', 'category' => 'praca', 'title' => 'Gewerbe i samozatrudnienie: jak legalnie zacząć działalność', 'description' => 'Rejestracja Gewerbe, podatki i ubezpieczenia dla freelancerów i mikrofirm w Niemczech.'],

    ['slug' => 'konto-bankowe-dla-emigranta', 'category' => 'finanse', 'title' => 'Konto bankowe w Niemczech: jak wybrać najlepsze dla emigranta', 'description' => 'Porównanie opłat, kart, przelewów i wymagań banków dla nowych mieszkańców Niemiec.'],
    ['slug' => 'schufa-jak-dziala', 'category' => 'finanse', 'title' => 'SCHUFA: co to jest i jak poprawić swoją historię kredytową', 'description' => 'Praktyczny poradnik budowania wiarygodności finansowej w Niemczech krok po kroku.'],
    ['slug' => 'klasy-podatkowe-niemcy', 'category' => 'finanse', 'title' => 'Klasy podatkowe w Niemczech: jak wybrać właściwą i płacić mniej', 'description' => 'Wyjaśniamy Steuerklassen i kiedy opłaca się zmiana klasy podatkowej.'],
    ['slug' => 'budzet-domowy-w-euro', 'category' => 'finanse', 'title' => 'Budżet domowy emigranta: jak kontrolować wydatki w euro', 'description' => 'System planowania finansów dla rodzin i singli mieszkających w Niemczech.'],
    ['slug' => 'kredyt-samochodowy-niemcy', 'category' => 'finanse', 'title' => 'Kredyt samochodowy w Niemczech: warunki i pułapki umów', 'description' => 'Na co zwrócić uwagę przy finansowaniu auta i jak obniżyć koszt całkowity kredytu.'],
    ['slug' => 'emerytura-w-niemczech-dla-polakow', 'category' => 'finanse', 'title' => 'Emerytura w Niemczech dla Polaków: składki, staż i wypłata', 'description' => 'Jak liczy się emerytura, jakie dokumenty gromadzić i jak połączyć okresy pracy.'],

    ['slug' => 'jak-znalezc-mieszkanie-berlin', 'category' => 'mieszkanie', 'title' => 'Jak znaleźć mieszkanie w Niemczech: skuteczna strategia od A do Z', 'description' => 'Proces najmu, dokumenty i negocjacje z wynajmującym na konkurencyjnym rynku.'],
    ['slug' => 'umowa-najmu-co-sprawdzic', 'category' => 'mieszkanie', 'title' => 'Umowa najmu w Niemczech: co sprawdzić zanim podpiszesz Mietvertrag', 'description' => 'Najważniejsze klauzule, koszty dodatkowe i prawa lokatora.'],
    ['slug' => 'kaucja-i-nebenkosten', 'category' => 'mieszkanie', 'title' => 'Kaucja i Nebenkosten: jak nie przepłacić za mieszkanie', 'description' => 'Jak działa kaucja, rozliczenia kosztów dodatkowych i procedura zwrotu depozytu.'],
    ['slug' => 'meldunek-po-przeprowadzce', 'category' => 'mieszkanie', 'title' => 'Meldunek po przeprowadzce: obowiązki lokatora w Niemczech', 'description' => 'Terminy i formalności po zmianie adresu, aby uniknąć kar administracyjnych.'],
    ['slug' => 'media-i-internet-po-umowie', 'category' => 'mieszkanie', 'title' => 'Media i internet po podpisaniu umowy najmu: praktyczny setup', 'description' => 'Elektryczność, gaz, internet i ubezpieczenia mieszkania krok po kroku.'],
    ['slug' => 'wypowiedzenie-najmu-niemcy', 'category' => 'mieszkanie', 'title' => 'Wypowiedzenie najmu w Niemczech: terminy, wzór i odbiór lokalu', 'description' => 'Jak bezpiecznie zakończyć najem i odzyskać kaucję bez konfliktu.'],

    ['slug' => 'koszty-zycia-niemcy-2026', 'category' => 'zycie', 'title' => 'Koszty życia w Niemczech 2026: realne wydatki i plan minimum', 'description' => 'Ile kosztuje życie w Niemczech i jak ustawić budżet już od pierwszego miesiąca.'],
    ['slug' => 'opieka-zdrowotna-na-co-dzien', 'category' => 'zycie', 'title' => 'Opieka zdrowotna na co dzień: lekarz rodzinny, specjaliści i recepty', 'description' => 'Jak korzystać z niemieckiej służby zdrowia bez stresu i zbędnych kosztów.'],
    ['slug' => 'szkola-i-przedszkole-dla-dzieci', 'category' => 'zycie', 'title' => 'Szkoła i przedszkole w Niemczech: praktyczny przewodnik dla rodziców', 'description' => 'Zapisy, dokumenty i wsparcie językowe dla dzieci polskich rodzin.'],
    ['slug' => 'integracja-i-jezyk-w-praktyce', 'category' => 'zycie', 'title' => 'Integracja i język: jak szybciej odnaleźć się w niemieckiej codzienności', 'description' => 'Skuteczne metody nauki języka i budowania relacji lokalnie.'],
    ['slug' => 'transport-publiczny-i-auto', 'category' => 'zycie', 'title' => 'Transport publiczny i samochód w Niemczech: co się bardziej opłaca', 'description' => 'Koszty biletów, paliwa i ubezpieczenia auta dla mieszkańców dużych i małych miast.'],
    ['slug' => 'bezpieczenstwo-i-prawo-konsumenta', 'category' => 'zycie', 'title' => 'Bezpieczeństwo i prawa konsumenta w Niemczech: praktyka na co dzień', 'description' => 'Jak reagować na oszustwa, reklamacje i nieuczciwe umowy.'],
  ];
}

function articleFaq(string $title): array
{
  return [
    ['q' => 'Od czego najlepiej zacząć wdrożenie wskazówek z artykułu?', 'a' => 'Zacznij od przygotowania listy dokumentów i terminów. W praktyce największe opóźnienia wynikają z braków formalnych, więc pierwszy tydzień poświęć na porządek administracyjny.'],
    ['q' => 'Jak uniknąć najczęstszych błędów nowych emigrantów?', 'a' => 'Najczęściej pomaga prowadzenie jednego folderu z dokumentami, potwierdzeniami i umowami. Drugą zasadą jest czytanie warunków umów przed podpisaniem, szczególnie zapisów o wypowiedzeniu i opłatach dodatkowych.'],
    ['q' => 'Czy wskazówki z poradnika działają w każdym landzie?', 'a' => 'Zasady ogólne są takie same, ale procedury lokalnych urzędów i terminy bywają różne. Zawsze sprawdź stronę właściwej instytucji dla swojego miasta.'],
    ['q' => 'Kiedy warto skorzystać z pomocy doradcy?', 'a' => 'Gdy sprawa dotyczy podatków, prawa pracy lub sporów najmu i wiąże się z większą kwotą. Jedna konsultacja zwykle kosztuje mniej niż błąd popełniony bez wsparcia.'],
    ['q' => 'Jak szybko uporządkować sytuację po przeprowadzce do Niemiec?', 'a' => 'Najlepiej działa plan 30 dni: meldunek, konto, ubezpieczenie, umowa pracy i budżet. Potem dopiero optymalizuj koszty i rozwijaj kolejne obszary.'],
  ];
}

function buildSections(array $article): array
{
  $topic = $article['title'];
  $cat = CATEGORIES[$article['category']]['name'];

  return [
    ['title' => 'Dlaczego ten temat ma kluczowe znaczenie po przeprowadzce', 'content' => [
      "{$topic} to jeden z najważniejszych obszarów, które decydują o tym, czy start w Niemczech będzie spokojny i przewidywalny. W praktyce większość problemów emigrantów nie wynika z braku chęci, lecz z pośpiechu i nieznajomości lokalnych procedur. Dlatego warto podejść do sprawy metodycznie: ustalić kolejność działań, zebrać dokumenty i zaplanować rezerwę czasu na urzędy oraz odpowiedzi instytucji.",
      "W kategorii {$cat} szczególnie liczy się dokładność, bo każdy błąd formalny może uruchomić lawinę dodatkowych obowiązków. Jedna pominięta informacja często oznacza ponowne wizyty, opóźnienia w wypłatach albo blokadę dalszych kroków, na przykład przy umowie najmu, zatrudnieniu czy rozliczeniach podatkowych.",
      "Dobrą praktyką jest traktowanie pierwszych miesięcy jako projektu z konkretnym harmonogramem. Ustal priorytety tygodniowe, notuj terminy i prowadź prostą checklistę. To podejście pozwala zredukować stres, a jednocześnie przyspiesza pełną stabilizację życia rodzinnego i zawodowego."]],
    ['title' => 'Dokumenty i dane, które przygotujesz przed rozpoczęciem', 'content' => [
      'Przed rozpoczęciem formalności przygotuj dokument tożsamości, potwierdzenie adresu, numer konta bankowego, dane pracodawcy oraz podstawowe zaświadczenia rodzinne. Trzymanie wszystkiego w jednym miejscu oszczędza czas i eliminuje nerwowe szukanie papierów przed wizytą.',
      'Warto od razu stworzyć dwa zestawy: wersję papierową i cyfrową. Skanuj dokumenty w wysokiej jakości, nazywaj pliki datą i rodzajem dokumentu, a następnie przechowuj je w bezpiecznej chmurze. Dzięki temu szybko wyślesz komplet załączników, gdy urząd lub pracodawca poprosi o uzupełnienie.',
      'Jeśli dokumenty są po polsku, sprawdź wcześniej, czy instytucja wymaga tłumaczenia przysięgłego. Nie każdy urząd tego żąda, ale w sprawach rodzinnych i podatkowych często jest to konieczne. Lepiej mieć gotową listę tłumaczeń niż tracić tygodnie na uzupełnienia.']],
    ['title' => 'Procedura krok po kroku', 'content' => [
      'Krok pierwszy to potwierdzenie aktualnych wymagań na stronie lokalnej instytucji. W Niemczech szczegóły potrafią różnić się między miastami, dlatego nie opieraj się wyłącznie na starych poradach z forów.',
      'Krok drugi to umówienie terminu i przygotowanie pełnego pakietu dokumentów. Przyjmij zasadę, że zabierasz jedną kopię więcej niż wymagane minimum. To prosty sposób na uniknięcie drugiej wizyty.',
      'Krok trzeci obejmuje złożenie wniosku i odebranie potwierdzenia. Zachowaj każdy dokument potwierdzający złożenie sprawy, bo bywa wymagany przy kolejnych formalnościach, np. w banku, u pracodawcy lub przy świadczeniach rodzinnych.',
      'Krok czwarty to monitorowanie statusu i reakcja na wezwania urzędu. Ustaw przypomnienia kalendarzowe i odpowiadaj na pisma bez zwłoki. W systemie niemieckim terminowość ma bardzo duże znaczenie i buduje wiarygodność.']],
    ['title' => 'Najczęstsze błędy i jak ich uniknąć', 'content' => [
      'Pierwszy błąd to działanie bez harmonogramu. Emigranci próbują załatwiać wszystko naraz, przez co pomijają zależności między sprawami. Lepiej iść sekwencyjnie: najpierw adres i dokumenty, potem finanse, następnie optymalizacja kosztów.',
      'Drugi błąd to podpisywanie dokumentów bez analizy warunków. Szczególnie dotyczy to umów z długimi okresami wypowiedzenia, automatycznymi przedłużeniami lub dodatkowymi opłatami. Jeśli czegoś nie rozumiesz, poproś o wersję pisemną i konsultację.',
      'Trzeci błąd to brak archiwizacji korespondencji. W razie sporu to dokumenty i daty decydują o wyniku. Przechowuj e-maile, listy oraz potwierdzenia nadania minimum przez kilka lat.']],
    ['title' => 'Optymalizacja kosztów i czasu', 'content' => [
      'Wiele spraw da się załatwić taniej dzięki porównywarkom i planowaniu z wyprzedzeniem. Dotyczy to kont bankowych, taryf internetowych, ubezpieczeń i transportu. Nie wybieraj pierwszej oferty tylko dlatego, że jest najłatwiej dostępna.',
      'Czas oszczędzisz, jeśli połączysz wizyty urzędowe i przygotujesz gotowe formularze jeszcze przed terminem. Sprawdza się też zasada jednego dnia administracyjnego tygodniowo: tego dnia odpowiadasz na pisma, aktualizujesz checklistę i porządkujesz dokumenty.',
      'W perspektywie roku największe oszczędności daje eliminacja drobnych, powtarzalnych kosztów: niepotrzebnych subskrypcji, zbyt drogich taryf i impulsywnych zakupów. Regularny przegląd wydatków co miesiąc pozwala utrzymać stabilność finansową.']],
    ['title' => 'Współpraca z urzędami i instytucjami', 'content' => [
      'Kontakt z urzędami warto prowadzić rzeczowo i pisemnie. Krótkie wiadomości z numerem sprawy, datami i listą załączników są skuteczniejsze niż długie opisy. Taki styl przyspiesza obsługę i zmniejsza ryzyko nieporozumień.',
      'Jeśli nie mówisz płynnie po niemiecku, przygotuj wcześniej prosty skrypt rozmowy: kim jesteś, czego dotyczy sprawa i jakie dokumenty masz przy sobie. To zwiększa pewność siebie i skraca czas przy okienku.',
      'Gdy sprawa się przeciąga, stosuj uprzejmy follow-up co 7–10 dni. W Niemczech konsekwencja i kultura komunikacji działają lepiej niż presja. Najczęściej to wystarcza, by otrzymać jasny termin zakończenia.']],
    ['title' => 'Plan działania na pierwsze 90 dni', 'content' => [
      'W pierwszych 30 dniach skup się na formalnym uporządkowaniu podstaw: adres, dokumenty, ubezpieczenie, konto oraz źródło dochodu. Bez tego każdy kolejny etap będzie wolniejszy i bardziej kosztowny.',
      'Dni 31–60 to czas na stabilizację: dopracowanie umów, budżetu i organizacji codziennych obowiązków. W tym okresie warto też zapisać się na kurs językowy lub konsultację zawodową, by zwiększyć tempo integracji.',
      'Dni 61–90 przeznacz na optymalizację. Analizuj oferty usług, ograniczaj koszty stałe, buduj poduszkę finansową i zamykaj otwarte sprawy urzędowe. Po trzech miesiącach powinieneś mieć system, który działa bez ciągłych kryzysów.']],

    ['title' => 'Długoterminowa strategia na 12 miesięcy', 'content' => [
      'Po ustabilizowaniu podstaw warto przejść do planowania rocznego. Ustal cele mierzalne: poziom oszczędności, rozwój językowy, wzrost wynagrodzenia i formalne domknięcie wszystkich spraw administracyjnych. Taki plan nie tylko porządkuje codzienność, ale też buduje bezpieczeństwo finansowe rodziny.',
      'Równolegle stwórz system przeglądu kwartalnego. Co trzy miesiące sprawdzaj, które umowy da się renegocjować, jakie koszty stałe wzrosły i czy pojawiły się nowe ulgi, świadczenia lub możliwości zawodowe. Regularna aktualizacja decyzji przynosi większy efekt niż jednorazowe szukanie oszczędności.',
      'Najlepsze rezultaty daje połączenie porządku w dokumentach, dyscypliny budżetowej i konsekwentnej komunikacji z instytucjami. Dzięki temu kolejne etapy emigracji stają się przewidywalne, a Ty możesz skupić się na rozwoju pracy, jakości życia i długofalowych planach w Niemczech.'
    ]],
    ['title' => 'Checklista kontrolna', 'content' => [
      '• Sprawdzone aktualne wymagania lokalne i terminy urzędowe.',
      '• Komplet dokumentów w wersji papierowej oraz cyfrowej.',
      '• Zapisane potwierdzenia złożonych wniosków i korespondencji.',
      '• Uporządkowany miesięczny budżet oraz plan awaryjny.',
      '• Lista kolejnych kroków na następne 4 tygodnie z datami realizacji.',
      '• Minimum jedna konsultacja ekspercka, gdy sprawa ma skutki prawne lub podatkowe.']],
  ];
}

function getArticles(): array
{
  $articles = [];
  foreach (articleBlueprints() as $base) {
    $base['sections'] = buildSections($base);
    $base['faq'] = articleFaq($base['title']);
    $base['updated_at'] = '2026-01-15';
    $articles[$base['slug']] = $base;
  }
  return $articles;
}

function getArticle(string $slug): ?array
{
  $all = getArticles();
  return $all[$slug] ?? null;
}
