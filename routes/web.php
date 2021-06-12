<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PanierController;
use App\Http\Controllers\User\PaymentController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/','HomeController@index');

//Product Routes

Route::get('/Produits','User\ProductController@product')->name('product.index');
Route::patch('/Produits/Update','HomeController@Update');
Route::get('/Produits/Search','HomeController@Search')->name('product.search');
Route::get('/Produits/Details/{id}','HomeController@Details')->name('product.details');

//Panier Routes
Route::get('/Produits/Panier','User\PanierController@panier')->name('panier.index');
Route::post('/Produits/Cart','User\PanierController@add')->name('panier.add');
Route::delete('/Produits/{id}', [PanierController::class, 'destroy'])->name('panier.destroy');
Route::put('/Produits/{id}', [PanierController::class, 'update'])->name('panier.update');

//Payment Routes
Route::get('/Produits/Paiement', [PaymentController::class, 'index'])->name('paiement.index');
Route::post('/Produits/Paiement', [PaymentController::class, 'store'])->name('paiement.store');
Route::get('/Produits/Merci', [PaymentController::class, 'merci'])->name('paiment.thankyou');

//Order Route 
Route::get('/Produits/orders', [OrderController::class, 'index'])->name('order.index');

// Search Product
//Route::get('/Produits/{id}', [HomeController::class, 'show'])->name('product.show');


Route::group(['middleware'=>'roles','roles'=>['admin']],function()
{
    Route::get('/users','Admin\UserMangment@users');
    Route::post('/Produit/addRole','Admin\UserMangment@addRole');
    
    Route::get('/Produit/all','Admin\ProductController@all');
    Route::get('/Produit/archive','Admin\ProductController@archive');
    Route::patch('/Produit/{id}/restory','Admin\ProductController@restory');
    Route::delete('/Produit/{id}/forcedelete','Admin\ProductController@forcedelete');
    Route::resource('/Produit','Admin\ProductController');
    
    Route::get('/Brand/all','Admin\BrandController@all');
    Route::get('/Brand/archive','Admin\BrandController@archive');
    Route::patch('/Brand/{id}/restory','Admin\BrandController@restory');
    Route::delete('/Brand/{id}/forcedelete','Admin\BrandController@forcedelete');
    Route::resource('/Brand','Admin\BrandController');

    Route::resource('/Categorie','Admin\CategorieController');

    Route::resource('/Client','Admin\CustomerController');
});

Auth::routes();

Route::group(['middleware'=>'guest'],function(){
  Route::get('/login/facebook',[LoginController::class,'facebook']);
  Route::get('/login/facebook/callback',[LoginController::class,'facebookCallback']);
  
  Route::get('/login/google',[LoginController::class,'google']);
  Route::get('/login/google/callback',[LoginController::class,'googleCallback']);

});

