<button type="button" class="close" data-dismiss="modal">&times;</button>
 <div class="panel panel-default">
    <div class="panel-heading"><strong><h4>Datos del Empleado</h4></strong></div>
    <div class="panel-body">     
        <div class="form-group">
            <label for="calle" class="col-md-4 control-label">Nombre</label>

            <div class="col-md-6">
                <label for="calle" class="col-md-4 control-label">{{ $empleado['nombre'] }}</label>
               
            </div>
        </div>
        <div class="form-group">
            <label for="calle" class="col-md-4 control-label">Email</label>

            <div class="col-md-6">
                <label for="calle" class="col-md-4 control-label">{{ $empleado['email'] }}</label>
               
            </div>
        </div>
        <div class="form-group">
            <label for="calle" class="col-md-4 control-label">Código Domicilio</label>

            <div class="col-md-6">
                <label for="calle" class="col-md-4 control-label">{{ $empleado['cod_domicilio'] }}</label>                               
            </div>
        </div>                    
    </div>
   

<div class="container" style="color: black;">
<table 
    
    data-pagination="true"
    data-search="true"
    data-url = "carga_domicilio/{{ $empleado['id'] }}"
    
    id="tab_domiclios"
    class="table customers"
    style="font-size: 12px;" 
     >            

<thead >
        <tr>
            <th data-field="calle">Calle</th>
            <th data-field="numero_exterior">Número Exterior</th>
            <th data-field="numero_interior">Número Interior</th>
            <th data-field="colonia">Colonia</th>
            <th data-field="cp">Código Postal</th>                                
            <th data-field="estado">Estado</th>
            <th data-field="latitud">latitud</th>
            <th data-field="longitud">Longitd</th>
            <th data-field="botones"></th>
            
        </tr>
        </thead>
</table>
</div>
<div>
    <center>Mapa<br>
        <div id="map" style="width:360px;height:200px;border:2px solid blue;"></div>
    </center>    
</div>


</div>
<script>    
    $(function () {
        $('#tab_domiclios').bootstrapTable({
              formatLoadingMessage: function () {
            return 'Buscando información';
        },
        pageSize: 10,     
        height: 350,       
        showHeader: true, 
        searchAlign: 'left',

       formatRecordsPerPage: function (pageNumber) {
            return pageNumber;
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return '' + pageTo + ' de ' + totalRows;
        },
        formatNoMatches: function () {
            return 'No se encontraron Registros.';
        },
         formatSearch: function () {
            return 'Buscar Domicilio';
        }         
       // url: '/json_embarque/' + tipo + '/' + tienda + '/' + dias + '/' + fecha      

        });



        

                

    });
    
</script>

