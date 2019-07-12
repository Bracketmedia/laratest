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

Route::get('/systempanel', 'HomeController@systempanel')->name('home.sysadmin');
Route::get('/adminpanel', 'HomeController@adminpanel')->name('home.admin');
Route::get('/home', 'HomeController@home')->name('home.user');
