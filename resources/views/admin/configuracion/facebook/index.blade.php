@extends('layouts.admin-pro')
@section('content')
@include('alerts.errors')
@include('alerts.request')
@include('alerts.success')
@include('flash::message')



           <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><img src="{{ url('admin/adminpro/images/icon/facebook.svg') }}" alt="" width="50" height="50" class="responsive">
                  <span class="caption-subject font-red sbold uppercase">Setting Facebook</span></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('/panel') !!}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="#">Setting</a></li>
                            <li class="breadcrumb-item active"><a href="{!! URL::to('/facebook') !!}">Facebook</a></li>
                        </ol>
                    </div>
                </div>




<div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-header bg-info">
            <h4 class="m-b-0 text-white">Configuracion  Facebook

          @if(empty(DB::table('facebooks')->get()))
               <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#crear-facebook"><i class="fa fa-plus fa-lg"> </i></button>
            @endif

          </h4>


        </div>
        <div class="card-body">
        
     
       
        <div class="table-responsive m-t-40">
      <table id="" class="table full-color-table full-inverse-table hover-table" >
    <thead>
    <th>Id</th>
    <th>link</th>
    <th class="col-md-4">Operaciones</th> 
    </thead>
    @if(!empty($boxs))
    @foreach($boxs as $box)
    <tbody>
  <td>{{ $box -> id}}</td>
  <td>{!! $box -> box !!}</td>


  
<td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $box->id }}"><i class="fa fa-edit"> Editar</i></button>
<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $box->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>

  </tbody>
  @endforeach
  @endif
                        </table>
                                </div>



        </div>
     </div>
</div>
</div>


@if(!empty($boxs))
<!--modal editar user-->
 @include('admin.configuracion.facebook.modal.modal-edit-boxfacebook')
<!--modal eliminar usuario-->
 @include('admin.configuracion.facebook.modal.modal-delete-boxfacebook')
 @endif
<!--modal crear usuario-->
 @include('admin.configuracion.facebook.modal.modal-crear-boxfacebook')
 




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