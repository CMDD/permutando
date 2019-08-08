<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contacto;
use Mail;

class ContactoController extends Controller
{
    public function contacto(Request $request){
        Mail::to('jhon54plex@hotmail.com','John Alvaro')
        ->send(new Contacto($request));
        return back();
    }
}
