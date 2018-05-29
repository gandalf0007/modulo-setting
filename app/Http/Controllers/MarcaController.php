<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;
use Soft\Http\Requests\MarcaCreateRequest;
use Soft\Http\Requests\MarcaUpdateRequest;
use Soft\Marca;


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

class MarcaController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $marcas=marca::orderBy('id','des');
        //lo que ingresamos en el buscador lo alamacenamos en $usu_nombre
        $descripcion=$request->input('descripcion');
        //preguntamos que si ($usu_nombre no es vacio
        if (!empty($descripcion)) {
            //entonces me busque de usu_nombre a el nombre que le pasamos atraves de $usu_nombre
            $marcas->where('descripcion','LIKE','%'.$descripcion.'%');
        }
        //realizamos la paginacion
        $marcas=$marcas->paginate(10);
        //retorna a una vista que esta en la carpeta usuario y dentro esta index
        //compact es para enviarle informaion a esa vista index , y le mandamos ese users que creamos
        //que contiene toda la informacion
        $link = "marcas";
        return view('admin.configuracion.marca.index',compact('link','marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.configuracion.marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarcaCreateRequest $request)
    {   

         if(!empty($request->hasFile('imagen'))){
           $imagen = $request->file('imagen');
            $filename=time() . '.' . $imagen->getClientOriginalExtension();
            //crea la carpeta
            //torage::makeDirectory($directory);
            //esto es para q funcione en local 
            //image::make($imagen->getRealPath())->save( public_path('storage/'.$directory.'/'. $filename));
            image::make($imagen->getRealPath())->save('storage/marcas/'. $filename);

        }elseif(empty($request->hasFile('imagen'))){
            $filename = null;
        }



        marca::create([
            'descripcion' =>$request['descripcion'],
            'imagen' => $filename,
            ]);


        Alert::success('Mensaje existoso', 'Marca Creada');
        return redirect('/marcas');
    }




    public function edit($id)
    {
        //creamos un $marca que va a hacer igual a la marca que encontremos con la id que recibimos 
        $marca=marca::find($id);
        //nos regrasa a la vista en edit que se encuentra en la carpeta usuario a la cual le pasamos el 
        //user correspondiente
        
        return view('admin.configuracion.marca.edit',['marca'=>$marca]);
    }





    public function update(MarcaUpdateRequest $request, $id)
    {
       $marca=marca::find($id);

        if(!empty($request->hasFile('imagen'))){
           $imagen = $request->file('imagen');
            $filename=time() . '.' . $imagen->getClientOriginalExtension();
            
            //eliminamos la imagen anterior
            \Storage::disk('marcas')->delete($marca->imagen);
            
            image::make($imagen->getRealPath())->save('storage/marcas/'. $filename);

        }elseif(empty($request->hasFile('imagen'))){
            $filename = null;
        }



       $marca->descripcion = $request['descripcion'];
       $marca->imagen = $filename;
       $marca->save();

        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Marca Modificada');
       return Redirect::to('/marcas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca=marca::find($id);
        $marca->delete();

        //elimino la imagen
         \Storage::disk('marcas')->delete($marca->imagen);
        
        //le manda un mensaje al usuario
            Alert::success('Mensaje existoso', 'Marca Eliminada');
        return Redirect::to('/marcas');
    }
}
