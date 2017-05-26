
var table =$('#tab').DataTable( {

    "processing": true,
    "ajax": {
        "url": base_url+"proyecto/cargar_proyecto_moderador/asesor",
        "type": "POST"
    },
    "columns": [
        { "data": "pro_id" },
        { "data": "tipro_id",
          "className": "dt-center",
          "render":  function(data,type,row,meta) {
            var btn ='<a href="#" data-toggle="popover" data-trigger="hover"'; 
            if(row.tipro_id=='1'){                   
                btn +='data-content="Proyecto de Tesis" class="btn btn-info btn-mini">PT</a>';                    
            }else if(row.tipro_id=='2'){
                btn +='data-content="Tesis" class="btn btn-primary btn-mini">T</a>';   
            } else{
                btn="";
            }               
            return btn;
          }
                
        },
        
        { "data": "pro_nombre" },
        { "data": "linea" },
        { "data": "alu_nombres" },
        
        {
            "className":      'mostrar-proyecto',
            "orderable":      false,
            "data":           null,
            "defaultContent": ''
        }, 
        {
            "className":      'detail-control',
            "orderable":      false,
            "data":           null,
            "defaultContent": ''
        },
        {
            "className":      'bajar-doc',
            "orderable":      false,
            "data":           null,
            "defaultContent": ''
        }
    ],
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",
    "sDom": '<""l>t<"F"fp>',
    "bPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "oLanguage" :{
        'sProcessing':     'Cargando...',
        'sLengthMenu':     'Mostrar _MENU_ registros',
        'sZeroRecords':    'No se encontraron resultados',
        'sEmptyTable':     'Ningún dato disponible en esta tabla',
        'sInfo':           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
        'sInfoEmpty':      'Mostrando registros del 0 al 0 de un total de 0 registros',
        'sInfoFiltered':   '(filtrado de un total de _MAX_ registros)',
        'sInfoPostFix':    '',
        'sSearch':         'Buscar : ',
        'sUrl':            '',
        'sInfoThousands':  '',
        'sLoadingRecords': 'Cargando...',
        'oPaginate': {
            'sFirst':    'Primero',
            'sLast':     'Último',
            'sNext':     'Siguiente',
            'sPrevious': 'Anterior'
        },
        'oAria': {
            'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
            'sSortDescending': ': Activar para ordenar la columna de manera descendente'
        }
    },
    'aaSorting': [[ 0, 'asc' ]],//ordenar
    'iDisplayLength': 10,
    'aLengthMenu': [[5, 10, 20], [5, 10, 20]]
}  

);
    $('#tab tbody').on('click', 'td.mostrar-proyecto', function () { 
        
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        loader('proyecto/mostrar_proyecto/'+row.data().pro_id);       
        
    });

    $('#tab tbody').on('click', 'td.detail-control', function () { //Agregar los datos correspondientes al modal-deatil
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#modal_detail").modal({show: true});
        
        $("#esc").html(row.data().esc_descripcion);
        $("#alu").html(row.data().alu_nombres);
        $("#tipro").html(row.data().tipro_descripcion);
        $("#liinv").html(row.data().linin_descripcion);
        $("#codpro").html(row.data().pro_codigo);
        $("#nompro").html(row.data().pro_nombre);// arreglar
        $("#fecreg").html(row.data().pro_fecha_registro);
    });
    

    $('#tab tbody').on('click', 'td.bajar-doc', function () { //Agregar los datos correspondientes al modal-delete
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        
    });

 
 
