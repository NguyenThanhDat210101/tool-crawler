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

Route::get('/', 'App\Http\Controllers\homeController@index')->name('home');
Route::post('/post','App\Http\Controllers\homeController@post')
->middleware('homeMiddle');

Route::get('/add-url-admin','App\Http\Controllers\urlController@index')->name('add-url');
Route::post('/add-url-admin','App\Http\Controllers\urlController@post')
->middleware('urlMiddle');

Route::get('/admin','App\Http\Controllers\cardController@index')->name('card-add');
Route::post('/admin','App\Http\Controllers\cardController@post');

Route::get('/stats','App\Http\Controllers\statsController@index')->name('stats');
Route::post('/stats','App\Http\Controllers\statsController@search')->name('stats.post');
