<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Redirect;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function registro(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if($request->web == 'si'){

          if (Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])) {
            return Redirect::to('/perfil-publicar');
            // return 200;
          }
        }else{
          if (Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])) {
            // return Redirect::to('/perfil-publicar');
            return 200;
        }else{
           return 100;
        }
         
      }
      
        return Redirect::to('/');
    }

    public function autenticar(Request $request){
          if($request->web == 'si'){
            if (Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])) {
              return Redirect::to('/perfil-publicar');
              
            }else{
              return Redirect::to('/');
            }

          }else{
            if (Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])) {
              // return Redirect::to('/perfil-publicar');
              return 200;
            }
            return 100;
          }

      
    }
    public function logout(){
      Auth()->logout();
      return  Redirect::to('/');
    }


    public function lista(){
      $users =  User::orderBy('id','DESC');

      return Datatables::of($users)
                //  ->addColumn('btn','ixtus.partials.botones_suscripcion')
                ->addColumn('btn', function ($users) {
                return '
                <a class="btn btn-primary btn-sm"  href="#">
                  <i class="fa fa-eye"></i>
                </a>';
                })
                ->rawColumns(['btn'])
                ->make(true);
    }
}
