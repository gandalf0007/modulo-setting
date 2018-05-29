
<div class="row">
    <div class="col-lg-12 col-md-12">
                                        
<div class="form-group form-md-line-input has-success">
     <label for="form_control_1">Private_key (Clave secreta)</label>

    <div class="input-group">
       <span class="input-group-btn">
           <button class="btn btn-info" type="button">  <i class="fa fa-terminal"></i></button>
                </span>
        <input type="text" name="private_key" class="form-control" value="{{$recaptcha->private_key}}" placeholder="Ingrese la Key">
     </div>
</div>


<div class="form-group form-md-line-input has-success">
     <label for="form_control_1">Public_key (Clave del sitio)</label>

    <div class="input-group">
       <span class="input-group-btn">
           <button class="btn btn-info" type="button">  <i class="fa fa-terminal"></i></button>
                </span>
          <input type="text" class="form-control" name="public_key" value="{{$recaptcha->public_key}}" placeholder="Ingrese la Key">
     </div>
</div>
      

      {!!Form::submit('Guardar',['class'=>'btn btn-primary pull-right'])!!}



    </div>
</div>
