@extends('layouts.admin-pro')
@section('content')
@include('alerts.errors')
@include('alerts.request')
@include('alerts.success')
@include('flash::message')



           <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><img src="admin/adminpro/images/icon/captcha.png" alt="" class="responsive">
                  <span class="caption-subject font-red sbold uppercase">Setting ReCapha</span></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('/panel') !!}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="#">Setting</a></li>
                            <li class="breadcrumb-item active"><a href="{!! URL::to('/recaptcha') !!}">ReCapha</a></li>
                        </ol>
                    </div>
                </div>



<div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-header bg-info">
            <h4 class="m-b-0 text-white">Configurar ReCaptcha</h4>
        </div>
        <div class="card-body">
          
         <h6 class="card-subtitle"> <p>Para obtener las private_key y public_key ingresar a <a href="https://www.google.com/recaptcha/admin#list">Recaptcha</a></p></h6>
              
     
       
           @if(!empty($recaptcha))

    {!!Form::model($recaptcha,['url'=>['recaptcha-update',$recaptcha->id],'method'=>'PUT' , 'files'=>True])!!}
      @include('admin.configuracion.recaptcha.forms.captcha')
    {!!Form::close()!!}

        @else

        {!!Form::open(['url'=>['recaptcha-store'],'method'=>'POST' , 'files'=>True])!!}
           @include('admin.configuracion.recaptcha.forms.captchaCreate')
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