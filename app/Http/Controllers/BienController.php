<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bien;
use App\Image;
class BienController extends Controller
{
    public function getBienes($id){
        return Bien::where('inmueble_id',$id)->get();
    }

    public function getImagenes(){
        return Image::all();
    }
}
