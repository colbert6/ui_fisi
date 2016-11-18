
alu_id=$('#cod_usu').val() ;
    //var base_url definida en header
    var table =$('#tab').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"proyecto/cargar_proyectos_alumno/"+alu_id,
            "type": "POST"
        },
        "columns": [
            { "data": "pro_id" },
            { "data": "pro_nombre" },
            { "data": "pro_fecha_registro" }, 
            {
                "className":      'editar-data',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
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
    
    $('#tab tbody').on('click', 'td.editar-data', function () { //Agregar los datos correspondientes al modal-form
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        window.location=base_url+"proyecto/elaborar_proyecto/"+row.data().pro_id;
    } );

    /*$('#tab tbody').on('click', 'td.eliminar-data', function () { //Agregar los datos correspondientes al modal-delete
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#modal_delete").modal({show: true});
        $("#id_dato_eliminar").val(row.data().id_marca);
        $('#desc_dato_eliminar').html(row.data().descripcion);

    });*/

    $('#tab tbody').on('click', 'td.detail-control', function () { //Agregar los datos correspondientes al modal-delete
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#modal_detail").modal({show: true});

        
        $("#codigo").html(row.data().alu_codigo);
        $("#nombre").html(row.data().nombre);
        $("#dni").html(row.data().alu_dni);
        $("#sexo").html(row.data().alu_sexo);
        $("#fec_nac").html(row.data().alu_fecha_nacimiento);
        $("#ubigeo").html(row.data().ubigeo);// arreglar
        $("#est_civil").html(row.data().alu_estado_civil);

        $("#codigo").html(row.data().alu_codigo);
        $("#nombre").html(row.data().nombre);
        $("#dni").html(row.data().alu_dni);
        $("#sexo").html(row.data().alu_sexo);
        $("#fec_nac").html(row.data().alu_fecha_nacimiento);
        $("#ubigeo").html(row.data().ubigeo);// arreglar
        $("#est_civil").html(row.data().alu_estado_civil);

    });

 
