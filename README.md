# Emigraty

## Jak dodać miniaturę (thumb) do artykułu
1. Otwórz `inc/article-metadata.php`.
2. Znajdź artykuł po `slug`.
3. Uzupełnij pole `thumb` ścieżką, np. `/assets/img/thumbs/moj-artykul.svg`.
4. Dodaj plik obrazka do katalogu `assets/img/thumbs/`.

Każdy wpis metadanych zawiera: `title`, `description`, `slug`, `category`, `date`, `tags`, `thumb`.

## Jak dodać nowy zawód do kalkulatora
1. Otwórz `data/salaries.json`.
2. W tablicy `records` dodaj nowy obiekt:

```json
{
  "name": "Nowy zawód",
  "country": "DE",
  "median_monthly_net": 2800,
  "range": [2400, 3400],
  "description": "Krótki opis."
}
```

3. Dla porównania DE vs PL dodaj także odpowiednik z `country: "PL"`.
4. Zapisz plik i odśwież stronę kalkulatora.
