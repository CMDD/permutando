<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Inmueble;
use App\Zonas;
use App\Viveres;
use App\Transporte;
use App\Departamento;
use App\Ciudad;
use App\Bien;
use App\User;
use Illuminate\Session\Middleware\StartSession;
// use App\Entretenimiento;
class Inmueble extends Model
{

     public function zonas() {
         return $this->hasMany('App\Zonas');
     }
     public function transporte() {
          return $this->hasMany('App\Transporte');
     }
     public function viveres() {
          return $this->hasMany('App\Viveres');
     }
     public function entretenimiento() {
          return $this->hasMany('App\Entretenimiento');
     }
     public function educativo() {
          return $this->hasMany('App\Educativo');
     }
     public function gastronomia() {
          return $this->hasMany('App\Gastronimia');
     }
     public function mascotas() {
          return $this->hasMany('App\Mascotas');
     }
     public function modos() {
          return $this->hasMany('App\Modo');
     }
     public function construccion() {
          return $this->hasMany('App\Construccion');
     }

     
    public function store($request,$id){

     $departamento = Departamento::find((int)$request->departamento);
     $ciudad = Ciudad::find((int)$request->ciudad);
   
     $inmueble = Inmueble::find($id);
     $inmueble->tipo_publicacion = $request->tipo_publicacion;
     $inmueble->tipo_inmueble = $request->tipo_inmueble;
     $inmueble->estado = $request->tipo_publicacion;
     $inmueble->recibo_efectivo = str_replace ( ".", "",$request->recibo_efectivo);
     $inmueble->video = $request->video;
     $inmueble->area = $request->area;
     $inmueble->departamento = $departamento->nombre;
     $inmueble->ciudad = $ciudad->nombre;
     $inmueble->departamento_id = $request->departamento;
     $inmueble->ciudad_id = $request->ciudad;
     $inmueble->barrio = $request->barrio;
     $inmueble->direccion = $request->direccion;
     $inmueble->caracteristicas = $request->caracteristica;
     $inmueble->valor = str_replace ( ".", "", $request->valor);
     if($request->file('image')){
          $inmueble->imagen = $request->file('image')->store('imagenes');
     }
     // User
     $user = User::find((int)$request->userId);
     $inmueble->user_id = $user->id;
     $inmueble->username = $user->name;
     $inmueble->useremail = $user->email;
     $inmueble->usertel = $user->tel;

     $inmueble->save();
     

     if ($request->imagenes) {
          foreach ((array)$request->imagenes as $item) {
               $imagen = new Image();
               $imagen->image = $item->store('imagenes');
               $imagen->inmueble_id = $inmueble->id;
               $imagen->save();
     
          }
     }
     

     if ( $request->tipo_publicacion == "Permuto") {
          $indicador=0;
          foreach ((array)$request->bienes as $item) {
     
                $bien = new Bien();
                $bien->bien = $item;
                $bien->inmueble_id = $inmueble->id;
                $bien->save();
     
               $bien = Bien::find($bien->id);
               $bien->valor = $request->valor_bien[$indicador];
               $bien->save();
               $indicador = $indicador +1;
              
           }
     }

          return $inmueble->id;

    }
}
