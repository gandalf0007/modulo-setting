@extends('layouts.admin-pro')
@section('content')
@role('administrador')
@include('alerts.request')



           <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><i class="mdi mdi-database font-red"></i>
                  <span class="caption-subject font-red sbold uppercase">Seccion de Backup</span></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('/panel') !!}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="#">Backup</a></li>
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

      <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#nuevo-backup"><i class="fa fa-plus fa-lg"> </i></button>
      
           </h4>

           



  <!--buscador-->
{!!Form::open(['url'=>'usuario', 'method'=>'GET' , 'class'=>' form-group  navbar-form' , 'role'=>'Search'])!!}


<div class="row ">

<div class=" col-md-3 m-t-20">
<div class="input-group">
    <span class="input-group-addon" id="basic-addon3"><i class="fa fa-calendar"></i></span>
      <input type="text" name="fecha_inicio" class="form-control mydatepicker" id="datepicker" aria-describedby="basic-addon3" placeholder="Fecha de Inicio">
  </div>
   </div>

   <div class=" col-md-3 m-t-20">
<div class="input-group">
    <span class="input-group-addon" id="basic-addon3"><i class="fa fa-calendar"></i></span>
      <input type="text" name="fecha_final" class="form-control mydatepicker" id="datepicker2"  placeholder="Fecha de Fin">
  </div>
   </div>

   <div class=" col-md-3 m-t-20">
      <button type="submit" class=" btn btn-success "> BUSCAR </button>
   </div>
  </div>
{!!Form::close()!!}
 <!--endbuscador-->


      <h6 class="card-subtitle"></h6>
      <div class="table-responsive m-t-40">
      <table id="" class="table full-color-table full-inverse-table hover-table" cellspacing="0" width="100%">
               <thead>
    <th>#</th>
    <th>nombre</th>
    <th>tipo</th>
    <th>fecha</th>
    <th>Descargar</th>
    <th>Eliminar</th>
  </thead>
   @foreach($backups as $backup)

    <tbody>
   <td>{{ $backup->id }}</td>
   <td>{{ $backup->nombre }}</td>
   <td>{{ $backup->tipo }}</td>
   <td>{{ $backup->created_at}}</td>
 
 
  <td>
    <a class="btn btn-primary"  href="{{$backup->nombre}}.{{$backup->tipo}}"><i class="fa fa-download"> Descargar</i></a>
  </td>
  
  <td>
    <button type="button" class="btn btn-danger  fa fa-trash-o" data-toggle="modal" data-target="#confirmDelete-{{$backup->id}}"> Eliminar</button>
  </td>


  </tbody>
  
  @endforeach
                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



@include('admin.configuracion.backup.modal.backup-export-create')
@include('admin.configuracion.backup.modal.backup-delete')


@section('datepicker')
<!-- bootstrap datepicker -->
 {!!Html::script('admin/adminpro/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')!!} 

<script>
   jQuery('.mydatepicker, #datepicker').datepicker();
   jQuery('.mydatepicker, #datepicker2').datepicker();
   jQuery('.mydatepicker, #datepicker3').datepicker();
   jQuery('.mydatepicker, #datepicker4').datepicker();
</script>

@stop


@endrole
@endsection
