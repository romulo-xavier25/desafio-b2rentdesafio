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

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('itens', 'RecursoController@index')->name('admin.itens');
    Route::get('itens/cadastrar', 'RecursoController@cadastrar')->name('itens.cadastrar');
    Route::post('itens/cadastrar', 'RecursoController@cadastrarStore')->name('cadastrar.store');
    Route::get('itens/editar', 'RecursoController@retirar')->name('itens.retirar');
    Route::get('itens/editar/{id}', 'RecursoController@retirar')->name('retirar.id');
    Route::post('itens/editar/{id}', 'RecursoController@retirarStore')->name('retirar.store');
    Route::post('itens/deletar/{id}', 'RecursoController@deletarStore')->name('deletar.store');
    Route::get('historico', 'HistoricoController@index')->name('admin.historico');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

