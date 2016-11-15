
    
    //var base_url definida en header
    var table =$('#tablafacultad').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"facultad/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "fac_id" },
            { "data": "fac_descripcion"}, 
            { "data": "fac_codigo_sira" },
            { "data": "fac_abreviatura"},
            { "data": "fac_logo"},
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
        url: base_url+'facultad/Nuevo',
        type:'POST',
    }).done(function(resp){
         var codigo = eval(resp);
        if(codigo[0]['FAC_ID'] == null){
            if (codigo[0]['fac_id']==null) {
                codigo=0;
            }else{
                codigo=parseInt(codigo[0]['fac_id']);
            }
        }else{
            if (codigo[0]['FAC_ID']==null) {
                codigo=0;
            }else{
                codigo=parseInt(codigo[0]['FAC_ID']);
            }
        }
        $("#fac_id").val(codigo+1);
        $("#fac_descripcion").removeAttr("disabled").focus();
        $("#fac_codigo_sira").removeAttr("disabled").focus();
        $("#fac_abreviatura").removeAttr("disabled").focus();
        $("#fac_logo").removeAttr("disabled").focus();

        $("#GuardarBTN").removeAttr("disabled");
        $("#CancelarBTN").removeAttr("disabled");

        $("#NuevoBTN").attr("disabled","disabled");           
    });
}

function Guardar(obj){
    /*if(obj.fac_id.value==""){
        $('#fac_id').focus();
        $('#fac_id').popover('show'); return 0;
    }*/
    $("#fac_id").removeAttr("disabled");
    $.ajax({
        type:"POST",
        data: $('#ForFacultad').serialize(),
        url: base_url +'facultad/Guardar',
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
    $("#fac_id").val('');
    $("#fac_descripcion").val('');
    $('#fac_codigo_sira').val('');
    $('#fac_abreviatura').val('');
    $('#fac_logo').val('');

    $("#fac_id").attr("disabled","disabled");
    $("#fac_descripcion").attr("disabled","disabled");
    $("#fac_codigo_sira").attr("disabled","disabled");
    $("#fac_abreviatura").attr("disabled","disabled");
    $("#fac_logo").attr("disabled","disabled");

    $("#GuardarBTN").attr("disabled","disabled");
    $("#CancelarBTN").attr("disabled","disabled");

    $("#NuevoBTN").removeAttr("disabled");
}

    