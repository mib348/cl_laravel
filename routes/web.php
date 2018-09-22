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
    return redirect('/films');
//     if(!Auth::check())
//         return view('auth.login');
//     else
//         return view('films');
});

Route::get('/home', function () {
    return redirect('/films');
});

Route::get('/films', 'FilmsController@home')->name('films');
Route::post('/films', 'FilmsController@GetData')->name('getFilms');

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/films/create', 'FilmsController@index')->name('manage_films');
    Route::post('/films/save', 'FilmsController@save')->name('savefilms');
    Route::post('/films/saveComment', 'FilmsController@saveComment')->name('saveComment');
});

Route::get('/films/{slug}', 'FilmsController@GetDetail')->name('view_film');
