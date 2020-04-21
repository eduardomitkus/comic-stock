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

Route::prefix('stock')->group(function(){
    Route::get('', 'StockController@index')->name('stock.index');
    Route::get('insert', 'StockController@insert')->name('stock.insert');
    Route::put('{id}/insert', 'StockController@save')->name('stock.save');
    Route::put('{id}/low', 'StockController@remove')->name('stock.remove');
});


Route::prefix('movimentacoes')->group(function(){
    Route::get('', 'MovementsController@index')->name('movements.index');
    Route::post('relatorio', 'MovementsController@report')->name('movements.report');
    Route::post('info-relatorio', 'MovementsController@info')->name('movements.info');
});