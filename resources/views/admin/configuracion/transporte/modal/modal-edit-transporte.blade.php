<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
         	<h4 class="modal-title">Editar transporte </h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>


{!!Form::open(['url'=>['transporte-update'],'method'=>'POST'])!!}
<input type="text" hidden  id="transp_id" name="id">
<div class="modal-body">      
@include('admin.configuracion.transporte.forms.formscreate')
</div>

<div class="modal-footer">
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::submit('modificar',['class'=>'btn btn-primary pull-right'])!!}

{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
