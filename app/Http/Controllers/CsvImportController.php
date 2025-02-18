<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CsvImportController extends Controller
{
    // Mostra il form per caricare i file CSV
    public function showForm()
    {
        return view('csv_import');
    }

    // Gestisce l'importazione dei file CSV per categorie e prodotti
    public function importCSV(Request $request)
    {
        // Validazione: assicurati che entrambi i file siano caricati
        $request->validate([
            'categories_file' => 'required|file|mimes:csv,txt',
            'products_file'   => 'required|file|mimes:csv,txt'
        ]);

        // Importa le categorie
        $categoriesFile = $request->file('categories_file');
        if (($handle = fopen($categoriesFile->getRealPath(), 'r')) !== false) {
            // Salta la prima riga (intestazione: id,nome)
            fgetcsv($handle, 1000, ",");
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                // Inserisci la categoria usando firstOrCreate per evitare duplicati
                Category::firstOrCreate(
                    ['id' => $data[0]],
                    ['name' => $data[1]]
                );
            }
            fclose($handle);
        }

        // Importa i prodotti
        $productsFile = $request->file('products_file');
        if (($handle = fopen($productsFile->getRealPath(), 'r')) !== false) {
            // Salta la prima riga (intestazione: id,nome,prezzo,categoria_id)
            fgetcsv($handle, 1000, ",");
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                Product::create([
                    'id'          => $data[0],
                    'name'        => $data[1],
                    'price'       => $data[2],
                    'category_id' => $data[3],
                ]);
            }
            fclose($handle);
        }

        return redirect()->back()->with('success', 'Importazione completata!');
    }
}
