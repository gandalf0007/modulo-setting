@foreach($marcas as $marca)
<div class="modal fade" id="confirmDelete-{{ $marca->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
          <h4 class="modal-title">Confirm Marca Deletion</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">
             <p>Esta seguro que desea eliminar la Marca " {{ $marca->descripcion }}" ?</p>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>

              {!! Form::open(['method' => 'DELETE', 'url' => ['marcas-destroy',$marca->id]]) !!}
             <button type="submit" class="btn btn-danger">Delete</button>
               {!! Form::close() !!}
         </div>
     </div>
   </div>
 </div>
	@endforeach