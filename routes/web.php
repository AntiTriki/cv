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




    Route::get('/', 'FormController@index');
    Route::match(['get', 'post'], 'create', 'FormController@create');
    Route::match(['get', 'put'], 'update/{id}', 'FormController@update');
    Route::delete('delete/{id}', 'FormController@delete');
*/
Route::get('/', function () {
    return view('auth.login');
});
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/curriculum', 'FormController@index');
Route::get('/home/skills/{id}', 'FormController@skills');
Route::post('/skills/guardar', 'FormController@create')->name('skills.guardar');

Route::get('/home/edit/profile/{id}', 'UsuarioController@edit');
Route::post('/home/edit/profile/{id}', 'UsuarioController@update');
//Redireccion
Route::get('/redireccion','FormController@redir');

Route::post('register_cv', 'FormController@store')->name('register_cv');
Route::post('register_skills', 'LevelController@store')->name('register_skills');
