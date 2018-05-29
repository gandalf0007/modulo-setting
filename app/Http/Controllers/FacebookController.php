<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;

use Soft\Facebook;


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


class FacebookController extends AdminBaseController
{
    
     public function index()
    {
         $boxs=Facebook::all();
        return view("admin.configuracion.facebook.index",compact('boxs'));
    }


    
    public function store(Request $request)
    {
        Facebook::create($request->all());

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'box Creado');
       return Redirect::back();
    }

    
    
   
    public function update(Request $request, $id)
    {
          $box=Facebook::find($id);
        $box->fill($request->all());
        $box->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'box Modificado');
       return Redirect::back();
    }

  
    public function destroy($id)
    {
         $box=Facebook::find($id);
        $box->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'box Eliminado');
        return Redirect::back();
    }
}
