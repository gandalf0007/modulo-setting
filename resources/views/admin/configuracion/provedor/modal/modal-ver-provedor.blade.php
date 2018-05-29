@foreach($provedores as $provedore)
<div class="modal fade" id="ver-{{ $provedore->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
         	<h4 class="modal-title">Ver Provedor {{$provedore->prov_razsoc}}</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>


{{ Form::model($provedore, array('url' => array('provedor-update', $provedore->id), 'method' => 'PUT', 'files'=>True)) }}
<div class="modal-body">   
@include('admin.configuracion.provedor.forms.formscreate')
</div>

<div class="modal-footer">
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
	@endforeach