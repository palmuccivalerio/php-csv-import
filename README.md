# PHP CSV Import

Questo progetto è un esercizio realizzato con Laravel per importare dati da file CSV in un database MySQL. È basato sul template [laravel-auth-template](https://github.com/sabino-olivieri/laravel-auth-template) e include funzionalità per:

- Importare dati da due file CSV (categorie e prodotti).
- Inserire i dati nelle tabelle `categories` e `products`.
- Visualizzare i prodotti importati tramite una pagina web.
- Fornire istruzioni sul formato corretto dei file CSV.

## Struttura del Progetto

- **Modelli:**  
  - `Category` (Categorie)  
  - `Product` (Prodotti)

- **Migrazioni:**  
  - `create_categories_table`  
  - `create_products_table`

- **Controller:**  
  - `CsvImportController`: Gestisce il caricamento e l'importazione dei file CSV.  
  - `ProductController`: Visualizza i prodotti importati.

- **Rotte:**  
  - `/` – Homepage: mostra il form per l'importazione CSV.  
  - `/csv-import` – Endpoint POST per importare i CSV.  
  - `/products` – Pagina per visualizzare i dati dei prodotti.

- **View:**  
  - `resources/views/csv_import.blade.php`: Form di upload con istruzioni sintetiche sul formato CSV.  
  - `resources/views/products/index.blade.php`: Visualizzazione della lista dei prodotti.

## Requisiti

- PHP 7.4 o superiore  
- Composer  
- Node.js (per compilare asset)  
- MySQL (o database compatibile con Laravel)
