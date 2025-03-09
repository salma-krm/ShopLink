<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProduitsController;
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

Route::get('/',[ProduitsController::class,'All']);




Route::middleware('admin')->group(function () {

    Route::get('/categorie/show', [CategorieController::class, 'show']);
    Route::post('/categorie/create', [CategorieController::class, 'create']);
    Route::post('/categorie/update/{id}', [CategorieController::class, 'edit']);
    Route::post('/categorie/delete/{id}', [CategorieController::class, 'delete']);

    Route::get('/produits/show', [ProduitsController::class, 'show'])->name('show');
   
    Route::get('/produits/create', [ProduitsController::class, 'getCategorie']);
    Route::post('/produit/create', [ProduitsController::class, 'create']);
    Route::post('/produit/edit/{id}', [ProduitsController::class, 'edit']);
    Route::post('/produit/{id}/delete', [ProduitsController::class, 'delete']);
});



Route::get('/detailProduit/{id}', [ProduitsController::class, 'detail']);
Route::get('/Panier/{id}',[ProduitsController::class,'AjouterPanier']);
Route::get('/Panier',[ProduitsController::class,'afficherPanier']);
Route::get('/panier/supprimer/{id}', [ProduitsController::class, 'deletPanier']);
// Route::get('/payment', [PaymentController::class,'showPaymentForm']);
// Route::post('/process-payment', [PaymentController::class,'processPayment'])->name('process.payment');
Route::get('/Commande',[CommandeController::class,'commande']);
Route::post('/Commandecreate',[CommandeController::class,'create']);
Route::get('/produits', [ProduitsController::class, 'get'])->name('produits');
Route::get('/payment/success', function () {
    return view('payment-success');
})->name('payment.success');
Route::get('/payment/failure', function () {
    return view('payment-failure');
})->name('payment.failure');
Route::get('/dashboard',[ProduitsController::class,'get'])->middleware(['auth'])->name('dashboard');
Route::get('/checkout', 'App\Http\Controllers\PaymentController@checkout')->name('checkout');
Route::post('/session', 'App\Http\Controllers\PaymentController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\PaymentController@success')->name('success');
require __DIR__.'/auth.php';
