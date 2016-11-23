  function buscar_datos_proyecto(){
  var pro_id=$('#pro_id').val();  
    $.post(base_url+"proyecto/buscar_proyecto",{pro_id:pro_id},function(datos){//Buscar datos del proyecto
        var obj = JSON.parse(datos);
        if(obj.length){
          $('#parte_pro_nombre_text').html(obj["0"].pro_nombre);
          $('#pro_fac').html(obj["0"].fac_descripcion.toUpperCase());
          $('#pro_esc').html(obj["0"].esc_descripcion.toUpperCase());
          $('#pro_alu').html(obj["0"].alu_nombres.toUpperCase());
          $('#pro_lugar').html(obj["0"].pro_ciudad.toUpperCase());
          $('#pro_fecha').html(obj["0"].fecha);
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
    $('#editar_parte i').attr("class","icon-eye-open");    
  }

  function LimpiarNotas(){
    for (var i = 0; i <=5; i++) {
       $('#nota_'+i).val(0);    
       $('#nota_'+i).prop( "disabled", true );
       $('#nota_'+i).css('border','inset');
    };   
  }

  function ValidarNota(num_criterio,id_criterio,n,min,max) {
   var num = n.value;
   if (parseFloat(num) < min || parseFloat(num) > max) {//fuera de rango
      $('#nota_'+num_criterio).focus();
      $('#nota_'+num_criterio).css('border','1px groove red');
   } else {
      $('#nota_'+num_criterio).css('border','inset');
   }
  }


   function agregar_tabla_criterios(nompar,part,pro,doc){

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

    $.post(base_url+"proyecto/buscar_evaluacion",{nompar:nompar,part:part,pro:pro,doc:doc},function(datos){
        var obj = JSON.parse(datos);
        var obs= '';
      
        if(obj.length){
          var descripcion="";
          for (var i = 0; i < obj.length; i++) {
            
            ptj_min = parseFloat(obj[i].cri_rango_min).toFixed(2);
            ptj_max = parseFloat(obj[i].cri_rango_max).toFixed(2);
            if(obj[i].eva_puntaje==null){
               ptj= 0.00;
            }else{               
               ptj= parseFloat(obj[i].eva_puntaje).toFixed(2);
               if(obj[i].eva_observacion!=null){
                  obs= obj[i].eva_observacion;
               }
            }
           
            descripcion+= 
            "<tr class=''>"+
              "<td class='boton'>"+
              "<a id='example4' data-content='"+obj[i].crit_descripcion+"'"+
                "data-placement='left' data-toggle='popover' class='btn btn-success' onclick='SeleccionarCriterio("+(i+1)+");'"+
                "data-original-title='Criterio "+(i+1)+"'>Criterio "+(i+1)+"</a>" +                        
              "</td>"+
              "<td>"+ptj_min+" - "+ptj_max+"</td>"+
              "<td><input class='nota' style='width:50px' id='nota_"+(i+1)+"'  value='"+ptj+"' disabled"+ 
              " maxlength='4' onblur='ValidarNota("+(i+1)+","+obj[i].crit_id+",this,"+ptj_min+","+ptj_max+")' ></td>"+              
            "</tr>";
          }
          
          $('#tabla_criterio_modal div table tbody').html(descripcion); 
          $("#example, #example2, #example3, #example4").popover();

          $('#id_alert').removeClass('alert alert-info');
          $('#id_alert').attr("class","widget-box observaciones");
          var observacion= 
              '<div class="control-group">'+
                '<form>'+
                  '<div class="controls">'+
                    '<textarea class="textarea_editor span12 observaciones" rows="4" placeholder="INGRESE OBSERVACIONES ..." id="obs_parte">'+
                     obs+'</textarea>'+
                  '</div>'+
                '</form>'+            
              '</div>';
          $('#id_alert').html(observacion); 
          
        }

        
        

        
    });  
    
  }



//Buscar los datos relacionados con el proyecto
  buscar_datos_proyecto();
  buscar_asesor_proyecto();
  buscar_parte_proyecto();
  cambiar_iconos();


  $('#editar_parte.btn').on('click', function () { //Agregar los datos correspondientes al modal-delete

    $('#myModal').modal('show');// Mostrar modal    
    $('#guardar_cambio').css('display','none');
    var modal =$('#myModal'); 
    

    var nompar_id=$(this).attr("id_parte"); 
    var titulo=$(this).parent().children('span').html();
    modal.find('.modal-title').text(titulo);//Cambiar El Titulo del Modal
    

    var parte_text=$('#parte_'+nompar_id+'_text').html();// Pasar de mostrar_arte a editar_parte
    $('#contenido_modal').html(parte_text);

    var par_id=$('#parte_'+nompar_id+'_text').attr("par_id"); 
    var pro_id=$('#pro_id').val();
    var doc_id=1; 

    
    agregar_tabla_criterios(nompar_id,par_id,pro_id,doc_id);

    //$('#id_alert').css('display','none'); //Oculta la alerta de informacion  
    $('#contenido_modal').css('height','250px'); //Cuadrar la informacion  
    $('#contenido_modal').css('padding','15px 40px 15px 40px'); //      
    $('#contenido_modal').css('overflow','auto');

    
  });


