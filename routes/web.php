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

Route::get('/', "AlbumsController@index");
Route::get('/albums', "AlbumsController@index");
Route::get('/albums/create', "AlbumsController@create");
Route::get('/albums/{id}', "AlbumsController@show");
Route::post('/albums/store', "AlbumsController@store");
Route::delete('/albums/{id}', "AlbumsController@destroy");

Route::get('/photos/create/{id}', "PhotosController@create");
Route::get('/photos/{id}', "PhotosController@show");
Route::post('/photos/store', "PhotosController@store");
Route::delete('/photos/{id}', "PhotosController@destroy");
