<div class="modal fade" id="crear-marcas" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h4 class="modal-title">Crear marca </h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>


{!!Form::open(['url'=>['marcas-store'],'method'=>'POST' , 'files'=>True])!!}

<div class="modal-body">      
@include('admin.configuracion.marca.forms.formscreate')
</div>

<div class="modal-footer">
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::submit('Guardar',['class'=>'btn btn-primary pull-right'])!!}
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
