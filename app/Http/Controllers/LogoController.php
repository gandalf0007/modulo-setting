<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;

use Soft\Logo;

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


class LogoController extends Controller
{
    

    

    public function store(Request $request)
    {
     
      //carga de imagen atraves de intervention el paquete de imagen
        if ($request->hasFile('imagen')) {
         
            $avatar =$request->file('imagen');
            $filename=time() . '.' . $avatar->getClientOriginalExtension();
            image::make($avatar->getRealPath())->save( 'storage/logo/' . $filename);

            Logo::create([
            'logo' =>$filename,
            ]);

        }
        
       
        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'logo Creado');
       return Redirect::to('/settings');
    }

    

    public function update(Request $request)
    {
         $logos=Logo::first();

         //carga de imagen atraves de intervention el paquete de imagen
         
        if ($request->hasFile('imagen')) {
            $avatar =$request->file('imagen');
            $filename=time() . '.' . $avatar->getClientOriginalExtension();
            image::make($avatar->getRealPath())->save( 'storage/logo/' . $filename);

            //elimino el logo anterior
             \Storage::disk('logo')->delete($logos->logo);

            $logos->logo = $filename;
            $logos->save();
        }
         //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Logo Modificado');
        return Redirect::to('/settings');
    }


    public function destroy()
    {
        
        $logos=Logo::first();
        $logos->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'logo Eliminada');
       return Redirect::to('/settings');
    }








    public function faviconStore(Request $request)
    {
     
      //carga de imagen atraves de intervention el paquete de imagen
        if ($request->hasFile('favicon')) {
         
            $favicon =$request->file('favicon');
            $filename=time() . '.' . $favicon->getClientOriginalExtension();
             \Storage::disk('logo')->put($filename,  \File::get($favicon));

        
            $logos=Logo::first();
            $logos->favicon = "storage/logo/".$filename;
            $logos->save();

        }
        
       
        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Favicon Guardado');
       return Redirect::to('/settings');
    }

    

    public function faviconUpdate(Request $request)
    {
         $logos=Logo::first();

         //carga de imagen atraves de intervention el paquete de imagen
         
        if ($request->hasFile('favicon')) {
            $favicon =$request->file('favicon');
            $filename=time() . '.' . $favicon->getClientOriginalExtension();
            \Storage::disk('logo')->put($filename,  \File::get($favicon));
            //elimino el logo anterior

            $logos->favicon = "storage/logo/".$filename;
            $logos->save();
        }
         //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Favicon Guardado');
        return Redirect::to('/settings');
    }


    public function faviconDestroy()
    {
        
        $logos=Logo::first();
        $logos->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Favicon Eliminada');
       return Redirect::to('/settings');
    }
}
