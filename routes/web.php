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

Route::get('home', 'HomeController@index')->name('home');
//perfil de usuario
Route::get('/home/edit/profile/{id}', 'UsuarioController@edit');
Route::post('/home/edit/profile/{id}', 'UsuarioController@update');
//Curriculum
Route::get('/home/form/curriculum', 'FormController@index'); //nuevo
Route::post('/home/form/curriculum', 'FormController@store'); //nuevo

Route::get('/home/form/index/{id}', 'FormController@index2'); //ya tiene datos(editar)
Route::post('/home/form/index/{id}', 'FormController@store2'); //ya tiene datos(editar)

//habilidades skills
Route::get('/home/skills/{id}', 'FormController@skills');
Route::post('/home/skills/{id}', 'FormController@create');

//EDITAR skills
Route::get('/home/skillsEdit/{id}', 'FormController@edit');
Route::post('/home/skillsEdit/{id}', 'FormController@update');

//title
Route::get('/home/form/title/{id}', 'LevelController@index');
Route::post('/home/form/title/{id}', 'LevelController@create');

//title EDITAR
Route::get('/home/titleEdit/{id}', 'LevelController@edit');
Route::post('/home/titleEdit/{id}', 'LevelController@update');

//Enterprise
Route::get('/home/form/enterprise/{id}', 'EnterpriseController@index');
Route::post('/home/form/enterprise/{id}', 'EnterpriseController@create');

//Enterprise EDIT
Route::get('/home/form/enterpriseEdit/{id}', 'EnterpriseController@edit');
Route::post('/home/form/enterpriseEdit/{id}', 'EnterpriseController@update');

//imagen de perfil
Route::get('profile', 'PerfilController@index'); //listado
Route::post('profile', 'PerfilController@store'); //registrar
Route::delete('/home/{id}/image', 'PerfilController@destroy'); //eliminar
