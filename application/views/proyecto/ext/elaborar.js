//--------------BUSQUEDA DE DATOS ---------------------//
var pro_id=$('#pro_id').val(); 

  buscar_datos_proyecto();
  buscar_asesor_proyecto();
  buscar_parte_proyecto('');

  
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
          }
        }
    });    
  }

//--------------------------//

  function EditarNombre(){
    var modal =$('#Modal-EditNombre'); 
     modal.modal('show');
     modal.find('.modal-title').text('Nombre del Proyecto');
     nombre=$("#nombre_proyecto").text();
     $("#nombrePro").text(nombre);

  }

  function EditarAsesor(){//enviar la facultad
    var modal =$('#Modal-EditAsesor'); 
     modal.modal('show');
     modal.find('.modal-title').text('Asesor del Proyecto');
     nombre=$("#nombre_proyecto").text();

     $.ajax({
        url:   base_url+'docente/Asesor_json/',
        type:  'POST',
        success: function(data) {

          var d = eval(data);
          html="";
          for (var i = 0; i < d.length; i++) {
            html+="<option value='"+d[i]['doc_id']+"' >"+d[i]['nombre']+"</option>";
          }
          $("#sel_asesor").empty().html(html);
            
        }
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

    //$("#Editor_Texto").load(base_url+'rich_text/editor_text');
    $.ajax({
        data:  {text:parte_text},
        url:   base_url+'rich_text/editor_text',
        type:  'POST',
        success: function(data) {
            $("#Editor_Texto").empty().html(data);
            //$("div [title='Ahorrar']").style("display",'none');
        }
    }); 

    agregar_tabla_criterios(id);//Manda el nompar_id para traer sus criterios
    
  });


  function agregar_tabla_criterios(nompar_id){
  
    $.post(base_url+"proyecto/buscar_nombre_parte_criterio",{nompar_id:nompar_id},function(data){     
      t = _.template($("#Criterios-Partejs").html());

      var data = JSON.parse(data);
      $("#Criterios-Parte").html(t({data:data}));
      $("#example, #example2, #example3, #example4").popover();
    });
         
  }
  
  $('#guardar_nombre.btn').on('click', function () { //Agregar los datos correspondientes al modal-delete
    // TOMAR DATOS NECESARIOS
    nompar_id=$("nompar_id").val();
      $.ajax({
          data:  $("#form-EditNombre").serialize(),
          url:   base_url+'proyecto/Guardar_nombrePro',
          type:  'POST',
          success: function(data) {
              data=data.trim();
              $('#Modal-EditNombre').modal('hide');
              if (data=='I' || data=='M') {
                  alerta("GUARDADO CORRECTAMENTE");
                  buscar_datos_proyecto();
              }else {
                  alerta("HA OCURRIDO UN ERROR - LLAMAR A SOPORTE");                
              }
          }
      });

  });

  $('#guardar_parte.btn').on('click', function () { //Agregar los datos correspondientes al modal-delete
    // TOMAR DATOS NECESARIOS
    nompar_id=$("#nompar_id").val();
    parte_text=$("#RichTextEditor").val();
    $.ajax({
          data:  $("#form-EditParte").serialize(),
          url:   base_url+'proyecto/Guardar_parte',
          type:  'POST',
          success: function(data) {
              data=data.trim();
              $('#Modal-Parte').modal('hide');              
              if (data=='I' || data=='M') {
                  $('#parte_'+nompar_id+'_text').html(parte_text);
                  $('#parte_'+nompar_id+'_text').attr("par_id",'2');
                  alerta("GUARDADO CORRECTAMENTE");
                  //buscar_parte_proyecto(nompar_id);
              }else {
                  alerta("HA OCURRIDO UN ERROR - LLAMAR A SOPORTE");                
              }
          }
      });
  });

  

