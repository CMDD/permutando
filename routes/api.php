<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Buscador
Route::get('buscar-tipo/{tipo}','InmuebleController@buscarTipo');
Route::get('buscar-modo/{tipo}/{modo}','InmuebleController@buscarModo');
Route::get('info-inmueble/{id}','InmuebleController@info');


// Admin
Route::get('lista-usuarios','UserController@lista');
Route::get('lista-inmuebles','InmuebleController@lista');


//Web
Route::post('store-inmueble','InmuebleController@store');
Route::get('inmuebles-map','InmuebleController@listaMap');

//Perfil
Route::get('mis-inmuebles/{id}','PerfilController@misInmuebles');
Route::post('busco-index','Perfil\BuscoController@buscoIndex');
    // inmuebles
    Route::get('bienes/{id}','BienController@getBienes');
    Route::post('bienes-tipo','BienController@getBienesTipo');
    Route::post('editar-inmueble','InmuebleController@editar');
    Route::get('imagenes/{id}','BienController@getImagenes');
    

//Departamentos
Route::get('departamentos','DepartamentoController@index');
Route::get('ciudades/{id}','DepartamentoController@ciudades');

// Mensajes
Route::get('mensajes/{id}','Mensaje\MensajeController@getMensajes');
Route::get('mensaje/{id}','Mensaje\MensajeController@getMensaje');

//Permutando
Route::post('permutando','ContactoController@permutando');