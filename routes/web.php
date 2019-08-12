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

Route::get('/', 'AlbunsController@index');
Route::get('/albuns', 'AlbunsController@index');
Route::get('/albuns/create', 'AlbunsController@create');
Route::get('/albuns/{id}', 'AlbunsController@show');
Route::post('/albuns/store', 'AlbunsController@store');


Route::get('/fotos/create/{id}', 'FotosController@create');
Route::post('/fotos/store', 'FotosController@store');
Route::get('/fotos/{id}', 'FotosController@show');
Route::delete('/fotos/{id}', 'FotosController@destroy');
