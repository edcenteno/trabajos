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

Route::get('/', function () {
    return view('contenido/contenido');
});

Route::get('/categoria', 'CategoriaController@index');
//cada vez que se ingrese a la url categoria vamos hacer una peticion a controlador CategoriaController y a nuestra funcion index()
Route::post('/categoria/registrar', 'CategoriaController@store');
Route::put('/categoria/actualizar', 'CategoriaController@update');
Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
Route::put('/categoria/activar', 'CategoriaController@activar');

Route::get('/subject', 'SubjectController@index');
Route::post('/subject/registrar', 'SubjectController@inicio');
Route::put('/subject/actualizar', 'SubjectController@update');
Route::put('/subject/desactivar', 'SubjectController@desactivar');
Route::put('/subject/activar', 'SubjectController@activar');

Route::get('company', 'CompanyController@index');
Route::post('/company/registrar', 'CompanyController@store');

Route::get('rol', 'RolController@index');