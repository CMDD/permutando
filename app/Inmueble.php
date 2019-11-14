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
     $user = User::find(((int)$request->userId));
   
     $inmueble = Inmueble::find($id);
     $inmueble->tipo_publicacion = $request->tipo_publicacion;
     $inmueble->tipo_inmueble = $request->tipo_inmueble;
     $inmueble->estado = $request->tipo_publicacion;
     $inmueble->recibo_efectivo = str_replace ( ".", "",$request->recibo_efectivo);

     if($inmueble->video == "null" || $inmueble->video == ''  ){
       $inmueble->video = "";
     }else{
          $inmueble->video = $request->video;  
     }

     $inmueble->administracion = $request->administracion;
     $inmueble->anos = $request->anos;
     $inmueble->area = $request->area;

     //User
   if($request->edit == "false"){
     $inmueble->user_id = $user->id;
     $inmueble->username = $user->name;
     $inmueble->usertel = $user->tel;
     $inmueble->useremail = $user->email;
   
   }

     if($departamento and $ciudad ){

     $inmueble->departamento = $departamento->nombre;
     $inmueble->ciudad = $ciudad->nombre;
     $inmueble->departamento_id = $request->departamento;
     $inmueble->ciudad_id = $request->ciudad;
          
     }
     $inmueble->barrio = $request->barrio;
     $inmueble->direccion = $request->direccion;
    
     $inmueble->caracteristicas = $request->caracteristicas;
     $inmueble->valor = str_replace ( ".", "", $request->valor);

     if($request->file('image')){
          $inmueble->imagen = $request->file('image')->store('imagenes');
     }
     if($request->file('im2')){
          $inmueble->im2 = $request->file('im2')->store('imagenes');
     }
     if($request->file('im3')){
          $inmueble->im3 = $request->file('im3')->store('imagenes');
     }
     if($request->file('im4')){
          $inmueble->im4 = $request->file('im4')->store('imagenes');
     }
     if($request->file('im5')){
          $inmueble->im5 = $request->file('im5')->store('imagenes');
     }
     if($request->file('im6')){
          $inmueble->im6 = $request->file('im6')->store('imagenes');
     }

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
          if($request->edit == "true"){
               $indicador=0;
          foreach ((array)$request->bienes as $item) {
     
               //  $bien = new Bien();
               //  $bien->bien = $item;
               //  $bien->inmueble_id = $inmueble->id;
               //  $bien->tipo = 'Recibo';
               //  $bien->save();
     
               $bien = Bien::find($request->bien_id[$indicador]);
               $bien->bien = $item;
               $bien->valor = $request->valor_bien[$indicador];
               $bien->save();
               $indicador = $indicador +1;
              
           }

          }else{
               $indicador=0;
               foreach ((array)$request->bienes as $item) {
          
                     $bien = new Bien();
                     $bien->bien = $item;
                     $bien->inmueble_id = $inmueble->id;
                     $bien->tipo = 'Recibo';
                     $bien->save();
          
                    $bien = Bien::find($bien->id);
                    $bien->valor = $request->valor_bien[$indicador];
                    $bien->save();
                    $indicador = $indicador +1;
                   
                }
          }
          
     }

     return $inmueble->id;

    }


    public function detail($id){
         $inmueble = Inmueble::find($id);
         $inmueble->zonas;
         $inmueble->construccion;
         return $inmueble;
    }

    
}
