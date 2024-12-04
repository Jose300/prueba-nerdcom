<?php
//Prueba Técnica para Nerdcom
//Lic Informatica. José Perera
//Fecha: 04/12/2024

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/products', [ProductsController::class, 'getAllProducts']);
Route::get('/products/{id}', [ProductsController::class, 'getProductById']);
Route::post('/products', [ProductsController::class, 'createProduct']);
Route::put('/products/{id}', [ProductsController::class, 'updateProduct']);
Route::delete('/products/{id}', [ProductsController::class, 'deleteProduct']);

