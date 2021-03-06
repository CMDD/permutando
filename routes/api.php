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
Route::post('buscar-departamento','InmuebleController@buscarDepartamento');
Route::post('buscar-en','InmuebleController@buscarEn');
Route::get('buscar-modo/{tipo}/{modo}','InmuebleController@buscarModo');
Route::get('info-inmueble/{id}','InmuebleController@info');
Route::get('buscarAll','InmuebleController@buscarAll');


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
    Route::get('eliminar-bien/{id}','BienController@eliminarBien');
    Route::post('bienes-tipo','BienController@getBienesTipo');
    Route::post('editar-recibo-efectivo','BienController@editarReciboEfectivo');
    Route::post('editar-inmueble','InmuebleController@editar');
    Route::post('update-permuta','InmuebleController@updatePermuta');
    Route::get('imagenes/{id}','BienController@getImagenes');
    Route::post('inmueble-estado','InmuebleController@estado');
    Route::get('delete-img/{img}/{id}','InmuebleController@deleteImage');
    Route::get('delete-inmueble/{id}','InmuebleController@deleteInmueble');
    Route::get('publicar-inmueble/{id}','InmuebleController@publicarInmueble');
    Route::get('ocultar-inmueble/{id}','InmuebleController@ocultarInmueble');
    

//Departamentos
Route::get('departamentos','DepartamentoController@index');
Route::get('ciudades/{id}','DepartamentoController@ciudades');

// Mensajes
Route::get('mensajes/{id}','Mensaje\MensajeController@getMensajes');
Route::get('mensaje/{id}','Mensaje\MensajeController@getMensaje');

//Permutando
Route::post('permutando','ContactoController@permutando');