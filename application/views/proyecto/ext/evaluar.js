//Buscar los datos relacionados con el proyecto
var pro_id=$('#pro_id').val(); 

var cantidad_partes=$("#cantidad_partes").val();
var partes_listas=0;

  buscar_datos_proyecto();
  buscar_asesor_proyecto();
  buscar_parte_proyecto('');
  cambiar_iconos();


  function buscar_datos_proyecto(){
   
    $.post(base_url+"proyecto/buscar_proyecto",{pro_id:pro_id},function(datos){//Buscar datos del proyecto
        var obj = JSON.parse(datos);
        if(obj.length){
          $('#nombre_proyecto').html(obj["0"].pro_nombre);          
          $('#pro_fac').html(obj["0"].fac_descripcion.toUpperCase());
          $('#pro_esc').html(obj["0"].esc_descripcion.toUpperCase());
          $('#pro_alu').html(obj["0"].alu_nombres.toUpperCase());
          $('#pro_lugar').html(obj["0"].pro_ciudad.toUpperCase());
          $('#pro_fecha').html(obj["0"].fecha);
        }       
        
    });
  }

  function buscar_asesor_proyecto(){
    $.post(base_url+"proyecto/buscar_asesor",{pro_id:pro_id},function(datos){
        var obj = JSON.parse(datos);
        if(obj.length){
          html="";

            html+="<p>"+obj[0].nombre;
            if(obj[0].ase_confirmado==null){ html+=" - (Sin Confirmar)" }
            html+= " </p> "  

          $('#id_asesor_proyecto').val(obj[0].doc_id);
          
          $('#asesor_proyecto').html(html);
        }
    });    
  }

  function buscar_parte_proyecto(nompar_id){

    $.post(base_url+"proyecto/buscar_parte",{pro_id:pro_id,nompar_id:nompar_id},function(datos){
        var obj = JSON.parse(datos);
        if(obj.length){
          for (var i = 0; i < obj.length; i++) {
            $('#parte_'+obj[i].nompar_id+'_text').html(obj[i].par_contenido);
            $('#parte_'+obj[i].nompar_id+'_text').attr("par_id",'1');
            partes_listas++;
          }
        }
    });    
  }

  function cambiar_iconos(){
    $('.iconos').attr("class","icon-check iconos");    
  }




  function LimpiarNotas(){
    for (var i = 0; i <=5; i++) {
       $('#nota_'+i).val(0);    
       $('#nota_'+i).prop( "disabled", true );
       $('#nota_'+i).css('border','inset');
    };   
  }

  function SeleccionarCriterio(num_criterio){
    LimpiarNotas();
    $('#nota_'+num_criterio).val('');  
    $('#nota_'+num_criterio ).prop( "disabled", false );
    $('#nota_'+num_criterio).focus();  
    
  }

  function ValidarNota(num_criterio,id_criterio,n,min,max) {
   var num = n.value;
   if (parseFloat(num) < min || parseFloat(num) > max) {//fuera de rango
      $('#nota_'+num_criterio).focus();
      $('#nota_'+num_criterio).css('border','1px groove red');
   } else {
      $('#nota_'+num_criterio).css('border','inset');
      $('#guardar_cambio').attr("crit_id",id_criterio);
      $('#guardar_cambio').attr("num_crit",num_criterio);
   }
  }


   function agregar_tabla_criterios2(nompar,part,pro,doc){

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
               $('#guardar_cambio').attr("crit_id",obj[i].crit_id);
               $('#guardar_cambio').attr("num_crit",(i+1));
               $('#guardar_cambio').attr("insert",1);
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


  function agregar_tabla_criterios(nompar_id){
  
    $.post(base_url+"proyecto/buscar_nombre_parte_criterio",{nompar_id:nompar_id},function(data){     
      t = _.template($("#Criterios-Partejs").html());

      var data = JSON.parse(data);
      $("#Criterios-Parte").html(t({data:data,casilla_evaluacion :true}));
      $("#example, #example2, #example3, #example4").popover();
    });
         
  }


  $('a.edit-parte').on('click', function () { //Agregar los datos correspondientes al modal-delete

    var modal =$('#Modal-Parte'); 
    var id=$(this).attr("id_parte"); //nombre_parte
    var titulo=$(this).parent().children('span').html();
    var parte_text=$('#parte_'+id+'_text').html();
    var par_id=$('#parte_'+id+'_text').attr("par_id");
    var info=$(this).attr("info_parte"); 

    modal.modal('show');// Mostrar modal   
    modal.find('.modal-title').text(titulo);//Cambiar El Titulo del Modal
    $('#informacion_parte').html("<i class='icon-info-sign'></i> "+info);
    $("#par_id").val(par_id); 
    $("#nompar_id").val(id); 
    

  
    //$('#id_alert').css('display','none'); //Oculta la alerta de informacion  
    $('#contenido_modal').css('height','250px'); //Cuadrar la informacion  
    $('#contenido_modal').css('padding','15px 40px 15px 40px'); //      
    $('#contenido_modal').css('overflow','auto');

    $('#Editor_Texto').html(parte_text);
    $('#Editor_Texto').addClass('Text-evaluar');

    $('#id_alert').html('<textarea style="margin: 0px 0px 10px; width: 876px; height: 85px;"> hola</textarea>');

    

    $('#guardar_cambio').attr("par_id",par_id);

     agregar_tabla_criterios(id);
    
  });





  $('#guardar_cambio.btn').on('click', function () { //Agregar los datos correspondientes al modal-delete
    if( $('#guardar_cambio').attr("crit_id")==0){
      alert('No ingreso puntaje');
    }else{
      alert('Correcto');
    }
    
    //TOMAR DATOS NECESARIOS
     var insert=$(this).attr("insert");
     var pro_id=$('#pro_id').val();
     var doc_id=1;   //id_parte parte a donde se va guardar
     var crit_id=$(this).attr("crit_id"); //que se va a llenar
     var par_id=$(this).attr("par_id");
     var obs=$('#obs_parte').val();
     var nota=$('#nota_'+$(this).attr("num_crit")).val();
      
    //MANDAR DATOS 
    $.post(base_url+"proyecto/guardar_evaluacion", {insert:insert,pro_id:pro_id,doc_id:doc_id,crit_id:crit_id,par_id:par_id,obs:obs,nota,nota},function(valor){
       //console.log("despues: "+insert+"-"+pro_id+"-"+doc_id+"-"+crit_id+"-"+par_id+"-"+obs+"-"+nota);
       if(!isNaN(valor)){
            alert('Guardado Exitoso');  
              //MOSTRAR DATOS                         
            $('#myModal').modal('hide');
        }else{
            alert('Ocurrio error: '+valor);
        }
    });

  });
 