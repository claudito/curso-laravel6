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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('productos','ProductoController@index')
->name('productos.index')
->middleware('auth');

Route::post('productos/agregar','ProductoController@agregar')
->name('productos.agregar')
->middleware('auth');

Route::put('productos/actualizar','ProductoController@actualizar')
->name('productos.actualizar')
->middleware('auth');

Route::delete('productos/eliminar','ProductoController@eliminar')
->name('productos.eliminar')
->middleware('auth');

Route::get('productos/consultar','ProductoController@consultar')
->name('productos.consultar')
->middleware('auth');









