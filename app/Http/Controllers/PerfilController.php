<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;
use App\Image;
class PerfilController extends Controller
{

    public function _construct(){
        $this->middleware('auth');
    }
    public function misInmuebles($id){

        return Inmueble::where('user_id',$id)->get();

    }

    public function detalle($id){
        $inmueble = new Inmueble();
         

        return view('perfil.detalle')->with('inmueble',$inmueble->detail($id));
    }
}
