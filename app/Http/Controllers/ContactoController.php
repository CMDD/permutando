<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contacto;
use Mail;
use App\Mensaje;

class ContactoController extends Controller
{
    public function contacto(Request $request){
        $mensaje = new Mensaje();
        $mensaje->from = 2;
        $mensaje->to = $request->to;
        $mensaje->inmueble = $request->inmueble;
        $mensaje->mensaje = $request->mensaje;
        $mensaje->save();
        dd($request->inmueble);

        Mail::to('jhon54plex@hotmail.com','John Alvaro')
        ->send(new Contacto($request));
        return back();
    }
}
