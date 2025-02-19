<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Recupera tutti i prodotti con la relativa categoria
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }
    

    public function exportCsv(Request $request): StreamedResponse
    {
        $fields = $request->input('fields', ['id', 'name', 'price', 'category']); // Campi selezionati
    
        $products = Product::with('category')->get($fields); // Recupera i prodotti con i campi selezionati
    
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="prodotti.csv"',
        ];
    
        $callback = function () use ($products, $fields) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $fields); // Intestazione del CSV
    
            foreach ($products as $product) {
                $row = [];
                foreach ($fields as $field) {
                    if ($field === 'category') {
                        $row[] = $product->category->name ?? ''; // Nome della categoria
                    } else {
                        $row[] = $product->$field;
                    }
                }
                fputcsv($file, $row);
            }
            fclose($file);
        };
    
        return response()->stream($callback, 200, $headers);
    }
    
}


