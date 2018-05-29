<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Banner;

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


class BannerController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $banners=Banner::paginate(10);

        return view ('admin.configuracion.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //retorna a una vista que esta en la carpeta usuario y dentro esta create
        return view('admin.configuracion.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
         //carga de imagen atraves de intervention el paquete de imagen
        if ($request->hasFile('imagen')) {
            $avatar =$request->file('imagen');
            $filename=time() . '.' . $avatar->getClientOriginalExtension();
        image::make($avatar->getRealPath())->save('storage/paginas/home/carrucel/' . $filename);
           
            $ruta = 'storage/paginas/home/carrucel/' . $filename;
        }


        $banner = new Banner;
        $banner->titulo = $request['titulo'];
        $banner->descripcion = $request['descripcion'];
        $banner->imagen = $ruta;
        $banner->save();



       
        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Banner Creado');
       return Redirect::to('/banner');
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

         //carga de imagen atraves de intervention el paquete de imagen
        if ($request->hasFile('imagen')) {
            $avatar =$request->file('imagen');
            $filename=time() . '.' . $avatar->getClientOriginalExtension();
            image::make($avatar->getRealPath())->save('storage/paginas/home/carrucel/' . $filename);
            $ruta = 'storage/paginas/home/carrucel/' . $filename;

        }


        $banner = Banner::find($id);
        $banner->titulo = $request['titulo'];
        $banner->descripcion = $request['descripcion'];
        $banner->imagen = $ruta;
        $banner->save();


         //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Banner Modificado');
        return Redirect::to('/banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagenes=Banner::find($id);
        $imagenes->delete();
        \Storage::disk('carrucel')->delete($imagenes->imagen);
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Banner Eliminada');
       return Redirect::to('/banner');
    }
}
