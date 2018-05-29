<div class="card card-outline-info">
      <div class="card-header">
          <h4 class="m-b-0 text-white">Titulo</h4></div>
      <div class="card-body">
        <div class="row">
            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-book font-blue"> Titulo :</i></span>
                  {!!Form::text('titulo',null,['class'=>'form-control','placeholder'=>'ingrese un titulo','required'=>true])!!}
                </div>
            </div>
        </div>
      </div>
  </div>

  <div class="card card-outline-info">
      <div class="card-header">
          <h4 class="m-b-0 text-white">Descripcion</h4></div>
      <div class="card-body">
        <div class="row">
            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-book font-blue"> Descripcion :</i></span>
                  {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'ingrese una descripcion','required'=>true])!!}
                </div>
            </div>
        </div>
      </div>
  </div>


 <div class="card card-outline-info">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Banner</h4></div>
        <div class="card-body">
          <div class="row">
            <div class=" col-md-3"></div>

             <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="input-file-now"></label>
             <input type="file" id="input-file-now" class="dropify" name="imagen" required>
             </div>

             <div class="c col-md-3"></div>
           </div>
         </div>
     </div>




