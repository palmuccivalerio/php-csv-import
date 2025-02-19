<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CsvImportController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [CsvImportController::class, 'showForm'])->name('home');
// Rotte per l'import CSV
Route::get('/csv-import', [CsvImportController::class, 'showForm'])->name('csv.import.form');
Route::post('/csv-import', [CsvImportController::class, 'importCSV'])->name('csv.import');

// Rotta per visualizzare i prodotti (bonus)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');


Route::post('/products/export', [ProductController::class, 'exportCsv'])->name('products.export');


Route::middleware('auth')
    ->prefix('admin') // Prefisso nell'url delle rotte di questo gruppo
    ->name('admin.') // inizio di ogni nome delle rotte del gruppo
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });

require __DIR__ . '/auth.php';
