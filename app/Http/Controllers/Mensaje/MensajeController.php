<?php

namespace App\Http\Controllers\Mensaje;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mensaje;

class MensajeController extends Controller
{
    public function getMensajes($id){
        return Mensaje::where('to',$id)->get();

    }
    public function getMensaje($id){
        return Mensaje::find($id);

    }
}
