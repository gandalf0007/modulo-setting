@extends('layouts.admin-pro')
@section('content')
@role('administrador')
@include('alerts.request')
@include('alerts.success')
@include('alerts.errors')
@include('flash::message')




           <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><i class="mdi mdi-settings font-red"></i>
                  <span class="caption-subject font-red sbold uppercase">Seccion de Configuraciones</span></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('/panel') !!}">Home</a></li>
                            <li class="breadcrumb-item active "><a href="#">Configuraciones</a></li>
                        </ol>
                    </div>
                </div>




<div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-header bg-info">
            <h4 class="m-b-0 text-white">Configurar Datos de la Empresa

          </h4>


        </div>
        <div class="card-body">
          
      
             @if(empty($settings))

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
        {!!Form::open(['url'=>['settings-store'],'method'=>'POST' , 'files'=>True])!!}
              @include('admin.configuracion.generales.forms.datos')
          {!!Form::submit('Guardar',['class'=>'btn btn-primary pull-right'])!!}
          {!!Form::close()!!}
           </div>

          @else

            <div class="form-group col-xs-12 col-sm-12 col-md-12">
         {!!Form::model($settings,['url'=>['settings-update',$settings->id],'method'=>'PUT' , 'files'=>True])!!}
              @include('admin.configuracion.generales.forms.datos')
          {!!Form::submit('Guardar',['class'=>'btn btn-primary pull-right'])!!}
          {!!Form::close()!!}
           </div>

          @endif

        </div>
     </div>
</div>
</div>










<!--

<div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-header bg-info">
            <h4 class="m-b-0 text-white">Configurar SocialLinks

             
              <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#crear-sociallink" ><i class="fa fa-plus fa-lg"> </i></button>
           

          </h4>


        </div>
        <div class="card-body">
          
       
     
       
        <div class="table-responsive m-t-40">
      <table id="" class="table full-color-table full-inverse-table hover-table" >
     <thead>
    <th>Id</th>
    <th>nombre</th>
    <th>link</th>
    <th>Operaciones</th> 
    </thead>
    @foreach($sociallinks as $sociallink)
    <tbody>
  <td>{{ $sociallink -> id}}</td>
  <td>{{ $sociallink -> nombre}}</td>
  <td>{{ $sociallink -> link}}</td>


<td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-sociallink-{{$sociallink->id}}"><i class="fa fa-edit"> Editar</i></button>
>
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-sociallink-{{ $sociallink->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>

</td>

  </tbody>
  @endforeach
                        </table>
                                </div>



        </div>
     </div>
</div>
</div>
-->
@if(!empty($sociallinks))
<!--modal editar user-->
 @include('admin.configuracion.sociallinks.modal.modal-edit-sociallink')
<!--modal eliminar usuario-->
 @include('admin.configuracion.sociallinks.modal.modal-delete-sociallink')
 @endif
<!--modal crear usuario-->
 @include('admin.configuracion.sociallinks.modal.modal-crear-sociallink')










<div class="card card-outline-info">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Configurar Logo</h4></div>
        <div class="card-body">
          <div class="row">

          
          @if(empty($logo))
          <div class="form-group col-xs-12 col-sm-12 col-md-6">
        {!!Form::open(['url'=>['logo-store'],'method'=>'POST' , 'files'=>True])!!}
            <label for="input-file-now"></label>
             <input type="file" id="input-file-now" class="dropify" name="imagen" required="">
          {!!Form::submit('Guardar',['class'=>'btn btn-primary pull-right'])!!}
          {!!Form::close()!!}
           </div>
          @else
            <div class="form-group col-xs-12 col-sm-12 col-md-6">
        {!!Form::open(['url'=>['logo-update'],'method'=>'PUT' , 'files'=>True])!!}
            <label for="input-file-now"></label>
             <input type="file" id="input-file-now" class="dropify" name="imagen" required="">
          {!!Form::submit('Guardar',['class'=>'btn btn-primary pull-right'])!!}
          {!!Form::close()!!}
           </div>
          @endif

        
           @if(!empty($logo))
             <div class="col-md-3 el-element-overlay">
                  <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"> <img src="storage/logo/{{$logo->logo}}"" alt="user" height="200" width="200">
                                <div class="el-overlay">
                                     <ul class="el-info">
                                      <li><a class="btn default btn-outline image-popup-vertical-fit" href="storage/logo/{{$logo->logo}}""><i class="icon-magnifier"></i> Imagen por defecto</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                  @endif
              

           </div>
         </div>
     </div>






<div class="card card-outline-info">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Configurar Favicon</h4></div>
        <div class="card-body">
          <div class="row">

          
          @if(empty($logo))
          <div class="form-group col-xs-12 col-sm-12 col-md-6">
        {!!Form::open(['url'=>['favicon-store'],'method'=>'POST' , 'files'=>True])!!}
            <label for="input-file-now"></label>
             <input type="file" id="input-file-now" class="dropify" name="favicon" required="">
          {!!Form::submit('Guardar',['class'=>'btn btn-primary pull-right'])!!}
          {!!Form::close()!!}
           </div>
          @else
            <div class="form-group col-xs-12 col-sm-12 col-md-6">
        {!!Form::open(['url'=>['favicon-update'],'method'=>'PUT' , 'files'=>True])!!}
            <label for="input-file-now"></label>
             <input type="file" id="input-file-now" class="dropify" name="favicon" required="">
          {!!Form::submit('Guardar',['class'=>'btn btn-primary pull-right'])!!}
          {!!Form::close()!!}
           </div>
          @endif

        
           @if(!empty($logo))
             <div class="col-md-3 el-element-overlay">
                  <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"> <img src="{{$logo->favicon}}"" alt="user" height="200" width="200">
                                <div class="el-overlay">
                                     <ul class="el-info">
                                      <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{$logo->favicon}}""><i class="icon-magnifier"></i> Imagen por defecto</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                  @endif
              

           </div>
         </div>
     </div>





























@section('mis-scripts')
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




                          
@endrole
@endsection
