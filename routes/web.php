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

Route::middleware(['permission:view_systempanel'])
    ->get('/systempanel', 'HomeController@systempanel')
    ->name('home.sysadmin')
;
Route::middleware(['permission:view_adminpanel'])
    ->get('/adminpanel', 'HomeController@adminpanel')
    ->name('home.admin')
;
Route::middleware(['permission:view_home'])
    ->get('/home', 'HomeController@home')
    ->name('home.user')
;
