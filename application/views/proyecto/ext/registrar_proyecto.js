GenerarCodigo ();

function GenerarCodigo (){
  $("#codigo").val(new Date().getTime());
}

function Mostrar_Lineas(element){    

    $.ajax({
        data:  { valor :$(element).val()},
        url:   base_url+'linea_investigacion/Lineas_json/',
        type:  'POST',
        success: function(data) {

          var d = eval(data);
          html="";
          for (var i = 0; i < d.length; i++) {
            html+="<option value='"+d[i]['linin_id']+"' >"+d[i]['linin_descripcion']+"</option>";
          }
          $("#linea_investigacion").empty().html(html);
            
        }
    });
}


function Buscar_Requisitos(){    
    $.ajax({
        data:  { tipo :$("#tipo_proyecto").val()},
        url:   base_url+'proyecto/buscar_requisito_pro/',
        type:  'POST',
        success: function(data) {

          var d = eval(data);
          html="";
          for (var i = 0; i < d.length; i++) {
              html+=  "<tr>"+
                      "<td>"+(i+1)+"</td>"+
                      "<td>"+d[i]['requi_descripcion']+"</td>"+
                      "<td class='falta-req'></td>"+
                      "<td class='subir-req'></td>"+
                      "</tr>";

          }
          $("#MostrarRequisitos").empty().html(html);
          TipoRequisitos= "Requisitos para "  + $("#tipo_proyecto option:selected").text();
          $("#TipoRequisitos").empty().html(TipoRequisitos);            
        }
    });
}

$('#tabRequisitos').on('click', function () { 
  Buscar_Requisitos()
});

$('#Guarda').on('click', function () { 
    $.ajax({
        data:  $("#form-RegProyecto").serialize(),
        url:   base_url+'proyecto/Guardar_proyecto',
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