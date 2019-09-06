<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contacto;
use Mail;
use App\Mensaje;
use Auth;
use App\Contactado;

class ContactoController extends Controller
{
    public function contacto(Request $request){
        $mensaje = new Mensaje();
        $mensaje->from = Auth::User()->id;
        $mensaje->to = $request->to;
        $mensaje->inmueble = $request->inmueble;
        $mensaje->mensaje = $request->mensaje;
        $mensaje->nombre = $request->nombre;
        $mensaje->tel = $request->tel;
        $mensaje->email = $request->email;
        $mensaje->save();
        

        // $contactado = new Contactado();
        // $contactado->user_id = Auth::User()->id;
        // $contactado->inmueble_id = $request->inmueble;
        // $contactado->save();


        Mail::to('jhon54plex@hotmail.com','John Alvaro')
        ->send(new Contacto($request));
        return 200;
    }
}
