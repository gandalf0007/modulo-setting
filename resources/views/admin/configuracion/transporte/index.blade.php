@extends('layouts.admin-pro')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
<!--include('alerts.success')-->


            <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><i class="mdi mdi-settings font-red"></i>
                  <span class="caption-subject font-red sbold uppercase">Seccion de Transportes</span></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('/panel') !!}">Home</a></li>
                            <li class="breadcrumb-item active "><a href="#">Transportes</a></li>
                        </ol>
                    </div>
                </div>








                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

@include('alerts.request')
@include('alerts.success')




    <h4 class="card-title">
      <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#crear-transporte"><i class="fa fa-plus fa-lg"> </i></button>
    </h4>


  <br>



      <h6 class="card-subtitle"></h6>
      <div class="table-responsive m-t-40">
      <table id="" class="table full-color-table full-inverse-table hover-table" >
  <thead>
    <th>ID</th>
    <th>Descripcion</th>
    <th>Direccion</th>
    <th>Telefono</th>
    <th class="col-md-4">Operaciones</th> 
  </thead>
  @foreach($transportes as $transporte)
  <tbody>
  <!-- -->
 <td>{{ $transporte -> id}}</td>
 <td>{{ $transporte -> descripcion}}</td>
 <td>{{ $transporte -> direccion}}</td>
 <td>{{ $transporte -> telefono}}</td>

<td>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver-{{ $transporte->id }}"><i class="fa fa-expand"> Ver</i></button>

<button type="button" class="btn btn-primary" onclick="ModalEditarTransporte({{$transporte->id}});" data-toggle="modal" data-target="#Edit"><i class="fa fa-edit"> Editar</i></button>

<!--nivel de acceso-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $transporte->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif

</td>

  </tbody>
  @endforeach
                        </table>
                                </div>
                <div class="pull-right">
                  {{$transportes->render("pagination::bootstrap-4")}}
                 </div>
                            </div>
                        </div>
                    </div>
                </div>





<!--modal editar transporte-->
 @include('admin.configuracion.transporte.modal.modal-edit-transporte')
<!--modal eliminar rubro-->
 @include('admin.configuracion.transporte.modal.modal-delete-transporte')
 <!--modal eliminar rubro-->
 @include('admin.configuracion.transporte.modal.modal-ver-transporte')
  <!--modal eliminar rubro-->
 @include('admin.configuracion.transporte.modal.modal-crear-transporte')



@endsection
