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
    if(!Auth::check())
        return view('auth.login');
    else
        return view('films');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/films', 'HomeController@index')->name('films');
    Route::post('/films', 'FilmsController@GetData')->name('getFilms');
    Route::get('/films/create', 'FilmsController@index')->name('manage_films');
    Route::get('/films/{slug}', 'FilmsController@GetDetail')->name('view_film');
    Route::post('/films/save', 'FilmsController@save')->name('savefilms');
});