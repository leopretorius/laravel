<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::prefix('invoices')->group(function () {
//     Route::get('/', [InvoiceController::class, 'index']); // Get all invoices
//     Route::post('/', [InvoiceController::class, 'store']); // Create an invoice
//     Route::get('/{id}', [InvoiceController::class, 'show']); // Get a specific invoice
// });

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);
