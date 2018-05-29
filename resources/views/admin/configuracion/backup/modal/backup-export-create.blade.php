<div class="modal bs-example-modal-lg fade" id="nuevo-backup" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Nuevo Backup </h4>
         </div>

{!!Form::open(['url'=>['backup-create'],'method'=>'GET' ])!!}


<div class="modal-body">   
@include('admin.configuracion.backup.forms.backup-export-create')
</div>

<div class="modal-footer">
<button type="submit" class="btn btn-primary">Crear</button>
<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
{!!Form::close()!!}
</div>


     </div>
   </div>
 </div>
