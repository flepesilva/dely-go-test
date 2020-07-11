<?php

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

Auth::routes();

Route::get('/carrito', 'ShoppingCartController@show')->name('shopping_cart.show');

Route::get('/carrito/productos', 'ShoppingCartController@products')->name('shopping_cart.products');

Route::post('/carrito/confirmacion', 'ShoppingCartController@confirm')->name('shopping_cart.confirm');

Route::resource('productos', 'ProductsController');

Route::get('/checkout', 'CheckoutController@initTransaction')->name('checkout');  
Route::post('/checkout/webpay/response', 'CheckoutController@response')->name('checkout.webpay.response');  
Route::post('/checkout/webpay/finish', 'CheckoutController@finish')->name('checkout.webpay.finish');


Route::post('/imprimir-pdf', 'CheckoutController@imprimir')->name('imprimir');



Route::resource('in_shopping_carts', "ProductInShoppingCartsController", [
    "only" => ["store", "destroy"]
]);

Route::get('/home', 'HomeController@index')->name('home');
