
    
    //var base_url definida en header
    var table =$('#tablalineainvestigacion').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"linea_investigacion/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "linin_id" },
            { "data": "linin_descripcion" }, 
            { "data": "eje_descripcion" },
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
        url: base_url+'linea_investigacion/Nuevo',
        type:'POST',
    }).done(function(resp){
         var codigo = eval(resp);
        if(codigo[0]['LININ_ID'] == null){
            if (codigo[0]['linin_id']==null) {
                codigo=0;
            }else{
                codigo=parseInt(codigo[0]['linin_id']);
            }
        }else{
            if (codigo[0]['LININ_ID']==null) {
                codigo=0;
            }else{
                codigo=parseInt(codigo[0]['LININ_ID']);
            }
        }
        $("#linin_id").val(codigo+1);
        $("#linin_descripcion").removeAttr("disabled");
        $("#linin_eje").removeAttr("disabled");

        $("#GuardarBTN").removeAttr("disabled");
        $("#CancelarBTN").removeAttr("disabled");

        $("#NuevoBTN").attr("disabled","disabled");           
    });
}

function Guardar(obj){
    /*if(obj.linin_descripcion.value==""){
        $('#linin_descripcion').focus();
        $('#linin_descripcion').popover('show'); return 0;
    }
    if(obj.linin_eje.value==""){
        $('#linin_eje').focus();
        $('#linin_eje').popover('show'); return 0;
    }
*/  
    $("#linin_id").removeAttr("disabled");
    $.ajax({
        type:"POST",
        data: $('#ForLineaInvestigacion').serialize(),
        url: base_url +'linea_investigacion/Guardar',
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
    $("#linin_descripcion").val('');
    $("#linin_eje").val('');

    $("#linin_descripcion").attr("disabled","disabled");
    $("#linin_eje").attr("disabled","disabled");

    $("#GuardarBTN").attr("disabled","disabled");
    $("#CancelarBTN").attr("disabled","disabled");

    $("#NuevoBTN").removeAttr("disabled");
}

    

