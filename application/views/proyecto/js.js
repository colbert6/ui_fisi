
  //alert('hola');
  $('a.btn').on('click', function () { //Agregar los datos correspondientes al modal-delete
       //alert($(this).attr("val"));

       	$('#myModal').modal('show');
       	var modal =$('#myModal');
		modal.find('.modal-title').text('Ingrese la Siguiente Informacion');

		$('#informacion_parte').html("<i class='icon-info-sign'></i> "+$(this).attr("info_parte"));


  });

