<div class="modal" id="crear-logo" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
         	<h4 class="modal-title">Crear Logo </h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              
         </div>


{!!Form::open(['url'=>['logo-store'],'method'=>'POST' , 'files'=>True])!!}

<div class="modal-body">      


@include('admin.configuracion.logo.forms.formscreate')
</div>

<div class="modal-footer">
{!!Form::submit('modificar',['class'=>'btn btn-primary pull-right'])!!}
<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
