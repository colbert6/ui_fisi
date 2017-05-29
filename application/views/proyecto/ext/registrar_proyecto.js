

function GenerarCodigo(){


  $.post(base_url+"proyecto/generar_codigo",function(datos){
      var obj = JSON.parse(datos);
      if(obj.length){
        alert(obj["0"].correlativo);
      }
  });  

  $("#codigo").val(new Date().getTime());  
}

$(document).on("click","a.remove",function(e) {
  e.preventDefault();
  $(this).parent("div").parent("li").parent("ul").remove();
})

function buscar_colaborador(){
  var dni= $("#dni_colaborador").val();
  if(dni.length<8){
    return false;
  }
    $.post(base_url+"proyecto/buscar_colaborador",{dni:dni},function(datos){
        var obj = JSON.parse(datos);
        if(obj.length){
          $("#result_colaborador").val(obj["0"].tipo_id+'-'+obj["0"].col_id+'-'+obj["0"].tipo+'-'+obj["0"].facultad+'-'+obj["0"].nombre);
          $("#result_colaborador_nombre").val(obj["0"].nombre);
        }
    });    
}

function Agregar_Colaborador(){
  var new_colaborador=($("#result_colaborador").val()).split("-");
  
  if(!($("#colaborador[value='"+new_colaborador[0]+"-"+new_colaborador[1]+"']").length>0  ) ){
    t = _.template($("#Lista-Colaboradorjs").html());
    $("#Lista-Colaboradores").append(t({data:new_colaborador}));   
  }      
  
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
            data=data.trim();
            if (data=='I') {
                alerta("REGISTRADO CORRECTAMENTE");  
                loader('proyecto/mis_proyectos');
            }else if (data=='M'){
                alerta("MODIFICADO CORRECTAMENTE");
            } else {
                alerta("HA OCURRIDO UN ERROR - LLAMAR A SOPORTE");                
            }
            
        }
    });

} );