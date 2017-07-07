
 <div class="panel panel-default">
    <div class="panel-heading"><strong><h4>Agrega Domicilio</h4></strong></div>
    <div class="panel-body"> 
        
       <form id="form_domicilio" class="form-horizontal" role="form" method="" action="" > 
       
            <input type="hidden" name="_token" value="{ { csrf_token() }}">

            <div class="form-group{{ $errors->has('calle') ? ' has-error' : '' }}">
                <label for="calle" class="col-md-4 control-label">Calle</label>

                <div class="col-md-6">
                    <input id="calle" type="text" class="form-control" name="calle" value="" required autofocus>

                    @if ($errors->has('calle'))
                        <span class="help-block">
                            <strong>{{ $errors->first('calle') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('num_ext') ? ' has-error' : '' }}">
                <label for="num_ext" class="col-md-4 control-label">Número Exterior</label>

                <div class="col-md-6">
                    <input id="num_ext" type="text" class="form-control" name="num_ext" value="" required autofocus>

                    @if ($errors->has('num_ext'))
                        <span class="help-block">
                            <strong>{{ $errors->first('num_ext') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="num_int" class="col-md-4 control-label">Número Interior</label>
                <div class="col-md-6">
                    <input id="num_int" type="text" class="form-control" name="num_int" value="" autofocus>                
                </div>
            </div>
             <div class="form-group{{ $errors->has('colonia') ? ' has-error' : '' }}">
                <label for="colonia" class="col-md-4 control-label">Colonia</label>

                <div class="col-md-6">
                    <input id="colonia" type="text" class="form-control" name="colonia" value="" required autofocus>

                    @if ($errors->has('colonia'))
                        <span class="help-block">
                            <strong>{{ $errors->first('colonia') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="cp" class="col-md-4 control-label">Código Postal</label>

                <div class="col-md-6">
                    <input id="cp" type="text" class="form-control" name="cp" value="" required autofocus>

                    @if ($errors->has('cp'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cp') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

             <div class="form-group">
                <label for="estado" class="col-md-4 control-label">Estado</label>

                <div class="col-md-6">
                    <input id="estado" type="text" class="form-control" name="estado" value="" required autofocus>

                    @if ($errors->has('estado'))
                        <span class="help-block">
                            <strong>{{ $errors->first('estado') }}</strong>
                        </span>
                    @endif
                </div>
            </div>           
            <br>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="actualiza">
                        Registrar
                    </button>
                </div>
            </div>
            <input type="hidden" name="id_empleado" id="id_empleado" value="{{ $empleado }}" >          
        </form>

    </div>
  </div>
  
<script>    
    $(function () {
        $("#form_domicilio").submit(function (event){             
       
            event.preventDefault();
            $.ajax({
              beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');
                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            url:"agrega_dom/" + $("#id_empleado").val(),
            type:'post',
            data:{calle: $("#calle").val(), num_ext: $("#num_ext").val(), num_int: $("#num_int").val(), colonia: $("#colonia").val(),
            cp: $("#cp").val(),estado: $("#estado").val() },
            success:function(data){                       
               //console.log(data);
                alert(data);                           
                $('#modal_empleado').modal('hide');
                $("#tab_usuarios").bootstrapTable('refresh');
            },
            error: function (data) {
                /*console.log(data);*/
                alert('data');
                $('#modal_empleado').removeData();
            }
            });
              
        });

    });
</script>

