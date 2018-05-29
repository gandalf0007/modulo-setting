<div class="modal" id="crear-sociallink" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
         	<h4 class="modal-title">Crear sociallink </h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              
         </div>


{!!Form::open(['url'=>['sociallink-store'],'method'=>'POST' , 'files'=>True])!!}

<div class="modal-body">      


@include('admin.configuracion.sociallinks.forms.sociallinksCreate')
</div>

<div class="modal-footer">

{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
