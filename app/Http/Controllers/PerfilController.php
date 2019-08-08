<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;

class PerfilController extends Controller
{
    public function misInmuebles($id){

        return Inmueble::where('user_id',$id)->get();

    }

    public function detalle($id){
        $inmueble = Inmueble::find($id);
        return view('perfil.detalle')->with('inmueble',$inmueble);
    }
}
