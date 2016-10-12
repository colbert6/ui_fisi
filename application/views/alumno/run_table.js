
    
    //var base_url definida en header
    var table =$('#tab').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"alumno/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "alu_id" },
            { "data": "alu_codigo" },
            { "data": "nombre" }, 
            { "data": "esc_descripcion" }, 
            { "data": "alu_correo" },
            { "data": "alu_movil" }, 
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
    
     $('#ir_form').on('click', function () {      //Limpiar los datos del modal-form
        for (var i = 1; i <=8 ; i++) {
            $("#text_"+i).val("1");            
            if (i <= 3){
                $("#select_"+i).val("");
            }
            if (i <= 2){
                $('input:radio[name=radio_1]').attr('checked',false);
            }
            if (i <= 1){
                $("#date_"+i).val("");
            } 
        };

    } );


    /*$('#tab tbody').on('click', 'td.editar-data', function () { //Agregar los datos correspondientes al modal-form
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        $("#id").val(row.data().id_marca);
        $("#descripcion").val(row.data().descripcion);
        $("#abreviatura").val(row.data().abreviatura);

        var campos_form = ["descripcion","abreviatura"];
        quitar_formato(campos_form);


        $("#modal_form").modal({show: true});
    } );

    $('#tab tbody').on('click', 'td.eliminar-data', function () { //Agregar los datos correspondientes al modal-delete
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

    $('#submit_form').on('click', function () {        //Enviar los datos del modal-form a guardar en el controlador
        
        for (var i = 1; i <=8 ; i++) {
            $("#text_"+i).val("1");            
            if (i <= 3){
                $("#select_"+i).val("");
            }
            if (i <= 2){
                $('input:radio[name=radio_1]').attr('checked',false);
            }
            if (i <= 1){
                $("#date_"+i).val("");
            } 
        };
        
        $.post(base_url+"marca/guardar",{},function(valor){
            if(!isNaN(valor)){
                alert('Guardado exitoso');
                table.ajax.reload( null, false);
                $("#modal_form").modal('hide');
            }else{
                alert('guardar error:'+valor);
            }
        });
        
    } );

    /*$('#delete_click').on('click', function () {   //Enviar los datos del modal-form a eliminar en el controlador
        var id = $("#id_dato_eliminar").val();
        $.post(base_url+"marca/eliminar",{id:id},function(valor){
            if(!isNaN(valor)){
                alert('Dato eliminado');
                table.ajax.reload( null, false);
                $("#modal_delete").modal('hide');
            }else{
                alert('eliminar error:'+valor);
            }
        });
    } );*/

