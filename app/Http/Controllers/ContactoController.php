<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contacto;
use Mail;
use App\Mensaje;
use Auth;
use App\Contactado;
use App\Bien;
use App\User;

class ContactoController extends Controller
{
    public function contacto(Request $request){
        $mensaje = new Mensaje();
        $mensaje->from = Auth::User()->id;
        $mensaje->to = (int)$request->to;
        $mensaje->inmueble = $request->inmueble;
        $mensaje->tipo = 'Mensaje';
        $mensaje->mensaje = $request->mensaje;
        $mensaje->nombre = $request->nombre;
        $mensaje->tel = $request->tel;
        $mensaje->email = $request->email;
        $mensaje->save();
        
        // $user = User::find($request->to);
        // $contactado = new Contactado();
        // $contactado->user_id = Auth::User()->id;
        // $contactado->inmueble_id = $request->inmueble;
        // $contactado->save();


        // Mail::to($user->email,$user->name)
        // ->send(new Contacto($request));
        return $request;
    }

    public function permutando(Request $request){
        
        
        $mensaje = new Mensaje();
        $mensaje->from = $request->user['id'];
        $mensaje->to = (int)$request->to;
        $mensaje->tipo = $request->tipo;
        $mensaje->mensaje = "Permuto";
        $mensaje->inmueble = $request->inmueble;
        $mensaje->nombre = $request->user['name'];
        $mensaje->tel = $request->user['tel'];
        $mensaje->email = $request->user['email'];
        $mensaje->save();

        $indicador=0;
          foreach ((array)$request->bienes as $item) {
     
                $bien = new Bien();
                $bien->bien = $item;
                $bien->inmueble_id = $request->inmueble;
                $bien->tipo ='Ofrezco';
                $bien->mensaje_id = $mensaje->id;
                $bien->save();
     
               $bien = Bien::find($bien->id);
               $bien->valor = $request->valor_bien[$indicador];
               $bien->save();
               $indicador = $indicador +1;
              
           }
        return 'llegando';
    }
}
