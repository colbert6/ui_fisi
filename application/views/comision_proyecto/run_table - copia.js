function enviar_detalle_comision(){
    $.post(base_url+"comision_proyecto/grabardetallecomision",$("#form_detalle_comisiones").serialize(),function(data){
        if(data.msg == "ok"){
          $("#AsignarComision").modal("hide");
        }else{
          alert("no se pudo grabar");
        }
    },'json');
}

//PARA VALIDAR Y OCULTAR CAMPOS
function ValidarPro(codigo){
    $("#proyecto_id_detalle").val(codigo);
    $.ajax({
        url: base_url+'comision_proyecto/ExisteProyecto',
        type:"POST",
        data:'codproyecto='+codigo,
        success: function(data){
            var datos = eval(data);
              
        }

    });
}

//PARA ENVIAR DATOS DEL PROYECTO AL MODAL
function CargarProyecto(codigo){
    $("#proyecto_id_detalle").val(codigo);
    $.get("comision_proyecto/ProyectoAsignado",{'codproyecto':codigo},
    function(data){
        //alert(data);
        if (data == "1"){
            $.ajax({
                url: base_url+'comision_proyecto/CargandoProyectosAsignados',
                type:"POST",
                data:'cargar='+codigo,
                success: function(respuesta){
                    var datos = eval(respuesta);
                    $("#FomularioProyecto").hide();
                    $("#tabladetalle2").show();
                    $("#tabladetalle1").hide();
                    $("#BTNGuardar").hide();
                    html="";
                    for (var i = 0; i < datos.length; i++){
                        html += "<tr>";
                        html += "<td>"+datos[i]['pro_nombre'] +"</td>";
                        html += "<td>"+datos[i]['doc_nombre'] +" "+datos[i]['doc_apellido_paterno'] +" "+datos[i]['doc_apellido_materno'] +"</td>";
                        html += "<td>"+datos[i]['carg_descripcion'] +"</td>";
                        html += "<td>"+datos[i]['comeva_fecha_designacion'] +"</td>";
                        html += "<td>"+datos[i]['comeva_fecha_notificacion'] +"</td>";
                        html += "<td><button class='btn btn-warning btn-xs' style='margin-bottom:1px;'><span class='icon-arrow-up'></span> Enviar Email</button></td>";
                        html += "</tr>";
                    }
                    $("#TablaDetalleComisionAsignada tbody").html(html); 
                }
            });
        }else{
            $("#lista").empty(); 
            $("#docente").val("");
            $("#cargo").val("");
            $.ajax({
                url: base_url+'comision_proyecto/CargandoProyectos',
                type:"POST",
                data:'cargar='+codigo,
                success: function(respuesta){
                    var datos = eval(respuesta);
                    $("#tabladetalle2").hide();
                    $("#tabladetalle1").show();
                    $("#Boton").hide();
                    $("#FomularioProyecto").show();
                    $("#codproyecto").val(datos[0]['pro_id']);
                    $("#nombre").val(datos[0]['pro_nombre']);
                }
            });
        }
    },'json');
}

function Asignar(obj){
    if(obj.docente.value==""){
        $('#docente').focus();
        $('#docente').popover('show'); return 0;
    }
    if(obj.cargo.value==""){
        $('#cargo').focus();
        $('#cargo').popover('show'); return 0;
    }

    var existedodecente = false;
    $('input[name^="id_docente"]').each(function() {
        if($('#docente').val() == $(this).val()){
            existedodecente = true;
        }
    });

    var existecargo = false;
    $('input[name^="id_cargo"]').each(function() {
        if($('#cargo').val() == $(this).val()){
            existecargo = true;
        }
    });

    if((existecargo == true) || (existedodecente == true) ){
        alert("el cargo o docente ya estan asignados");
        return 0;
    }

    html ="<tr id='Proyecto_"+$("#pro_id").val()+"'>"+
    "<td> "+$("#nombre").val()+"</td>"+
    "<td><input type='hidden' name='id_docente[]' value='"+$("#docente").val()+"'' > "+$("#docente option:selected").text()+"</td>"+
    "<td><input type='hidden' name='id_cargo[]' value='"+$("#cargo").val()+"'' > "+$("#cargo option:selected").text()+"</td>"+
    "<td><button class='btn btn-primary btn-xs' style='margin-bottom:1px;' onclick=$(this).closest('tr').remove();><span class='icon-remove' style='color:#D01111'></span> </button></td></tr>";

    $("#TablaDetalleComision tbody").append(html);
  }

//PARA ENVIAR DATOS DEL DOCENTE DEL PROYECTO AL MODAL
function CargarDocente(codigo){
    $("#proyecto_id_detalle").val(codigo);
    $.ajax({
        url: base_url+'comision_proyecto/CargarPresidente',
        type:"POST",
        data:'cargar='+codigo,
        success: function(data){
            var datos = eval(data);
              
            $("#codproyecto").val(datos[0]['pro_id']);
            $("#nombre").val(datos[0]['pro_nombre']);
        }
    });
}


  


