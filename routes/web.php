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
    Route::get('cadastrar', 'ComicController@create')->name('comics.create');
    Route::post('', 'ComicController@store')->name('comics.store');
    Route::get('{id}/editar', 'ComicController@edit')->name('comics.edit');
    Route::put('{id}', 'ComicController@update')->name('comics.update');
    Route::delete('{id}', 'ComicController@destroy')->name('comics.destroy');
});

Route::prefix('estoque')->group(function(){
    Route::get('', 'StockController@index')->name('stock.index');
    Route::get('adicionar', 'StockController@insert')->name('stock.insert');
    Route::put('{id}/adicionar', 'StockController@save')->name('stock.save');
    Route::put('{id}/remover', 'StockController@remove')->name('stock.remove');
});


Route::prefix('movimentacoes')->group(function(){
    Route::get('', 'MovementsController@index')->name('movements.index');
    Route::post('relatorio', 'MovementsController@report')->name('movements.report');
    Route::post('estoque', 'MovementsController@stock')->name('movements.stock');
    Route::post('baixa', 'MovementsController@removed')->name('movements.removed');
});