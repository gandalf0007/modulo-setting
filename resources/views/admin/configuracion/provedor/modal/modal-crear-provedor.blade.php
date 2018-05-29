<div class="modal  fade" id="crear-provedor" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
         	<h4 class="modal-title">Crear Nuevo Provedor </h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>

{!!Form::open(['url'=>['provedor-store'],'method'=>'POST' , 'files'=>True])!!}

<div class="modal-body">   
@include('admin.configuracion.provedor.forms.formscreate')
</div>

<div class="modal-footer">
<button type="submit" class="btn btn-success">Crear</button>
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
