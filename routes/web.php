<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::middleware(['auth'])->group(function () {
    Route::resource('convs','ConvController');
    Route::get('trans','ConvController@trans')->name('trans');
    Route::resource('conv_type','ConvTypeController');
    Route::resource('count','CountController');
    Route::resource('project','ProjectController');
});