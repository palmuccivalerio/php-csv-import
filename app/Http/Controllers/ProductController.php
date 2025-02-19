<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // Recupera tutti i prodotti con la relativa categoria
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }
    

    public function exportCsv()
{
   $response = new StreamedResponse(function () {
       $handle = fopen('php://output', 'w');
       // Intestazione del file CSV
       fputcsv($handle, ['ID', 'Nome', 'Prezzo', 'Categoria']);

       // Recupera i dati con una join tra products e categories
       $products = DB::table('products')
           ->join('categories', 'products.category_id', '=', 'categories.id')
           ->select('products.id', 'products.name', 'products.price', 'categories.name as category')
           ->get();

       // Scrive i dati nel file CSV
       foreach ($products as $product) {
           fputcsv($handle, [
               $product->id,
               $product->name,
               $product->price,
               $product->category,
           ]);
       }

       fclose($handle);
   });

   $response->headers->set('Content-Type', 'text/csv');
   $response->headers->set('Content-Disposition', 'attachment; filename="prodotti.csv"');

   return $response;
}
    
}


