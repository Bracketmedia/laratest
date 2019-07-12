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

//Home routes

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/forbbiden', 'HomeController@forbbiden')->name('forbbiden');

//Sysadmin available routes

Route::group(['middleware' => 'sysadmin'], function () {
    Route::get('/systempanel', 'HomeController@systemPanel')->name('systemPanel');
});


//Admin and Sysadmin available routes

Route::group(['middleware' => 'admin'], function () {
    Route::get('/adminpanel', 'HomeController@adminPanel')->name('adminpanel');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    //User CRUD routes
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/{user}', 'UserController@show')->name('users.show');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('/users/{user}', 'UserController@update');
    Route::delete('/users/{user}', 'UserController@destroy');
});

//Comments routes

Route::resource('comments','CommentController');

