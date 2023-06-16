<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdottiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/prodotti', [ProdottiController::class, 'list']);
Route::get('/prodotti/{prodotto}', [ProdottiController::class, 'get']);
Route::get('/prodotto', [ProdottiController::class, 'crea'])->name('form-prodotto');
Route::post('/prodotto', [ProdottiController::class, 'salva']);
