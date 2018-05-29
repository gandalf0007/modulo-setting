<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Information;

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
use Currency; 
use GuzzleHttp\Client;

class InformationController extends AdminBaseController
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $Informations = Information::first();
        return view('admin.configuracion.informacion.index',compact('Informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //retorna a una vista que esta en la carpeta usuario y dentro esta create
        return view('admin.configuracion.informacion.create');
    }

   


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        web_informacion::create($request->all());

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Informacion Guardada');
       return Redirect::to('/webconfig-footer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $info=web_informacion::find($id);
        $info->fill($request->all());
        $info->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Informacion Guardada');
       return Redirect::to('/webconfig-footer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $info=web_informacion::find($id);
        $info->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Informacion Eliminada');
        return Redirect::to('/webconfig-footer');
    }
}
