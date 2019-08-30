<?php

namespace App\Http\Controllers\Perfil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inmueble;

class BuscoController extends Controller
{
    public function buscoIndex(Request $request){
        $inmueble = Inmueble::where('tipo_inmueble',$request->tipo)
        ->where('tipo_publicacion',$request->en)
        ->where('departamento_id',$request->departamento)
        ->where('ciudad_id',$request->ciudad)->get();
        return $inmueble;
    }
}
