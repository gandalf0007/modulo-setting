<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;
use Soft\Http\Requests\MercadoPagoCreateRequest;

use Soft\Mercadopago;

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


class MercadoPagoController extends AdminBaseController
{
    

    public function index()
    {
        $mercadopago=Mercadopago::first();
        return view("admin.configuracion.mercadopago.index",compact('mercadopago'));
    }


    public function store(MercadoPagoCreateRequest $request)
    {
       $mercadopago = new Mercadopago;
        $mercadopago->private_key = $request['private_key'];
        $mercadopago->public_key = $request['public_key'];
        $mercadopago->porcentaje = $request['porcentaje'];
        $mercadopago->save();
        
        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Datos Guardados');
       return Redirect::back();
    }


    
    public function update(MercadoPagoCreateRequest $request, $id)
    {
         $mercadopago=Mercadopago::find($id);
        $mercadopago->fill($request->all());
        $mercadopago->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Datos Guardados');
       return Redirect::back();
    }

 
    public function destroy($id)
    {
        //
    }
}
