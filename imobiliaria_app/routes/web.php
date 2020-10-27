<?php

use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'ImoveisController@index')->name('home');

Route::get('/adicionar', 'ImoveisController@adicionar')->name('adicionar');

Route::get('/buscar', 'ImoveisController@buscar')->name('buscar');

Route::post('/salvar', 'ImoveisController@salvar')->name('salvar');

Route::post('/editarview', 'ImoveisController@editarview')->name('editarview');

Route::get('/updateview/{id}', 'ImoveisController@updateview')->name('updateview');

Route::get('/update/{id}', 'ImoveisController@update')->name('update');

Route::get('/excluir/{id}', 'ImoveisController@delete')->name('delete');

Route::get('/vercontrato/{id}', 'ImoveisController@vercontrato')->name('vercontrato');

Route::get('/voltarlista', 'ImoveisController@voltarlista')->name('voltarlista');