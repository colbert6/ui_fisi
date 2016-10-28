  function buscar_datos_proyecto(){
  var pro_id=$('#pro_id').val();  
    $.post(base_url+"proyecto/buscar_proyecto",{pro_id:pro_id},function(datos){//Buscar datos del proyecto
        var obj = JSON.parse(datos);
        if(obj.length){
          $('#parte_pro_nombre_text').html(obj["0"].pro_nombre);
        }
        
    });
  }

  function buscar_asesor_proyecto(){
  $('#editar_parte[id_parte=asesor]').hide();
  var pro_id=$('#pro_id').val();  
    $.post(base_url+"proyecto/buscar_asesor",{pro_id:pro_id},function(datos){
        var obj = JSON.parse(datos);
        if(obj.length){
          $('#parte_asesor_text').html(obj["0"].nombre);
          
        }
    });    
  }

  function buscar_parte_proyecto(){
    var pro_id=$('#pro_id').val();  
    $.post(base_url+"proyecto/buscar_parte",{pro_id:pro_id},function(datos){
        var obj = JSON.parse(datos);
        if(obj.length){
          for (var i = 0; i < obj.length; i++) {
            $('#parte_'+obj[i].nompar_id+'_text').html(obj[i].par_contenido);
            $('#parte_'+obj[i].nompar_id+'_text').attr("par_id",obj[i].par_id);
          }
        }
    });    
  }

  function cambiar_iconos(){
    $('#editar_parte i').attr("class","icon-check");    
  }

   function agregar_tabla_criterios(nompar_id){

    var tabla_criterio=  
      "<div class='widget-title'> <span class='icon'> <i class='icon-th'></i> </span>"+
        "<h5>Instrumento Evaluación </h5>"+
      "</div>"+
      "<div class='widget-content nopadding'>"+
        "<table class='table table-bordered table-striped'>"+
          "<thead>"+
            "<tr>"+
              "<th>Indicadores</th>"+
              "<th>Escalera<br>(min - max)</th>"+              
              "<th>Nota</th>"+
            "</tr>"+
          "</thead>"+
          "<tbody>"+
          "</tbody>"+
        "</table>"+
      "</div>";
    $('#tabla_criterio_modal').html(tabla_criterio); 

    $.post(base_url+"proyecto/buscar_nombre_parte_criterio",{nompar_id:nompar_id},function(datos){
        var obj = JSON.parse(datos);
        if(obj.length){
          var descripcion="";
          for (var i = 0; i < obj.length; i++) {
            
            ptj_min = parseFloat(obj[i].cri_rango_min).toFixed(2);
            ptj_max = parseFloat(obj[i].cri_rango_max).toFixed(2);
            descripcion+= 
            "<tr class=''>"+
              "<td>"+
              "<a title='' id='example4' data-content='"+obj[i].crit_descripcion+"'"+
                "data-placement='left' data-toggle='popover' class='btn btn-success'  "+
                "data-original-title='Criterio "+(i+1)+"'>Criterio "+(i+1)+"</a>" +                        
              "</td>"+
              "<td>"+ptj_min+" - "+ptj_max+"</td>"+
              "<td><input style='width:50px'></td>"+              
            "</tr>";
          }
          
          $('#tabla_criterio_modal div table tbody').html(descripcion); 
          $("#example, #example2, #example3, #example4").popover();
        }
        
    });
    $('#id_alert').removeClass('alert alert-info');
    $('#id_alert').attr("class","widget-box observaciones");
    var observacion= 
        '<div class="control-group">'+
          '<form>'+
            '<div class="controls">'+
              '<textarea class="textarea_editor span12 observaciones" rows="4" placeholder="INGRESE OBSERVACIONES ..." id="obs_parte">'+
               '</textarea>'+
            '</div>'+
          '</form>'+            
        '</div>';
    $('#id_alert').html(observacion); 


      
  }




//Buscar los datos relacionados con el proyecto
  buscar_datos_proyecto();
  buscar_asesor_proyecto();
  buscar_parte_proyecto();
  cambiar_iconos();


  $('#editar_parte.btn').on('click', function () { //Agregar los datos correspondientes al modal-delete

    $('#myModal').modal('show');// Mostrar modal
    var modal =$('#myModal'); 
    

    var id=$(this).attr("id_parte"); 
    var titulo=$(this).parent().children('span').html();
    modal.find('.modal-title').text(titulo);//Cambiar El Titulo del Modal
    

    var parte_text=$('#parte_'+id+'_text').html();// Pasar de mostrar_arte a editar_parte
    $('#contenido_modal').html(parte_text);

    agregar_tabla_criterios(id);

    //$('#id_alert').css('display','none'); //Oculta la alerta de informacion  
    $('#contenido_modal').css('height','250px'); //Cuadrar la informacion  
    $('#contenido_modal').css('padding','15px 40px 15px 40px'); //      
    $('#contenido_modal').css('overflow','auto');

    $('#guardar_cambio').attr("id_parte",id);//Cambiar atributo id_parte del Boton
  });
