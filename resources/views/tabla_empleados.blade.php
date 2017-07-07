
<div class="container" style="color: black;">
<table 
    
    data-pagination="true"
    data-search="true"
    data-url = "carga"
    
    id="tabla_empleados"
    class="table customers"
    style="font-size: 12px;" 
     >

<thead >
        <tr>
            <th data-field="id">Número Empleado</th>
            <th data-field="nombre">Nombre</th>
            <th data-field="email">Email</th>
            <th data-field="codigo">Domicilio</th>                                
            <th data-field='botones' data-align="center" >&nbsp;</th>           
        </tr>
        </thead>
</table>
</div>
<script>    
    $(function () {
        $('#tabla_empleados').bootstrapTable({
              formatLoadingMessage: function () {
            return 'Buscando información';
        },
        pageSize: 10,     
        height: 490,       
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
            return 'Buscar';
        }         
       // url: '/json_embarque/' + tipo + '/' + tienda + '/' + dias + '/' + fecha      

        });

        $(".page-list").hide();


    });
</script>

