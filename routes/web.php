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

//the are the url's that needs auth and user stat of 1
Route::middleware('auth', 'user_stat')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
