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
//perfil de usuario
Route::get('/home/edit/profile/{id}', 'UsuarioController@edit');
Route::post('/home/edit/profile/{id}', 'UsuarioController@update');
//Curriculum
Route::get('/home/form/curriculum', 'FormController@index'); //nuevo
Route::post('/home/form/curriculum', 'FormController@store'); //nuevo

//Route::get('/home/form/curriculum', 'FormController@index')->name('home.form.curriculum'); //nuevo
//Route::post('/home/form/curriculum/{id}', 'FormController@store'); //nuevo

Route::get('/home/form/index/{id}', 'FormController@index2'); //ya tiene datos(editar)
Route::post('/home/form/index/{id}', 'FormController@store2'); //ya tiene datos(editar)

//habilidades skills
Route::get('/home/skills2/{id}', 'FormController@skills2'); //nuevo
Route::post('/home/skills2', 'FormController@create2');//nuevo
//niveles
Route::post('/home/skills2', 'LevelController@store');//nuevo

Route::get('/home/skills/{id}', 'FormController@skills');
Route::post('/skills/guardar', 'FormController@create')->name('skills.guardar');
//niveles
Route::post('register_skills', 'LevelController@store')->name('register_skills');

//imagen
Route::get('profile', 'PerfilController@index'); //listado
Route::post('profile', 'PerfilController@store'); //registrar
Route::delete('/home/{id}/image', 'PerfilController@destroy'); //eliminar
