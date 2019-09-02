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
    return view('index');
});

Route::post('registro','UserController@registro');
Route::post('autenticar','UserController@autenticar');
Route::get('logout','UserController@logout');

// Admin
Route::get('admin',function(){return view('admin.index');});
Route::get('lista-usuarios',function(){return view('admin.usuario.lista');});
Route::get('lista-inmuebles',function(){return view('admin.inmueble.lista');});
Route::get('detalle-inmueble/{id}','InmuebleController@detalle');

//Rutas de Perfil
Route::get('perfil-mis-publicaciones',function(){return view('perfil.publicaciones');});
Route::get('perfil-publicar',function(){return view('perfil.publicar.index');});
Route::get('perfil-publicar-oficina',function(){return view('perfil.publicar.oficina');});
Route::get('perfil-index',function(){return view('perfil.index');});
Route::get('perfil-detalle/{id}','PerfilController@detalle');
Route::get('perfil-mensajes',function(){
    return view("perfil.mensajes");
});

Route::get('perfil-buscar',function(){
    return view('perfil.busco.index');
});

//  Inmueble
Route::get('inmueble-editar',function(){
    return view('perfil.editar');
});

//Contacto
Route::post('contacto','ContactoController@contacto');
Route::get('contacto',function(){
    return view('contacto');
});
