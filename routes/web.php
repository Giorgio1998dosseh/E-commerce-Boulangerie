<?php

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

Route::get('/welcom', function () {
    return view('welcome');
});

//CHECKOUT

Route::get('/checkout', 'PanierController@checkout')->name('checkout');

//LIVRAISON

Route::get('/listLivraison', 'LivraisonController@index')->name('listLivraison');

//COMMANDE

Route::post('/storeCommande', 'CommandeController@store')->name('storeCommande');

Route::post('/livrerCommande\{id}', 'CommandeController@update')->name('livrerCommande');

Route::get('/listCommande', 'CommandeController@index')->name('listCommande');

Route::get('/commandeLiv', 'CommandeController@commandeLiv')->name('listCommandeLiv');

Route::get('/detailsCommande\{id}', 'CommandeController@details')->name('detailsCommande');


//CLIENT

Route::get('/listClient', 'ClientController@index')->name('listClient');


//TYPE PRODUIT

Route::get('/addTypeProduit', 'TypeProduitController@create')->name('addTypeProduit');

Route::post('/storeTypeProduit', 'TypeProduitController@store')->name('storeTypeProduit');

Route::post('/updateTypeProduit\{id}', 'TypeProduitController@update')->name('updateTypeProduit');

Route::get('/deleteTypeProduit\{id}', 'TypeProduitController@destroy')->name('deleteTypeProduit');

//PRODUIT

Route::get('/addProduit', 'ProduitController@create')->name('addProduit');

Route::get('/listProduit', 'ProduitController@index')->name('listProduit');

Route::post('/storeProduit', 'ProduitController@store')->name('storeProduit');

Route::post('/updateProduit\{id}', 'ProduitController@update')->name('updateProduit');

Route::get('/showProduit\{id}', 'ProduitController@show')->name('showProduit');

Route::get('/deleteProduit\{id}', 'ProduitController@destroy')->name('deleteProduit');

Route::get('/categorieProduit\{id}', 'ProduitController@categorie')->name('catégorieProduit');

//PANIER

Route::get('/cart', 'PanierController@cart')->name('cart.index');

Route::post('/add', 'PanierController@add')->name('cart.store');

Route::post('/update', 'PanierController@update')->name('cart.update');

Route::post('/remove', 'PanierController@remove')->name('cart.remove');

Route::post('/clear', 'PanierController@clear')->name('cart.clear');

//AUTHENTIFICATION

Auth::routes();

Route::get('/loginForm', 'HomeController@showLoginForm')->name('loginForm');

Route::get('/registerForm', 'HomeController@showRegisterForm')->name('registerForm');

//HOME

Route::get('/', 'HomeController@home')->name('index');

Route::get('/home', 'HomeController@index')->name('home');

//USER

Route::get('/users', 'HomeController@users')->name('users');
