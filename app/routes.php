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
Route::get('katalog/{path}', 'CategoriesController@index')->where('path', '(.*)?');
Route::get('product/{path}', 'WaresController@index')->where('path', '(.*)?');
Route::any('ajax-cart', 'HomeController@ajaxCart');
Route::any('ajax-cart-remove', 'HomeController@ajaxCartRemove');
Route::get('cart-test', function(){
    $cartContentObj = Cart::content();
    $cartContentArr = [];
    foreach ($cartContentObj as $item){
        $item->thumbnail = $item->ware->thumbnail;
        $item->options['slug'] = 'sdfsd';
        $cartContentArr[] = $item;
    }
    return $cartContentArr;
});
Route::get('get-data', function(){
    $html = new Htmldom('http://dmtoys.com.ua/catalog/igrushki/interaktivnye-igrushki/angry-birds');
    foreach ($html->find('#primary-menu-inner a') as $item){
        echo $item->href . '<br>';
    }
});
Route::get('cart-destroy', function(){
    Cart::destroy();
});
Route::get('cart', 'HomeController@cart');
Route::get('adm', 'AdminController@index');
Route::post('adm/categories', 'CategoriesController@store');
Route::get('adm/categories', 'CategoriesController@adminIndex');
Route::get('adm/categories/create', 'CategoriesController@create');
Route::get('adm/categories/{id}', 'CategoriesController@edit');
Route::put('adm/categories/{id}', 'CategoriesController@update');
Route::get('adm/categories/{id}/destroy', 'CategoriesController@destroy');

Route::get('adm/wares', 'WaresController@adminIndex');
Route::post('adm/wares', 'WaresController@store');
Route::get('adm/wares/create', 'WaresController@create');
Route::get('adm/wares/import', 'WaresController@waresImport');
Route::post('adm/wares/import', 'WaresController@waresImportStore');
Route::get('adm/wares/{id}', 'WaresController@edit');
Route::put('adm/wares/{id}', 'WaresController@update');
Route::get('adm/wares/{id}/destroy', 'WaresController@destroy');
