<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Inmueble;
use App\Modo;
use Illuminate\Support\Collection as Collection;


class InmuebleController extends Controller
{
    public function store(Request $request){

        switch ($request->tipo_inmueble) {
            case 'Casa':
                $inmueble = new Inmueble();
                return $inmueble->storeCasa($request);
                break;
            
            default:
                # code...
                break;
        }

        return $request->userId;
    }
    public function detalle($id){
    
        $inmueble = Inmueble::find($id);
        return view('admin.inmueble.detalle')->with('inmueble');

    }

    public function lista(){
      $inmueble =  Inmueble::orderBy('id','DESC');
      return Datatables::of($inmueble)
                //  ->addColumn('btn','ixtus.partials.botones_suscripcion')
                ->addColumn('btn', function ($inmueble) {
                return '
                <a class="btn btn-primary btn-sm"  href=" '.url('detalle-inmueble', $inmueble->id) . '">
                  <i class="fa fa-eye"></i>
                </a>';
                })
                ->rawColumns(['btn'])
                ->make(true);
    }

    //Buscadores
    public function buscarTipo($tipo){
        return Inmueble::where('tipo_inmueble',$tipo)->get();

    }
    public function buscarModo($tipo,$modo){
      return  Inmueble::where('tipo_inmueble',$tipo)->where('tipo_publicacion',$modo)->get();   
    }
    public function info($id){
        return Inmueble::find($id);

    }
    public function listaMap(){
        return Inmueble::all();
    }
}
