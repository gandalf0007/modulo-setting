@foreach($marcas as $marca)
<div class="modal fade" id="Edit-{{ $marca->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h4 class="modal-title">Editar marca {{ $marca->descripcion }}</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>


{!!Form::model($marca,['url'=>['marcas-update',$marca->id],'method'=>'PUT' , 'files'=>True])!!}

<div class="modal-body">      
@include('admin.configuracion.marca.forms.formscreate')
</div>

<div class="modal-footer">
{!!Form::submit('modificar',['class'=>'btn btn-primary pull-right'])!!}
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
	@endforeach