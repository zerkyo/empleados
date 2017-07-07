<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Total</h4>
      </div>

<div class="container-fluid">      
                     <form id="form_crear"  class="form-horizontal" role="form" method="" action=""> 
                   
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombres</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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



      

@section('script')
  <script>     
    $(function () {

        $("#form_crear").submit(function (event){                    
            event.preventDefault();
           $.ajax({
              beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
                    url:"/crear_registro",
                    //url:"/actualizar/" + ,
                    type:'post',
                    data:{name: $("#name").val(), email: $("#email").val(), password: $("#password").val() },
                    success:function(data){                       
                       //console.log(data);
                        alert(data); 
                        $("#form_crear").find('input').each(function() {
                            $(this).val('');

                        });                                                  
                    },
                    error: function (data) {
                        /*console.log(data);*/
                        alert('Error intentelo mas tarde por favor.');                        
                    }
                });
              
        });

    });
</script>

