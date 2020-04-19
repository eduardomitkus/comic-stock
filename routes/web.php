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

Route::get('/', function () {
    return redirect()->route('comics.index');
});

Route::prefix('comics')->group(function(){
    Route::get('', 'ComicController@index')->name('comics.index');
    Route::get('create', 'ComicController@create')->name('comics.create');
    Route::post('', 'ComicController@store')->name('comics.store');
    Route::get('{id}/edit', 'ComicController@edit')->name('comics.edit');
    Route::put('{id}', 'ComicController@update')->name('comics.update');
    Route::delete('{id}', 'ComicController@destroy')->name('comics.destroy');
});
