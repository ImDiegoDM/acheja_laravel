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
Route::get('/home', 'MenuController@index')->name('home');

Route::get('/clients', 'ClientController@index');
Route::get('/client/{client}', 'ClientController@show');
Route::put('/client/{client}', 'ClientController@update');
Route::get('/client/{client}/edit', 'ClientController@edit');
Route::get('/clients/register','ClientController@register');
Route::post('/clients','ClientController@store');
Route::put('/client/{client}/active','ClientController@active');
Route::put('/client/{client}/disable','ClientController@disable');

Route::get('/users/register','UserController@register');
Route::post('/users','UserController@store');

Route::get('/login','SessionController@index')->name('login');
Route::post('/login','SessionController@create');
Route::get('/logout','SessionController@destroy');
