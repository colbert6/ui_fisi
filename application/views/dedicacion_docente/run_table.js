
var tablapro =$('#tabladeddocente').DataTable( {
        
    "processing": true,
    "ajax": {
            "url": base_url+"dedicacion_docente/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "ded_id" },
            { "data": "ded_descripcion" },
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
});

function Actualizar(){
    $('#Alerta').modal('hide');
    setTimeout("", 200);

}

function Nuevo(){
    $.ajax({
        url: base_url+'dedicacion_docente/Nuevo',
        type:'POST',
    }).done(function(resp){
         var codigo = eval(resp);
        if(codigo[0]['DED_ID'] == null){
            if (codigo[0]['ded_id']==null) {
                codigo=0;
            }else{
                codigo=parseInt(codigo[0]['ded_id']);
            }
        }else{
            if (codigo[0]['DED_ID']==null) {
                codigo=0;
            }else{
                codigo=parseInt(codigo[0]['DED_ID']);
            }
        }
        $("#ded_id").val(codigo+1);
        $("#ded_descripcion").removeAttr("disabled").focus();

        $("#GuardarBTN").removeAttr("disabled");
        $("#CancelarBTN").removeAttr("disabled");

        $("#NuevoBTN").attr("disabled","disabled");           
    });
}

function Guardar(obj){
    /*if(obj.tipro_descripcion.value==""){
        $('#tipro_descripcion').focus();
        $('#tipro_descripcion').popover('show'); return 0;
    }*/
    $("#ded_id").removeAttr("disabled");

    $.ajax({
        type:"POST",
        data: $('#ForDedicacionDocente').serialize(),
        url: base_url +'dedicacion_docente/Guardar',
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
    $("#ded_id").val('');
    $("#ded_descripcion").val('');

    $("#ded_id").attr("disabled","disabled");
    $("#ded_descripcion").attr("disabled","disabled");

    $("#GuardarBTN").attr("disabled","disabled");
    $("#CancelarBTN").attr("disabled","disabled");

    $("#NuevoBTN").removeAttr("disabled");
}