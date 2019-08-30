<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Ciudad;

class DepartamentoController extends Controller
{
    public function index(){
        return Departamento::all();
    }

    public function ciudades($id){
        return Ciudad::where('departamento_id',$id)->get();
    }
}
