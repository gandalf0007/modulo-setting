@extends('layouts.admin-pro')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
<!--include('alerts.success')-->



                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><i class="mdi mdi-settings font-red"></i>
                  <span class="caption-subject font-red sbold uppercase">Seccion de Marcas</span></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('/panel') !!}">Home</a></li>
                            <li class="breadcrumb-item active "><a href="#">Marcas</a></li>
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
      <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#crear-marcas"><i class="fa fa-plus fa-lg"> </i></button>
    </h4>


  <br>



      <h6 class="card-subtitle"></h6>
      <div class="table-responsive m-t-40">
      <table id="" class="table full-color-table full-inverse-table hover-table" >
    <thead>
    <th>ID</th>
    <th>Descripcion</th>
    <th>Imagen</th>
    <th>Operaciones</th>   
  </thead>
  @foreach($marcas as $marca)
  <tbody>
  <!-- -->
 <td>{{ $marca -> id}}</td>
 <td>{{ $marca -> descripcion}}</td>

<td>
               
                   <div class="col-xs-12 col-sm-12 col-md-2 el-element-overlay block-center">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"> <img src="storage/marcas/{{$marca->imagen}}" >
                                <div class="el-overlay">
                                     <ul class="el-info">
                                      <li><a class="btn default btn-outline image-popup-vertical-fit" href="storage/marcas/{{$marca->imagen}}"><i class="icon-magnifier"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                      
                    </div>
                    
                        
                    
</td>


<td>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver-{{ $marca->id }}"><i class="fa fa-expand"> Ver</i></button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $marca->id }}"><i class="fa fa-edit"> Editar</i></button>


 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $marca->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>


</td>

  </tbody>
  @endforeach
                        </table>
                                </div>
                <div class="pull-right">
                  {{$marcas->render("pagination::bootstrap-4")}}
                 </div>
                            </div>
                        </div>
                    </div>
                </div>




<!--modal editar marca-->
 @include('admin.configuracion.marca.modal.modal-edit-marca') 
<!--modal eliminar marca-->
 @include('admin.configuracion.marca.modal.modal-delete-marca')
 <!--modal ver marca-->
 @include('admin.configuracion.marca.modal.modal-ver-marca')
  <!--modal crear marca-->
 @include('admin.configuracion.marca.modal.modal-crear-marca')

                          




@section('mis-scripts')
<!--upload file Imagen-->
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>

@stop

@endsection
