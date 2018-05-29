<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\Punto;
use Soft\User;

use Notification;
use DataTables;
use Debugbar;
use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;
use Auth;
use Flash;
use Toastr;
use Carbon\Carbon;
use Exception;
use MP;
use Input;
use Hash;
use View;


class PuntosController extends AdminBaseController
{


    //con este constructor llamo a las variales que hay en la clase padre que es BaseController
 public function __construct(){
       parent::__construct();
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $user = \Session::get('usuario');
        $punto = punto::first();
        $link = "Sistema de Puntos";
        $users = User::all();
        return view('admin.configuracion.puntos.index',compact('link','punto','users'));
    }




    public function update(Request $request)
    {
        $punto= punto::first();

         if($punto == null){
            $punto = new Punto;
            $punto->porcentaje = $request['porcentaje'];
            $punto->save();
         }else{
            $punto->porcentaje = $request['porcentaje'];
            $punto->save();
         }

    
        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'porcentaje Modificado');
       return Redirect::to('/puntos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $punto=punto::first();
        if($punto != null){
            $punto->delete();
        }
        
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'porcentaje Eliminado');
        return Redirect::to('/puntos');
    }





/*---------------------------------Agregar Puntos--------------------------------------*/
 public function AgregarPuntos(request $request,$id)
    {

        \Session::forget('usuario');
        $user = \Session::get('usuario');

        $user  = user::find($id);
        $user->puntos = $user->puntos + $request['puntos'];
        $user->save();

        $user = $user;

       
        \Session::put('usuario', $user);
         return redirect('/puntos');
     }
/*---------------------------------Agregar Puntos--------------------------------------*/
}
