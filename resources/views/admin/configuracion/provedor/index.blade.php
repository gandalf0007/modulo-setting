@extends('layouts.admin-pro')
@section('content')
@if(Auth::user()->isRole('administrador') or Auth::user()->isRole('moderador'))<!--permisos-->



<div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><i class="icon-user font-red"></i>
                  <span class="caption-subject font-red sbold uppercase">Seccion de Provedores</span></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="#">Provedores</a></li>
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
  
      @can('crear')
      <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#crear-provedor"><i class="fa fa-plus fa-lg"> </i></button>
      @endcan

      
           </h4>

           


                                <br><br>


                                

		<h6 class="card-subtitle"></h6>
			      <div class="table-responsive m-t-40">
	<table id="" class="table full-color-table full-inverse-table hover-table" cellspacing="0" width="100%">
	<thead>
		<th>Razon Social</th>
		<th>Contacto</th>
		<th>Email</th>
		<th>Telefono</th>
		<th>Direccion</th>
		<th>Cuit</th>
		<th class="col-md-4">Operaciones</th>
	</thead>
	@foreach($provedores as $provedore)
	<tbody>
	<!-- -->
	 <td>{{ $provedore -> razonsocial}}</td>
	 <td>{{ $provedore -> contacto}}</td>
	 <td>{{ $provedore -> email}}</td>
	 <td>{{ $provedore -> telefono}}</td>
	 <td>{{ $provedore -> direccion}}</td>
	 <td>{{ $provedore -> cuit}}</td>

<td>

@can('ver') 
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver-{{ $provedore->id }}"><i class="fa fa-expand"> Ver</i></button>
@endcan


@can('editar')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $provedore->id }}"><i class="fa fa-edit"> Editar</i></button>
@endcan

@can('eliminar')
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $provedore->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endcan

</td>

	</tbody>
	@endforeach
	</table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>










<!--modal crear provedor-->
 @include('admin.configuracion.provedor.modal.modal-crear-provedor')
<!--modal editar provedor-->
 @include('admin.configuracion.provedor.modal.modal-edit-provedor')
<!--modal eliminar provedor-->
 @include('admin.configuracion.provedor.modal.modal-delete-provedor')
 <!--modal Ver provedor-->
 @include('admin.configuracion.provedor.modal.modal-ver-provedor')
<!--para renderizar la paginacion-->
 {!! $provedores->render() !!}
                          

@endif
@endsection