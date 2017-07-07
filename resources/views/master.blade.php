<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="robots" content="noindex">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Empleados</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ URL::asset('librerias/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-uRk4XfSL01xHPvdl1PgzXzIjJ2_3ytc&language=en&libraries=geometry"></script>
         
        <link href="{{ URL::asset('librerias/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/custom.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('librerias/bootstrap/src/bootstrap-table.css') }}" rel="stylesheet"/>          
        <link rel="stylesheet" href="{{ URL::asset('librerias/jquery-ui-1.12.1.custom/jquery-ui.css') }}" />        
        <script src="{{ URL::asset('librerias/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        
        <script src="{{ URL::asset('librerias/bootstraptable/bootstrap-table.js') }}"></script>
        <link href="{{ URL::asset('librerias/bootstraptable/bootstrap-table.css') }}" rel="stylesheet">        
        <meta name="csrf_token" content="{{ csrf_token() }}" />        
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                @show
                @section('content')
                @show

            </div>
        </div>
    </body>    
    @yield('script')
    <script>

</script>
</html>