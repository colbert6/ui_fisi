
    
    //var base_url definida en header
    var table =$('#tab').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"escuela/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "esc_id"},
            { "data": "fac_descripcion"},
            { "data": "esc_descripcion"},             
            { "data": "esc_codigo_sira"},
            { "data": "esc_abreviatura"},  
            
            {
                "className":      'detail-control',
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
    } );
    