
    
    //var base_url definida en header
    var table =$('#tablacatdocentes').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"categoria_docente/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "catdoc_id" },
            { "data": "catdoc_descripcion"}, 
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


function Nuevo(){
    $.ajax({
        url: base_url+'categoria_docente/Nuevo',
        type:'POST',
    }).done(function(resp){
         var codigo = eval(resp);
        if(codigo[0]['CATDOC_ID'] == null){
            if (codigo[0]['catdoc_id']==null) {
                codigo=0;
            }else{
                codigo=parseInt(codigo[0]['catdoc_id']);
            }
        }else{
            if (codigo[0]['CATDOC_ID']==null) {
                codigo=0;
            }else{
                codigo=parseInt(codigo[0]['CATDOC_ID']);
            }
        }
        $("#catdoc_id").val(codigo+1);
        $("#catdoc_descripcion").removeAttr("disabled").focus();

        $("#GuardarBTN").removeAttr("disabled");
        $("#CancelarBTN").removeAttr("disabled");

        $("#NuevoBTN").attr("disabled","disabled");           
    });
}

function Guardar(obj){
    /*if(obj.catdoc_id.value==""){
        $('#catdoc_id').focus();
        $('#catdoc_id').popover('show'); return 0;
    }
    if(obj.tipro_descripcion.value==""){
        $('#tipro_descripcion').focus();
        $('#tipro_descripcion').popover('show'); return 0;
    }*/
    $("#catdoc_id").removeAttr("disabled");

    $.ajax({
        type:"POST",
        data: $('#ForCategoriaDocente').serialize(),
        url: base_url +'categoria_docente/Guardar',
        success: function(data){
            $("#Mensaje").html(data);
            $('#Alerta').modal({
                show:true,
                backdrop:'static'
            });
        }
    });
}

function Cancelar(){
    $("#catdoc_id").val('');
    $("#catdoc_descripcion").val('');

    $("#catdoc_id").attr("disabled","disabled");
    $("#catdoc_descripcion").attr("disabled","disabled");

    $("#GuardarBTN").attr("disabled","disabled");
    $("#CancelarBTN").attr("disabled","disabled");

    $("#NuevoBTN").removeAttr("disabled");
}

    