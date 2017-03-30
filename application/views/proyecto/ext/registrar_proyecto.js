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