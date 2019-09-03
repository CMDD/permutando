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

     
    public function storeCasa($request){
     $departamento = Departamento::find((int)$request->departamento);
     $ciudad = Ciudad::find((int)$request->ciudad);
   
     $inmueble =new Inmueble();
     $inmueble->tipo_publicacion = $request->tipo_publicacion;
     $inmueble->tipo_inmueble = $request->tipo_inmueble;
     $inmueble->estado = $request->tipo_publicacion;
     $inmueble->recibo_efectivo = $request->recibo_efectivo;
     
     $inmueble->departamento = $departamento->nombre;
     $inmueble->ciudad = $ciudad->nombre;

     $inmueble->departamento_id = $request->departamento;
     $inmueble->ciudad_id = $request->ciudad;

     $inmueble->barrio = $request->barrio;
     $inmueble->direccion = $request->direccion;
     $inmueble->estrato = $request->estrato;
     $inmueble->area = $request->area;
     $inmueble->habitaciones = $request->habitaciones;
     $inmueble->banos = $request->banos;
     $inmueble->balcon = (boolean)$request->balcon;
     $inmueble->terraza = (boolean)$request->terraza;
     $inmueble->parqueadero = (boolean)$request->parqueadero;
     $inmueble->porteria = $request->porteria;
     $inmueble->caracteristicas = $request->caracteristica;
     $inmueble->valor = $request->valor;

          // User
          $user = User::find($request->userId);
          $inmueble->user_id = $user->id;
          $inmueble->username = $user->name;
          $inmueble->useremail = $user->email;
          $inmueble->usertel = $user->tel;

     if($request->file('image')){
          $inmueble->imagen = $request->file('image')->store('imagenes');
      }
     
     $inmueble->save();



     foreach ((array)$request->zonas as $item) {
          $zona = new Zonas();
           $zona->nombre = $item;
           $zona->inmueble_id = $inmueble->id;
           $zona->save();

      }
     foreach ((array)$request->imagenes as $item) {
           $imagen = new Image();
           $imagen->image = $item->store('imagenes');
           $imagen->inmueble_id = $inmueble->id;
           $imagen->save();

      }
     foreach ((array)$request->bienes as $item) {

           $bien = new Bien();
           $bien->bien = $item;
           $bien->inmueble_id = $inmueble->id;
           $bien->save();
           foreach ((array)$request->valor_bien as $item) {

               $bien = Bien::find($bien->id);
               $bien->valor = $item;
               $bien->save();
               break;

          }
      }
     return "llegando";
    }
}
