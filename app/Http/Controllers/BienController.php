<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bien;
use App\Image;
use App\Inmueble;
class BienController extends Controller
{
    public function getBienes($id){
        return Bien::where('inmueble_id',$id)->where('tipo','Recibo')->get();
    }

    public function getImagenes(){
        return Image::all();
    }

    public function getBienesTipo(Request $request){
        return Bien::where('mensaje_id',$request->mensaje['id'])->where('tipo',$request->tipo)->get();
    }

    public function eliminarBien($id){
        Bien::destroy($id);
        

        return 200;

    }

    public function editarReciboEfectivo(Request $request){
        $inmueble = Inmueble::find($request->id);
        $inmueble->recibo_efectivo = $request->recibo_efectivo;
        $inmueble->save();

        return $request;
        
    }
}
