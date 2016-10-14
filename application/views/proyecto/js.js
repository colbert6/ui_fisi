//Activar Text RTF

  $('#editar_parte.btn').on('click', function () { //Agregar los datos correspondientes al modal-delete

    $('#myModal').modal('show');// Mostrar modal
    var modal =$('#myModal'); 
  	modal.find('.modal-title').text('Ingrese la Siguiente Informacion');//Cambiar El Titulo del Modal

    var id=$(this).attr("id_parte"); 
    var parte_text=$('#parte_'+id+'_text').html();// Pasar de mostrar_arte a editar_parte

    var cont_modal=  
    '<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>'+
      '<h5>wysihtml5</h5>'+
    '</div>'+
    '<div class="widget-content">'+
      '<div class="control-group">'+
        '<form>'+
          '<div class="controls">'+
            '<textarea class="textarea_editor span12" rows="6" placeholder="Enter text ..." id="form_parte">'+
              parte_text+
            '</textarea>'+
          '</div>'+
        '</form>'+
      '</div>'+
    '</div>';
    $('#RTF_modal').html(cont_modal);
    $('.textarea_editor').wysihtml5();
    $('.textarea_editor').removeClass('span12'); //Activar wysihtml5 

  	$('#informacion_parte').html("<i class='icon-info-sign'></i> "+$(this).attr("info_parte")); //Mostrar Informacion de la parte

  	$('#guardar_cambio').attr("id_parte",id);//Cambiar atributo id_parte del Boton
  });

  $('#guardar_cambio.btn').on('click', function () { //Agregar los datos correspondientes al modal-delete
    var id=$(this).attr("id_parte");   
    var form_parte=$('#form_parte').val();
    $('#parte_'+id+'_text').html(form_parte);
    $('#myModal').modal('hide');

  });

  $('#subir_proyecto').on('click', function () {        //Enviar los datos del modal-form a guardar en el controlador
        
        $("div .parte_text").each(function (index) { 
            var texto= $(this).html();
            
        })
        
        /*$.post(base_url+"proyecto/guardar",{},function(valor){
            if(!isNaN(valor)){
                alert('Guardado Exitoso');
                //$("#modal_form").modal('hide');
            }else{
                alert('guardar error:'+valor);
            }
        });*/
        
  });


 

