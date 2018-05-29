<div class="row">
    <div class="col-lg-12 col-md-12">
                                        
<div class="form-group form-md-line-input has-success">
     <label for="form_control_1">Private_key (CLIENT_SECRET)</label>

    <div class="input-group">
       <span class="input-group-btn">
           <button class="btn btn-info" type="button">  <i class="fa fa-terminal"></i></button>
                </span>
         <input type="text" name="private_key" class="form-control"  placeholder="Ingrese la Key" required="">
     </div>
</div>


<div class="form-group form-md-line-input has-success">
     <label for="form_control_1">Public_key (CLIENT_ID)</label>

    <div class="input-group">
       <span class="input-group-btn">
           <button class="btn btn-info" type="button">  <i class="fa fa-terminal"></i></button>
                </span>
         <input type="text" class="form-control" name="public_key" placeholder="Ingrese la Key" required="">
     </div>
</div>

<div class="form-group form-md-line-input has-success">
     <label for="form_control_1">Porcentaje % de Recargo</label>

    <div class="input-group">
       <span class="input-group-btn">
           <button class="btn btn-info" type="button">  <i class="">%</i></button>
                </span>
         <input type="text" class="form-control" name="porcentaje" value="" placeholder="Ingrese el % de recargo" required="">
     </div>
</div>
      

      {!!Form::submit('Guardar',['class'=>'btn btn-primary pull-right'])!!}



    </div>
</div>
