<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('catalog/{path}', 'CategoriesController@index')->where('path', '(.*)?');
Route::get('product/{path}', 'WaresController@index')->where('path', '(.*)?');
Route::any('ajax-cart', 'HomeController@ajaxCart');
Route::get('cart-test', function(){
    return Cart::content();
});