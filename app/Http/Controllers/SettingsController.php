<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Setting;

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


class SettingsController extends AdminBaseController
{

    public function index()
    {
        //
    }




    public function create()
    {
        //
    }



    public function store(Request $request)
    {
            $setting = new Setting;
            $setting->empresa = $request['empresa'];
            $setting->direccion = $request['direccion'];
            $setting->telefono = $request['telefono'];
            $setting->email = $request['email'];
            $setting->whatsapp = $request['whatsapp'];
            $setting->linkfacebook = $request['linkfacebook'];
            $setting->linkyoutube = $request['linkyoutube'];
            $setting->linktwitter = $request['linktwitter'];
            $setting->linkgoogle = $request['linkgoogle'];
            $setting->linkinstagram = $request['linkinstagram'];

            $setting->save();

       
        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Configuracion guardada');
       return Redirect::to('/settings');
    }




    public function show($id)
    {
        //
    }




    public function edit($id)
    {
        //
    }




    public function update(Request $request, $id)
    {
        $setting =  Setting::find($id);
        $setting->empresa = $request['empresa'];
        $setting->direccion = $request['direccion'];
        $setting->telefono = $request['telefono'];
        $setting->email = $request['email'];
        $setting->whatsapp = $request['whatsapp'];
        $setting->linkfacebook = $request['linkfacebook'];
        $setting->linkyoutube = $request['linkyoutube'];
        $setting->linktwitter = $request['linktwitter'];
        $setting->linkgoogle = $request['linkgoogle'];
        $setting->linkinstagram = $request['linkinstagram'];
        $setting->save();

       
        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Configuracion guardada');
       return Redirect::to('/settings');
    }




    public function destroy($id)
    {
        //
    }
}
