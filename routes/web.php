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
Route::get('/', function(){
  return redirect()->home();
});

Route::get('admin/home', 'MenuController@index')->name('home');

Route::get('admin/clients', 'ClientController@index');
Route::get('admin/client/{client}', 'ClientController@show');
Route::put('admin/client/{client}', 'ClientController@update');
Route::get('admin/client/{client}/edit', 'ClientController@edit');
Route::get('admin/clients/register','ClientController@register');
Route::post('admin/clients','ClientController@store');
Route::put('admin/client/{client}/active','ClientController@active');
Route::put('admin/client/{client}/disable','ClientController@disable');

Route::get('admin/users/register','UserController@register');
Route::post('admin/users','UserController@store');
Route::get('admin/users','UserController@index');
Route::get('admin/user/{user}','UserController@show');
Route::post('admin/user/{user}/giveAcess','UserController@giveAcess');
Route::post('admin/user/{user}/savePassword','UserController@savePassoword');
Route::get('admin/users/setpassword','UserController@setPassword');

Route::get('admin/content','ContentController@index')->name('content');

Route::post('admin/categories','CategoryController@create');
Route::delete('admin/category/{category}','CategoryController@delete');

Route::post('admin/cities','CityController@create');
Route::delete('admin/city/{city}','CityController@delete');

Route::post('admin/regions','RegionController@create');
Route::delete('admin/region/{region}','RegionController@delete');

Route::get('admin/promotions/{client}','PromotionController@index');
Route::post('admin/promotions/{client}','PromotionController@save');
Route::delete('admin/promotion/{promotion}','PromotionController@delete');
Route::put('admin/promotion/{promotion}','PromotionController@update');

Route::get('admin/login','SessionController@index')->name('login');
Route::post('admin/login','SessionController@create');
Route::get('admin/logout','SessionController@destroy');

Route::get('api/clients','ClientController@apiIndex');
Route::get('api/client/{client}','ClientController@apiShow');
Route::get('api/client/{client}/promotions','ClientController@promotionsShow');
