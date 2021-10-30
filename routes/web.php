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
// ruta para listar
Route::get('/', 'UserController@list');

//ruta para formulario de usuarios
route::get('/form', 'UserController@userform');

//ruta para guardar usuario
route::post('/save', 'UserController@save')->name('save');



//ruta para eliminar un usuario
Route::delete('/delete/{id}', 'UserController@delete')->name ('delete');

//ruta para editar usuarios
Route::get('/editform/{id}', 'userController@editform')->name('editform');

//edicion de usuarios
Route::patch('/edit/{id}', 'userController@edit')->name('edit');

