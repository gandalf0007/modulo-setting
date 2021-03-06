<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;
use Soft\Http\Requests\TransporteCreateRequest;
use Soft\Http\Requests\TransporteUpdateRequest;

use Soft\Http\Requests;
use Soft\Transporte;


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



class TransporteController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transportes=transporte::orderBy('id');

        //busquador
        $descripcion=$request->input('descripcion');
        if (!empty($descripcion)) {         
            $transportes->where('descripcion','LIKE','%'.$descripcion.'%');
        }

        $link = "transportes";
       $transportes=$transportes->paginate(10);
        return view('admin.configuracion.transporte.index',compact('link','transportes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.configuracion.transporte.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransporteCreateRequest $request)
    {
        
       transporte::create($request->all());

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Transporte Creado');
       return Redirect::to('/transporte');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {   

        if ($request->ajax()) {

            $transporte=transporte::find($id);
            return response($transporte);
            
          }


        $transporte=transporte::find($id);
        return view('admin.configuracion.transporte.edit',['transporte'=>$transporte]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransporteUpdateRequest $request)
    {   
        

            $transporte=transporte::find($request['id']);
            $transporte->fill($request->all());
            $transporte->save();


        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Transporte Modificado');
       return Redirect::to('/transporte');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transporte=transporte::find($id);
        $transporte->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Transporte Eliminado');
        return Redirect::to('/transporte');
    }
}
