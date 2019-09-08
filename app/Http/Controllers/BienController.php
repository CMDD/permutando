<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bien;
use App\Image;
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
}
