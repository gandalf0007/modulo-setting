@foreach($logos as $logo)
<div class="modal fade" id="confirmDelete-logo-{{ $logo->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
          <h4 class="modal-title">Confirm logo Deletion</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              
         </div>
         <div class="modal-body">
             <p>Esta seguro que desea eliminar el logo ?</p>
         </div>
         <div class="modal-footer">
            

              {!! Form::open(['method' => 'DELETE', 'url' => ['logo-destroy',$logo->id]]) !!}
             <button type="submit" class="btn btn-primary">Delete</button>
               {!! Form::close() !!}
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
         </div>
     </div>
   </div>
 </div>
	@endforeach