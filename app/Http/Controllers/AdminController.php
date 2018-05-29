<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;

use Soft\Facebook;
use Soft\Logo;
use Soft\Recaptcha;
use Soft\Mercadopago;
use Soft\Ticket;
use Soft\Servicio;
use Soft\Venta;
use Soft\Sociallink;
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


class AdminController extends AdminBaseController
{   


    public function Admin(){
        $userId = Auth::user()->id;
        $ticket = Ticket::where('user_id','=',$userId)->count();
        $serviciosVencer = Servicio::where('user_id','=',$userId)->count();
        $totalServicios = Servicio::where('user_id','=',$userId)->count();
        $totalCompras = Venta::where('user_id','=',$userId)->count();

        return view ('admin.index',compact('ticket','serviciosVencer','totalServicios','totalCompras'));
    }


    public function Config(){
        $logo=Logo::first();
        $sociallinks = Sociallink::all();
        $settings = Setting::first();
        return view ('admin.configuracion.generales.index',compact('settings','logo','boxs','recaptcha','mercadopago','sociallinks'));
    }


    public function panel(){
        $logo=Logo::first();
        $sociallinks = Sociallink::all();
        $settings = Setting::first();
        return view ('admin.index',compact('settings','logo','boxs','recaptcha','mercadopago','sociallinks'));
    }



}
