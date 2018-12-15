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



    Route::get('/', 'FormController@index');
    Route::match(['get', 'post'], 'create', 'FormController@create');
    Route::match(['get', 'put'], 'update/{id}', 'FormController@update');
    Route::delete('delete/{id}', 'FormController@delete');
