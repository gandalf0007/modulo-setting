@extends('layouts.admin-pro')
@section('content')
@include('alerts.errors')
@include('alerts.request')
@include('alerts.success')
@include('flash::message')



           <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><i class="mdi mdi-language-html5"></i>
                  <span class="caption-subject font-red sbold uppercase">Seccion de Paginas</span></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('/panel') !!}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{!! URL::to('/informacion') !!}">Paginas</a></li>
                            <li class="breadcrumb-item active"><a href="#"></a></li>
                        </ol>
                    </div>
                </div>





                <div class="row">
                    <div class="col-12">
                        <div class="card">



                            <div class="card-body">







   @if(empty($Informations))

          {!!Form::open(['url'=>'informacion-store', 'method'=>'POST' , 'files'=>True])!!}
@include('admin.configuracion.informacion.forms.formscreate')
{!!Form::submit('Guardar',['class'=>'btn btn-primary pull-right'])!!}
{!!Form::close()!!}

          @else

           
         {!!Form::model($Informations,['url'=>['informacion-update',$Informations->id],'method'=>'PUT' , 'files'=>True])!!}
              @include('admin.configuracion.informacion.forms.formscreate')
          {!!Form::submit('Guardar',['class'=>'btn btn-primary pull-right'])!!}
          {!!Form::close()!!}
          

          @endif


                            </div>
                        </div>
                    </div>
                </div>












@section('mis-scripts')



<!-- ckeditor + filemanager -->
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
  CKEDITOR.config.height = 400;
  CKEDITOR.config.width = 1200;

  CKEDITOR.replace('formasdepago',{
    filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: 'laravel-filemanager?type=Files',
    filebrowserUploadUrl: 'laravel-filemanager/upload?type=Files&_token=',
    customConfig: 'config.js'
});


  CKEDITOR.replace('garantia',{
    filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: 'laravel-filemanager?type=Files',
    filebrowserUploadUrl: 'laravel-filemanager/upload?type=Files&_token=',
    customConfig: 'config.js'
});


  CKEDITOR.replace('avisolegal',{
    filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: 'laravel-filemanager?type=Files',
    filebrowserUploadUrl: 'laravel-filemanager/upload?type=Files&_token=',
    customConfig: 'config.js'
});

  CKEDITOR.replace('envios',{
    filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: 'laravel-filemanager?type=Files',
    filebrowserUploadUrl: 'laravel-filemanager/upload?type=Files&_token=',
    customConfig: 'config.js'
});

  CKEDITOR.replace('preguntas',{
    filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: 'laravel-filemanager?type=Files',
    filebrowserUploadUrl: 'laravel-filemanager/upload?type=Files&_token=',
    customConfig: 'config.js'
});

//me hace responsiva la imagen agregando img-responsive en la classe automaticamente
    CKEDITOR.on('instanceReady', function(ev) {
        ev.editor.dataProcessor.htmlFilter.addRules(
                {
                    elements:
                            {
                                $: function(element) {
                                    // Output dimensions of images as width and height
                                    if (element.name == 'img') {
                                        var style = element.attributes.style;
                                        //responzive images

                                        //declare vars
                                        var tclass = "";
                                        var add_class = false;

                                        tclass = element.attributes.class;

                                        //console.log(tclass);
                                        //console.log(typeof (tclass));

                                        if (tclass === "undefined" || typeof (tclass) === "undefined") {
                                            add_class = true;
                                        } else {
                                            //console.log("I am not undefined");
                                            if (tclass.indexOf("img-responsive") == -1) {
                                                add_class = true;
                                            }
                                        }

                                        if (add_class) {
                                            var rclass = (tclass === undefined || typeof (tclass) === "undefined" ? "img-responsive" : tclass + " " + "img-responsive");
                                            element.attributes.class = rclass;
                                        }

                                        if (style) {
                                            // Get the width from the style.
                                            var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style),
                                                    width = match && match[1];

                                            // Get the height from the style.
                                            match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
                                            var height = match && match[1];

                                            if (width) {
                                                element.attributes.style = element.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');
                                                element.attributes.width = width;
                                            }

                                            if (height) {
                                                element.attributes.style = element.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');
                                                element.attributes.height = height;
                                            }
                                        }
                                    }



                                    if (!element.attributes.style)
                                        delete element.attributes.style;

                                    return element;
                                }
                            }
                });
    });
</script>


@stop



@endsection