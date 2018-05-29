@extends('layouts.admin-pro')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
<!--include('alerts.success')-->





                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><i class="mdi mdi-settings font-red"></i>
                  <span class="caption-subject font-red sbold uppercase">Seccion de Banners</span></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('/panel') !!}">Home</a></li>
                            <li class="breadcrumb-item active "><a href="#">Banners</a></li>
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
      <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#cargar-imagen""><i class="fa fa-plus fa-lg"> </i></button>
    </h4>


  <br>



      <h6 class="card-subtitle"></h6>
      <div class="table-responsive m-t-40">
      <table id="" class="table full-color-table full-inverse-table hover-table" >
     
  <thead>
      <tr>
    <th>Id</th>
    <th>Titulo</th>
    <th >Descripcion</th>
    <th >Imagen</th>
    <th >Operaciones</th> 
      </tr>
    </thead>
    @foreach($banners as $banner)
    <tbody>
  <td>{{ $banner -> id}}</td>
  <td>{{ $banner -> titulo}}</td>
  <td>{{ $banner -> descripcion}}</td>
  <td>
    <div class="col-xs-12 col-sm-12  el-element-overlay block-center">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"> <img src="{{$banner->imagen}}" >
                                <div class="el-overlay">
                                     <ul class="el-info">
                                      <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{$banner->imagen}}"><i class="icon-magnifier"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                      
                    </div>


   </td>  

<td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $banner->id }}"><i class="fa fa-edit"> Editar</i></button>

 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $banner->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>

</td>

  </tbody>
  @endforeach
  </table>
                                </div>
                <div class="pull-right">
                  {{$banners->render("pagination::bootstrap-4")}}
                 </div>
                            </div>
                        </div>
                    </div>
                </div>







<!--modal editar user-->
 @include('admin.configuracion.banner.modal.modal-edit')
<!--modal eliminar usuario-->
 @include('admin.configuracion.banner.modal.modal-delete')
 <!--modal crear usuario-->
 @include('admin.configuracion.banner.modal.modal-crear')




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
