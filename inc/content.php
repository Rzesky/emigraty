<?php

declare(strict_types=1);

require_once __DIR__ . '/article-metadata.php';

const CATEGORIES = [
  'urzedy' => ['name' => 'Urzędy', 'description' => 'Formalności urzędowe, meldunek, podatki i ubezpieczenia.'],
  'praca' => ['name' => 'Praca', 'description' => 'Zatrudnienie, umowy, rekrutacja i rozwój zawodowy.'],
  'finanse' => ['name' => 'Finanse', 'description' => 'Budżet domowy, świadczenia i podatki w Niemczech.'],
  'mieszkanie' => ['name' => 'Mieszkanie', 'description' => 'Najem, media, przeprowadzka i prawa lokatora.'],
  'zycie' => ['name' => 'Życie', 'description' => 'Codzienność emigranta: zdrowie, szkoła, integracja i bezpieczeństwo.'],
];

function articleBlueprints(): array
{
  return articleMetadata();
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


function articleFaq(string $title): array
{
  return [
    ['q' => 'Od czego zacząć temat: ' . $title . '?', 'a' => 'Zacznij od sprawdzenia aktualnych wymagań lokalnych i przygotowania checklisty dokumentów.'],
    ['q' => 'Jakie dokumenty przygotować?', 'a' => 'Najczęściej potrzebne są dokument tożsamości, potwierdzenie adresu i formularze właściwego urzędu lub instytucji.'],
    ['q' => 'Czy procedura różni się między miastami?', 'a' => 'Tak, szczegóły i terminy mogą się różnić, dlatego potwierdź je na stronie lokalnej instytucji.'],
  ];
}

function getArticles(): array
{
  $articles = [];
  foreach (articleBlueprints() as $base) {
    $base['sections'] = buildSections($base);
    $base['faq'] = articleFaq($base['title']);
    $base['updated_at'] = $base['date'];
    $articles[$base['slug']] = $base;
  }
  return $articles;
}

function getArticle(string $slug): ?array
{
  $all = getArticles();
  return $all[$slug] ?? null;
}
