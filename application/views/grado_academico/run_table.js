
var tablapro =$('#tab').DataTable( {
        
    "processing": true,
    "ajax": {
            "url": base_url+"grado_academico/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "grac_id" },
            { "data": "grac_descripcion" },
            {
                "className":      'editar-data',
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
    "columnDefs": [
                {
                    "targets": [ 2 ],
                    "visible": true
                }],
    'aaSorting': [[ 0, 'asc' ]],//ordenar
    'iDisplayLength': 10,
    'aLengthMenu': [[5, 10, 20], [5, 10, 20]]
});


    $('#Guarda').on('click', function () { 
        $.ajax({
            data:  $("#form-GradoAcademico").serialize(),
            url:   base_url+'grado_academico/guardar',
            type:  'POST',
            success: function(data) {
                if (data=='I') {
                    alerta("REGISTRADO CORRECTAMENTE");
                    OpenTab('tab1');
                    table.ajax.reload( null, false);
                }else if (data=='M'){
                    alerta("MODIFICADO CORRECTAMENTE");
                    table.ajax.reload( null, false);
                    OpenTab('tab1');
                } else {
                    alerta("HA OCURRIDO UN ERROR - LLAMAR A SOPORTE");                
                }
            }
        });

    } );

    $('#tab tbody').on('click', 'td.editar-data', function () { //Agregar los datos correspondientes al modal-form
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#id").val(row.data().grac_id);
        $("#descripcion").val(row.data().grac_descripcion);
        OpenTab('tab2');
        
    } );


    $('#tabRegistrar').on('click', function () { 
        $("#id,#descripcion").val('');
    });

    function OpenTab(tab){
        $('li.active ,div.active').removeClass('active');
        $('a[href="#'+tab+'"]').parent().addClass('active');
        $('#'+tab).addClass('active');
    }



     