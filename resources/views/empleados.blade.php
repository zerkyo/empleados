@extends('master')
@section('content')


<style type="text/css">
  #bloq {
    z-index: 1000;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    display: block;
    position: fixed;
    top: 0;
    left: 0;
  }

  .imagen {
    position: fixed;
    top: 60%;
    left: 55%;
    background: url('{{ asset('images/ajax-loader.gif') }}') no-repeat;

    width: 300px;
    height: 300px;
    margin-top: -100px;
    margin-left: -100px;
    background-size: contain
  }


.customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

.customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

.customers tr:nth-child(even){background-color: #f2f2f2;}

.customers tr:hover {background-color: #ddd;}

.customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #F2F2F2;
    color: #000;
}

  .modal-dialog{
    position: relative;
    display: table;
    overflow-y: auto;    
    overflow-x: auto;
    width: auto;
    max-width: 100%;
    min-width: 100px;   
}



</style>        

<div class="" role="main" style="background-color: white;">                
  


@section('script')
<script>    

function carga(){  
    $("#muestra_emplado").empty();
     $("#bloq").show();        
      $.ajax({
        type: 'GET',
        url: 'tabla',
        data:{},
        success: function(response) {
        $("#bloq").hide();       
        $("#muestra_emplado").html(response);
        },
        error:function(err){
            alert("Error al mostrar información, intente mas tarde por favor.");
        }
   });

}

carga();

$(".modal").on("hidden.bs.modal", function(){  
    $("#form_crear").find('input').each(function() {
            $(this).val('');
        });
    
    $('#modal_empleado').removeData();
}); 

 
$("#agrega_u").click(function (){
  $('#modal_crea').modal('show');

});


function agregadom(identificado){

    $('#modal_empleado').modal({remote: 'domicilio/' + identificado });
    $('#modal_empleado').modal('show');
}


function ver(identificado){

    $('#modal_empleado').modal({remote: 'datosempleado/' + identificado });
    $('#modal_empleado').modal('show');
}



$("#form_crear").submit(function (event){                    
    event.preventDefault();
   $.ajax({
      beforeSend: function (xhr) {
    var token = $('meta[name="csrf_token"]').attr('content');

    if (token) {
          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
    }
},
    url:"crear_registro",    
    type:'post',
    data:{nombre: $("#nombre").val(), email: $("#email").val(), codigo: $("#codigo").val() },
    success:function(data){                       
       //console.log(data);
       alert(data);

        $("#form_crear").find('input').each(function() {
            $(this).val('');
        });

        $('#modal_crea').modal('hide');
        $("#tabla_empleados").bootstrapTable('refresh');
      
    },
    error: function (data) {
        //console.log(data);
        alert('Error intentelo mas tarde por favor.');
          $("#form_crear").find('input').each(function() {
            $(this).val('');
        });

        $('#modal_crea').modal('hide');
        $("#tabla_empleados").bootstrapTable('refresh');
                       
    }
  });
});


    function carga_mapa(latitud,longitud){
        $("#map").empty();
        var mapOptions = {
            center: new google.maps.LatLng(longitud,latitud),
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP};
        var map = new google.maps.Map(document.getElementById("map"),mapOptions);
    }    

</script>
@endsection 
 
 
<br>
<!-- Modal  vamos hac-->
<div class="modal fade" id="modal_empleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 60%;">
      <div class="modal-content" style="background: #FFF;"></div>     

    </div>    
</div>




<div class="modal fade" id="modal_crea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 50%;">
   <div class="modal-content" style="     
    border-top: 1px solid #707F8E;
    border-bottom: 5px solid #283645;    
    ">   
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Crea Empleado</h4>
      </div>

<div class="container-fluid" style="background: rgba(255, 255, 255, 0.8);">  
   <form id="form_crear"  class="form-horizontal" role="form" method="" action="" style="background-color: white;"> 
                   
                      <input type="hidden" name="_token" value="{ { csrf_token() }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Código Domicilio</label>

                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control" name="codigo" value="{{ old('codigo') }}" required autofocus>

                                @if ($errors->has('codigo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('codigo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="crea_usuario">
                                    Registrar
                                </button>
                            </div>
                  </div>
              </form>  
              </div> 
     </div>     
    </div>
</div>    


<div align="right"><button class="btn btn-default" id="agrega_u">Agregar Empleado</button></div> 

<div class="panel panel-default">
    <div class="panel-heading"><strong><h5>Empleados</h5></strong></div>
    <div class="panel-body"> 
      <div width="100%" id="muestra_emplado"></div>
    </div>
  </div>
 

    <div id="bloq" style="display: none;"><div class="imagen""></div></div>
  </div>
</div>

@endsection        



