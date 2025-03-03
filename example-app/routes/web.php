<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitsController;
use App\Models\Produit;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/categorie/show',[CategorieController::class,'show']);
Route::get('/produits',[ProduitsController::class,'get']);
Route::get('/Panier/{id}',[ProduitsController::class,'AjouterPanier']);
Route::get('/Panier',[ProduitsController::class,'afficherPanier']);
Route::get('/produits/show',[ProduitsController::class,'show']);
Route::get('/produits/create',[ProduitsController::class,'getCategorie']);
Route::post('/produit/create',[ProduitsController::class,'create']);
Route::post('/produit/edit/{id}',[ProduitsController::class,'edit']);
Route::post('/produit/{id}/delete',[ProduitsController::class,'delete']);

