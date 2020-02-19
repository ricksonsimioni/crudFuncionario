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

Route::get('/', 'CrudController@index');

Route::get('show/{user_id}', 'CrudController@show');

Route::get('users/cadastro', 'CrudController@create');

Route::get('edit/{user_id}', 'CrudController@edit');

Route::post('criacaoUsuario', 'CrudController@store');

Route::put('update/{user_id}', 'CrudController@update');

Route::post('delete', 'CrudController@delete')->name('delete.user');

