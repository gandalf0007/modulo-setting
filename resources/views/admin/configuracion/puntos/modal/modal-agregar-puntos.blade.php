@foreach($users as $user)
<div class="modal fade bs-example-modal-lg" id="agregar-puntos-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
         	<h4 class="modal-title"></h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>


{!!Form::open(['url'=>['puntos-agregar-puntos',$user->id],'method'=>'PUT' , 'files'=>True])!!}



<div class="modal-body">      


@include('admin.configuracion.puntos.forms.formsagregar')
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
