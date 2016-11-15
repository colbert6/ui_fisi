
    //var base_url definida en header
    var table =$('#tablafasecomision').DataTable( {

        "processing": true,
        "ajax": {
            "url": base_url+"fase_comision/cargar_datos/",
            "type": "POST"
        },
        "columns": [
            { "data": "fascom_id" },
            { "data": "fascom_descripcion" }, 
            { "data": "fascom_plazo" },
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


$(function(){   
    $('[data-toggle="popover"]').popover();

    $('#fascom_id').on('click',function(){
        $('#fascom_id').popover('hide');
    });
    $('#fascom_descripcion').on('click',function(){
        $('#fascom_descripcion').popover('hide');
    }); 
    $('#fascom_plazo').on('click',function(){
        $('#fascom_plazo').popover('hide');
    }); 
});


function Nuevo(){
    $.ajax({
        url: base_url+'fase_comision/Nuevo',
        type:'POST',
    }).done(function(resp){
         var codigo = eval(resp);
        if(codigo[0]['FASCOM_ID'] == null){
            if (codigo[0]['fascom_id']==null) {
                codigo=0;
            }else{
                codigo=parseInt(codigo[0]['fascom_id']);
            }
        }else{
            if (codigo[0]['FASCOM_ID']==null) {
                codigo=0;
            }else{
                codigo=parseInt(codigo[0]['FASCOM_ID']);
            }
        }
        $("#fascom_id").val(codigo+1);
        $("#fascom_descripcion").removeAttr("disabled").focus();
        $("#fascom_plazo").removeAttr("disabled").focus();

        $("#GuardarBTN").removeAttr("disabled");
        $("#CancelarBTN").removeAttr("disabled");

        $("#NuevoBTN").attr("disabled","disabled");           
    });
}

function Guardar(obj){
   /*if(obj.fascom_descripcion.value==""){
        $('#fascom_descripcion').focus();
        $('#fascom_descripcion').popover('show'); return 0;
    }
    if(obj.fascom_plazo.value==""){
        $('#fascom_plazo').focus();
        $('#fascom_plazo').popover('show'); return 0;
    }*/

    $("#fascom_id").removeAttr("disabled");

    $.ajax({
        type:"POST",
        data: $('#ForFaseComision').serialize(),
        url: base_url +'fase_comision/Guardar',
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
    $("#fascom_id").val('');
    $("#fascom_descripcion").val('');
    $("#fascom_plazo").val('');

    $("#fascom_id").attr("disabled","disabled");
    $("#fascom_descripcion").attr("disabled","disabled");
    $("#fascom_plazo").attr("disabled","disabled");

    $("#GuardarBTN").attr("disabled","disabled");
    $("#CancelarBTN").attr("disabled","disabled");

    $("#NuevoBTN").removeAttr("disabled");
}