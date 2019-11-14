<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Inmueble;
use App\Modo;
use App\Zonas;
use App\Construccion;

use Illuminate\Support\Collection as Collection;


class InmuebleController extends Controller
{
    public function store(Request $request){

        switch ($request->tipo_inmueble) {
            case 'Casa':
            case 'Apartamento':            
                $inmueble = new Inmueble();
                $inmueble->barrio = $request->barrio;
                $inmueble->area = $request->area;
                $inmueble->direccion = $request->direccion;
                $inmueble->estrato = $request->estrato;
                $inmueble->habitaciones = $request->habitaciones;
                $inmueble->banos = $request->banos;
                $inmueble->balcon = (boolean)$request->balcon;
                $inmueble->terraza = (boolean)$request->terraza;
                $inmueble->parqueadero = (boolean)$request->parqueadero;
                $inmueble->porteria = $request->porteria;
                $inmueble->caracteristicas = $request->caracteristica;
                $inmueble->valor = $request->valor;
                $inmueble->patio = $request->patio;
                $inmueble->save();
                foreach ((array)$request->zonas as $item) {
                     $zona = new Zonas();
                     $zona->nombre = $item;
                     $zona->inmueble_id = $inmueble->id;
                     $zona->save();
          
                }
                return $inmueble->store($request,$inmueble->id);
                break;
            case 'Bodega':
                $inmueble = new Inmueble();
                $inmueble->carga_psi = $request->carga_psi;
                $inmueble->capacidad_luz = $request->capacidad_luz;
                $inmueble->parque_industrial = $request->parque_industrial;
                $inmueble->altura = $request->altura;
                $inmueble->area_fondo = $request->area_fondo;
                $inmueble->area_ancho = $request->area_ancho;
                $inmueble->save();
                return $inmueble->store($request,$inmueble->id);
                break;
            case 'Lote':
                $inmueble =new Inmueble();
                $inmueble->topografia = $request->topografia;
                $inmueble->vias = $request->vias;
                $inmueble->save();
                return $inmueble->store($request,$inmueble->id);
                break;
            case 'Oficina':
                $inmueble =new Inmueble();
                $inmueble->espacio = $request->espacio;
                $inmueble->parqueadero = (boolean)$request->parqueadero;
                $inmueble->porteria = $request->porteria;
                $inmueble->save();
                return $inmueble->store($request,$inmueble->id);
                break;
            case 'Edificio':
                $inmueble =new Inmueble();
                $inmueble->area_lote = $request->area_lote;
                $inmueble->area_construida = $request->area_construida;
                $inmueble->pisos = $request->pisos;
                $inmueble->ascensor = $request->ascensor;
                $inmueble->parqueadero = (boolean)$request->parqueadero;
                $inmueble->save();
                foreach ((array)$request->tipo_construccion as $item) {
                    $construccion = new Construccion();
                    $construccion->nombre = $item;
                    $construccion->inmueble_id = $inmueble->id;
                    $construccion->save();
               }
                return $inmueble->store($request,$inmueble->id);
                break;
            case 'Casa Lote':
            case 'Quinta':
            case 'Finca':
            case 'Hacienda':
                $inmueble =new Inmueble();
                $inmueble->area_lote = $request->area_lote;
                $inmueble->area_construida = $request->area_construida;
                $inmueble->save();
                foreach ((array)$request->tipo_construccion as $item) {
                    $construccion = new Construccion();
                    $construccion->nombre = $item;
                    $construccion->inmueble_id = $inmueble->id;
                    $construccion->save();
               }
                return $inmueble->store($request,$inmueble->id);
                break;
            
            default:
                # code...
                break;
        }

        return $request;
    }
    public function editar(Request $request){
        switch ($request->tipo_inmueble) {
            case 'Casa':
            case 'Apartamento':            
                $inmueble = Inmueble::find($request->id);
                $inmueble->barrio = $request->barrio;
                $inmueble->direccion = $request->direccion;
                $inmueble->estrato = $request->estrato;
                $inmueble->habitaciones = $request->habitaciones;
                $inmueble->banos = $request->banos;
                $inmueble->balcon = (boolean)$request->balcon;
                $inmueble->terraza = (boolean)$request->terraza;
                $inmueble->parqueadero = (boolean)$request->parqueadero;
                $inmueble->porteria = $request->porteria;
                $inmueble->patio = $request->patio;
                
                $inmueble->valor = $request->valor;
                $inmueble->save();
                
                
                 
                // foreach ((array)$request->zonas as $item) {
                //     $zona = Zonas::where('inmueble_id',$inmueble->id)->first();
                //      $zona->delete();
                //      $zona = Zonas::where('inmueble_id',$inmueble->id)->first();
                //      $zona->nombre = $item;
                //      $zona->inmueble_id = $inmueble->id;
                //      $zona->save();
          
                // }
            
                return $inmueble->store($request,$inmueble->id);
                break;
            case 'Bodega':
                $inmueble = Inmueble::find((int)$request->id);
                $inmueble->carga_psi = $request->carga_psi;
                $inmueble->capacidad_luz = $request->capacidad_luz;
                $inmueble->parque_industrial = $request->parque_industrial;
                $inmueble->altura = $request->altura;
                $inmueble->area_fondo = $request->area_fondo;
                $inmueble->area_ancho = $request->area_ancho;
                $inmueble->save();
              
                return $inmueble->store($request,$inmueble->id);
                break;
            case 'Lote':
                $inmueble = Inmueble::find($request->id);
                $inmueble->topografia = $request->topografia;
                $inmueble->vias = $request->vias;
                $inmueble->save();
                return $inmueble->store($request,$inmueble->id);
                break;
            case 'Oficina':
            $inmueble = Inmueble::find($request->id);
                $inmueble->espacio = $request->espacio;
                $inmueble->parqueadero = (boolean)$request->parqueadero;
                $inmueble->porteria = $request->porteria;
                $inmueble->save();
                return $inmueble->store($request,$inmueble->id);
                break;
            case 'Edificio':
                $inmueble = Inmueble::find($request->id);
                $inmueble->area_lote = $request->area_lote;
                $inmueble->area_construida = $request->area_construida;
                $inmueble->pisos = $request->pisos;
                $inmueble->ascensor = $request->ascensor;
                $inmueble->parqueadero = (boolean)$request->parqueadero;
                $inmueble->save();
                foreach ((array)$request->tipo_construccion as $item) {
                    $construccion = new Construccion();
                    $construccion->nombre = $item;
                    $construccion->inmueble_id = $inmueble->id;
                    $construccion->save();
               }
                return $inmueble->store($request,$inmueble->id);
                break;
            case 'Casa Lote':
            case 'Quinta':
            case 'Finca':
            case 'Hacienda':
                $inmueble = Inmueble::find($request->id);
                $inmueble->area_lote = $request->area_lote;
                $inmueble->area_construida = $request->area_construida;
                $inmueble->save();
                foreach ((array)$request->tipo_construccion as $item) {
                    $construccion = new Construccion();
                    $construccion->nombre = $item;
                    $construccion->inmueble_id = $inmueble->id;
                    $construccion->save();
               }
                return $inmueble->store($request,$inmueble->id);
                break;
            
            default:
                # code...
                break;
        }

        return $request;

    }

    public function detalle($id){
        
        $inmueble =  new Inmueble();
        $inmueble->detail($id);
        dd($inmueble);
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
    public function buscarAll(){
        return Inmueble::where('publicar',1)->get();
    }
    public function buscarTipo($tipo){
        return Inmueble::where('tipo_inmueble',$tipo)->where('publicar',1)->get();

    }
    public function buscarDepartamento(Request $request){
        return Inmueble::where('tipo_inmueble',$request->tipo)->where('departamento_id',$request->departamento)->where('publicar',1)->get();

    }
    public function buscarEn(Request $request){
        return Inmueble::where('tipo_inmueble',$request->tipo)->where('tipo_publicacion',$request->en)->where('publicar',1)->get();

    }
    public function buscarModo($tipo,$modo){
      return  Inmueble::where('tipo_inmueble',$tipo)->where('tipo_publicacion',$modo)->where('publicar',1)->get();   
    }
    public function info($id){
        return Inmueble::find($id);

    }
    public function listaMap(){
        return Inmueble::all();
    }
    public function estado(Request $request){
        $inmueble = Inmueble::find((int)$request->id);
        $inmueble->publicar = (int)$request->estado;
        $inmueble->save();
        return $inmueble;
    }

    public function deleteImage($img,$id){
        $inmueble = Inmueble::find($id);
        $inmueble->$img = null;
        $inmueble->save();
        return "Imagen eliminada correctamente";
  }
    public function deleteInmueble($id){
        $inmueble = Inmueble::find($id);
        $inmueble->delete();
        return "Inmueble eliminado correctamente";
  }

  public function publicarInmueble($id){
    $inmueble = Inmueble::find($id);
    $inmueble->publicar = true;
    $inmueble->save();
    return "Inmueble eliminado correctamente";
  }
  public function ocultarInmueble($id){
    $inmueble = Inmueble::find($id);
    $inmueble->publicar = false;
    $inmueble->save();
    return "Inmueble pausado correctamente";
  }
 
}
