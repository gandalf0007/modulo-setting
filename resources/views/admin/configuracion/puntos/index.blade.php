@extends('layouts.admin-pro')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
<!--include('alerts.success')-->


         <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><i class="mdi mdi-crown"></i>
                  <span class="caption-subject font-red sbold uppercase">Configurar Puntos</span></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('/panel') !!}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="#">Puntos</a></li>
                        </ol>
                    </div>
                </div>





<div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-header bg-info">
            <h4 class="m-b-0 text-white">Configurar Porcentajes de los Puntos

            
          </h4>


        </div>
        <div class="card-body">
          
       
      
   
      <div class="card-body">
        <div class="row">
            <div class="form-group col-xs-12 col-sm-12 col-md-3">
              @if(!empty($punto))
              {!!Form::model($punto,['url'=>['puntos-update',$punto->id],'method'=>'PUT' , 'files'=>True])!!}
               <fieldset disabled="">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-book font-blue"> Porcentaje : %</i></span>
                  {!!Form::text('porcentaje',null,['class'=>'form-control','placeholder'=>'0.0'])!!}
                </div>
                </fieldset>
                {!!Form::close()!!}
                @else
                <fieldset disabled="">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-book font-blue"> Porcentaje : %</i></span>
                  {!!Form::text('porcentaje',null,['class'=>'form-control','placeholder'=>'0.0'])!!}
                </div>
                </fieldset>
                @endif

            </div>
            


            <div class="form-group col-xs-12 col-sm-12 col-md-3">
                <div class="input-group">

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Editar-puntos"><i class="fa fa-edit"> Editar</i></button>
                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-puntos"><i class="fa fa-trash-o"> Eliminar</i></button>
                </div>
            </div>



        </div>
      </div>
    
  
     

        </div>
     </div>
</div>
</div>






<!--modal editar user-->
 @include('admin.configuracion.puntos.modal.modal-edit-puntos')
<!--modal eliminar usuario-->
 @include('admin.configuracion.puntos.modal.modal-delete-puntos')
<!--modal agregar usuario-->
 @include('admin.configuracion.puntos.modal.modal-agregar-porcentaje')






                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

@include('alerts.request')
@include('alerts.success')

        <h4 class="card-title">
    
           </h4>

                    <br><br>


                                <div class="table-responsive m-t-40">
                                    <table id="mydatatable" class="table table-hover full-inverse-table hover-table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>nombre</th>
                                                <th>correo</th>
                                                <th>puntos</th>
                                                <th >operaciones</th> 
                                            </tr>
                                        </thead>
                                       
                                          <tbody>
                                         </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



<!--modal editar user-->
 @include('admin.configuracion.puntos.modal.modal-agregar-puntos')
<!--modal eliminar usuario-->
 @include('admin.configuracion.puntos.modal.modal-delete-puntos')




@section('mis-scripts')

<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script>
function activartablaempresas() {
    $('#mydatatable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 50,
        pagingType: "full_numbers",
        
         ajax: 'usuario-listar-datatable',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nombre', name: 'nombre' },
            { data: 'email', name: 'email' },
            { data: 'puntos', name: 'puntos' },
            { data: null,  render: function ( data, type, row ) {
                return "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#agregar-puntos-"+data.id+"'><i class='mdi mdi-crown'> Agregar</i></button>  "}  
            }
        ],
    });
}


activartablaempresas();
</script>
@stop



@endsection
