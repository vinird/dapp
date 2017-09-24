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

Route::post('/test', 'Test@file');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/newUser', 'UserController@create');
Route::post('/newUser', 'UserController@store');
Route::get('/userList', 'UserController@userList');
Route::get('/userEdit/{id}', 'UserController@edit');
Route::post('/userEdit', 'UserController@update');
Route::post('/userEdit', 'UserController@update');
Route::post('/userDelete', 'UserController@destroy');

//rutas de eventos
Route::get('/newEvent', 'EventsController@index');
Route::post('/newEvent', 'EventsController@store');


// Route::resource('/users','UserController');
