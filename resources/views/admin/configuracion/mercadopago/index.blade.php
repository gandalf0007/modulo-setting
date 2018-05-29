@extends('layouts.admin-pro')
@section('content')
@include('alerts.errors')
@include('alerts.request')
@include('alerts.success')
@include('flash::message')



           <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><i class="mdi mdi-cash"></i>
                  <span class="caption-subject font-red sbold uppercase">Setting Mercadopago</span></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('/panel') !!}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="#">Setting</a></li>
                            <li class="breadcrumb-item active"><a href="{!! URL::to('/mercadopago') !!}">Mercadopago</a></li>
                        </ol>
                    </div>
                </div>




 <div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-header bg-info">
            <h4 class="m-b-0 text-white">Configurar MercadoPago</h4>
        </div>
        <div class="card-body">
          
         <h6 class="card-subtitle"> <p>Para obtener las private_key y public_key ingresar a <a href="https://www.mercadopago.com/mla/account/credentials?type=basic">MercadoPago</a></p></h6>
              
     
       
           @if(!empty($mercadopago))

    {!!Form::model($mercadopago,['url'=>['mercadopago-update',$mercadopago->id],'method'=>'PUT' , 'files'=>True])!!}
      @include('admin.configuracion.mercadopago.forms.mercadopago')
    {!!Form::close()!!}

        @else

        {!!Form::open(['url'=>['mercadopago-store'],'method'=>'POST' , 'files'=>True])!!}
           @include('admin.configuracion.mercadopago.forms.mercadopagoCreate')
        {!!Form::close()!!}

        @endif



        </div>
     </div>
</div>
</div>







@section('mis-scripts')
<!--switch-->
 <script>
    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
    });
    </script>
@stop



@endsection