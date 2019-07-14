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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group([
    'middleware' => ['auth','roles'],
    'roles' => ['sysadmin','admin'],
    'prefix' => 'admin'
], function(){

    Route::get('/users', 'UsersController@index');
    Route::get('/users/create','UsersController@create')->name('users.create');
    Route::post('/users/create','UsersController@store')->name('users.store');
    Route::get('/users/edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::put('/users/update/{id}', 'UsersController@update')->name('users.update');
    Route::get('/users/delete/{id}', 'UsersController@destroy')->name('users.delete');
});