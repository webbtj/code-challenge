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

Route::get('/', "SearchController@index");
Route::post('/search', "SearchController@search");

Route::get('/artist/{artistId}', "SearchController@artist")->name('artist');
Route::get('/album/{albumId}', "SearchController@album")->name('album');
Route::get('/track/{trackId}', "SearchController@track")->name('track');
