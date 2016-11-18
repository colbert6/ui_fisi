  function listar_asesores(){
    $.post(base_url+"docente/listar_docentes",function(datos){//Falta Enviar el parametro de que escuela es
        var obj = JSON.parse(datos);     
        var cont_modal=   
        '<form action="#" class="form-horizontal">'+
          '<div class="control-group">'+
            '<label class="control-label">Docente :</label>'+
            '<div class="controls">'+
              ' <select id="form_parte">';

        for (var i = 0; i < obj.length; i++) {
          nombre=obj[i].doc_nombre+' '+obj[i].doc_apellido_paterno;
          cont_modal+='<option value="'+obj[i].doc_id+'">'+obj[i].doc_nombre+'</option> ';
         
        };

        cont_modal+= '</select>'+'</div>'+'</div>'+'</form>' ;
        $('#contenido_modal').html(cont_modal);
    });
  }

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
  var pro_id=$('#pro_id').val();  
    $.post(base_url+"proyecto/buscar_asesor",{pro_id:pro_id},function(datos){
        var obj = JSON.parse(datos);
        if(obj.length){
          $('#parte_asesor_text').html(obj["0"].nombre);
          $('#editar_parte[id_parte=asesor]').hide();
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
            "</tr>";
          }
          
          $('#tabla_criterio_modal div table tbody').html(descripcion); 
          $("#example, #example2, #example3, #example4").popover();
        }
        
    });
      
  }

  buscar_datos_proyecto();
  buscar_asesor_proyecto();
  buscar_parte_proyecto();


  $('#editar_parte.btn').on('click', function () { //Agregar los datos correspondientes al modal-delete

    $('#myModal').modal('show');// Mostrar modal
    var modal =$('#myModal'); 

  	var id=$(this).attr("id_parte"); 
    var titulo=$(this).parent().children('span').html();
    modal.find('.modal-title').text(titulo);//Cambiar El Titulo del Modal

    if(id=='asesor'){//Caso que sea asesor muestra un select
      listar_asesores();
      $('#tabla_criterio_modal').hide();

    }else{//Muestra el text_area
      var parte_text=$('#parte_'+id+'_text').html();// Pasar de mostrar_arte a editar_parte

      var cont_modal=  
      '<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>'+
        '<h5>wysihtml5</h5>'+
      '</div>'+
      '<div class="widget-content">'+
        '<div class="control-group">'+
          '<form>'+
            '<div class="controls">'+
              '<textarea class="textarea_editor" rows="6" placeholder="Enter text ..." id="form_parte">'+
                parte_text+
              '</textarea>'+
            '</div>'+
          '</form>'+            
        '</div>'+
      '</div>';
      $('#contenido_modal').html(cont_modal);
      $('.textarea_editor').wysihtml5();//Activar wysihtml5 
      

      agregar_tabla_criterios(id);//Manda el nompar_id para traer sus criterios
      $('#tabla_criterio_modal').show();

    }     

  	$('#informacion_parte').html("<i class='icon-info-sign'></i> "+$(this).attr("info_parte")); //Mostrar Informacion de la parte    
  	$('#guardar_cambio').attr("id_parte",id);//Cambiar atributo id_parte del Boton


    //$('#id_alert').attr("class","widget-box observaciones");
    var observacion= "<i class='icon-ok-circle'></i> OBSERVACIONES : <br>"+
                    "Aca iran las observaciones de esta parte del proyecto";
        
    $('#observaciones_parte').html(observacion); 
  });


  $('#guardar_cambio.btn').on('click', function () { //Agregar los datos correspondientes al modal-delete
    // TOMAR DATOS NECESARIOS
     var pro_id=$('#pro_id').val();
     var id_campo=$(this).attr("id_parte");   //id_parte parte a donde se va guardar
     var valor=$('#form_parte').val(); //que se va a llenar
     var par_id=$('#parte_'+id_campo+'_text').attr("par_id");
      
    //MANDAR DATOS 
    $.post(base_url+"proyecto/guardar",{pro_id:pro_id,id_campo:id_campo,valor:valor,par_id:par_id},function(valor){
       if(!isNaN(valor)){
            alert('Guardado Exitoso');   
            //MOSTRAR DATOS 
            buscar_datos_proyecto();
            buscar_asesor_proyecto();
            buscar_parte_proyecto();            
            $('#myModal').modal('hide');
        }else{
            alert('Ocurrio error: '+valor);
        }
    });

  });

