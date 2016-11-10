<div id="content" style="padding: 0px 13px;">
  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Seguimiento de los Proyectos Registrados</center></h1>
  </div>
  <div class="container-fluid" style="z-index: 1001;">
      <hr style="margin:0px">
      <div class="row-fluid">

        <div class="span12">
          <div class="widget-box">

            <div class="widget-title" >
              <ul class="nav nav-tabs">
                <li  class="active"><a data-toggle="tab" href="#tab1">Lista de Proyectos</a></li>
               <!-- <li><a data-toggle="tab" href="#tab2">Proyectos Asignados</a></li>  -->
                <li><a data-toggle="tab" href="#tab3">Estadísticas</a></li>
              </ul>
            </div>

            <div class="widget-content tab-content">
              <div id="tab1" class="tab-pane active">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"> <i class="icon-tag"></i> </span>
                  <h5>Lista de Proyectos Registrados</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" id="tablaproyecto">
                        <thead>
                            <tr>
                              <th>Nro</th>
                              <th>Alumno</th>
                              <th>Nombre de Proyecto</th>
                              <th>Tipo</th>
                              <th>Fecha Registro</th>
                              <th colspan="2">Jurado</th>                         
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                            foreach ($Proyectos as $value): ?>
                              <tr>
                                <td><center> <?php echo $value->pro_id; ?></center></td>
                                <td><center> <?php echo $value->alu_nombre." ".$value->alu_apellido_paterno." ".$value->alu_apellido_materno; ?></center></td>
                                <td><center> <?php echo $value->pro_nombre; ?></center></td>
                                <?php 
                                  if ($value->tipro_id==1) { ?>
                                      <td><center> <img src="<?php echo base_url();?>img/celeste.png"></center></td>
                                    <?php }else 
                                    { ?>
                                      <td><center> <img src="<?php echo base_url();?>img/azul.png"></center></td>
                                    <?php }
                                  ?>
                                <td><center> <?php echo $value->pro_fecha_registro; ?></center></td>
                                  <td> 
                                      <button class="btn btn-warning btn-xs" style="margin-bottom:1px;" href="#AsignarComision" data-toggle="modal" id="AgregarComision" onclick="CargarProyecto(<?php echo $value->pro_id; ?>)"><span class="icon-plus-sign"></span></button>
                                  </td>

                                  <td>
                                    <button class="btn btn-success btn-xs" style="margin-bottom:1px;" href="#DetalleDocente" data-toggle="modal" id="AgregarComision" onclick=""></button>
                                    <button class="btn btn-success btn-xs" style="margin-bottom:1px;" href="#DetalleDocente" data-toggle="modal" id="AgregarComision"></button>
                                    <button class="btn btn-success btn-xs" style="margin-bottom:1px;" href="#DetalleDocente" data-toggle="modal" id="AgregarComision"></button>
                                    </a>
                                  </td>
                              </tr>
                            <?php endforeach 
                          ?>
                        </tbody>
                    </table>        
                </div> <!-- FIN de Fomulario de Informacion -->
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <center>
                            <img src="<?php echo base_url();?>img/celesteley.png"><b> Proyecto de Tesis </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <img src="<?php echo base_url();?>img/azuley.png"><b> Tesis </b>
                        </center>
                    </div>
                </div>
              </div>
              <!--
              <div id="tab2" class="tab-pane"> 
              </div>
              -->
              <div id="tab3" class="tab-pane">
                <div class="span12"> 
                  <div class="row-fluid">
                      <div class="span12">
                          <div class="widget-box">
                              <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                                  <h5>Reportes por Docente</h5>
                              </div>
                              <div class="widget-content">
                                  <div id="chartBarra" style="height: 370px; width: 100%; "></div>
                                  
                              </div>
                          </div>
                      </div>   
                  </div><br><br>

                  <div class="row-fluid">
                      <div class="span6">
                          <div class="widget-box">
                              <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                                  <h5>Reportes de Tipos de Proyectos por Semestre</h5>
                              </div>
                              <div class="widget-content">
                                  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                              </div>
                          </div>
                      </div>   
                  </div>

                   <div class="row-fluid">
                      <div class="span6">
                          <div class="widget-box">
                              <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                                  <h5>Reportes por Linea de Investigacion</h5>
                              </div>
                              <div class="widget-content">
                                  <div id="chartCirculo" style="height: 370px; width: 100%;"></div>
                                  
                              </div>
                          </div>
                      </div>   
                  </div>
                </div>
              </div> <!-- FIN de Fomulario de Informacion --> 
              
            </div>

          </div>           
        </div>        
      </div>
  </div>

<!-- MODAL COMISION PROYECTO -->
  <div class="modal fade" id="AsignarComision" tabindex="-1" role="dialog" aria-hidden="true" >
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center>
                    <h3 class="modal-title"><i class="fa fa-users"></i> Asignar Comision Evaluadora o Jurado de Sustentación</h3>
                  </center>
              </div>
              <div class="modal-body">
                  <div class="row-fluid">
                    <div class="span12" id="FomularioProyecto">
                      <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-repeat"></i></span>
                          <h5>Informacion del Proyecto</h5>
                        </div>

                        <div class="widget-content nopadding">
                          <form class="form-horizontal" id="ForComisionEvaluadora">
                            <input type="hidden" name="codproyecto" id="codproyecto">
                            <div class="control-group span11">
                              <label class="control-label">Proyecto :</label>
                              <div class="controls">
                                <input type="text" name="nombre" id="nombre" disabled="" class="span12">
                              </div>
                            </div>

                            <div class="control-group span5">
                              <label class="control-label">Docente :</label>
                              <div class="controls">
                                <select id="docente" value="docente" class="span12">
                                  <option value="docente">Elegir Docente</option>
                                    <?php foreach ($Docentes as $value): ?>
                                      <option value="<?php echo $value->doc_id;?>"><?php echo $value->doc_nombre." ".$value->doc_apellido_paterno." ".$value->doc_apellido_materno; ?>
                                      </option>
                                    <?php endforeach ?>
                                </select>
                              </div>
                            </div>
                            
                            <div class="control-group">
                              <div class="controls span2">
                                  &nbsp;
                                  <button class="btn btn-warning btn-xs" style="margin-bottom:1px;" data-toggle="modal" data-target="#Grafico"><span class="icon-plus-sign"></span> Ver </button>
                              </div>
                              &nbsp;
                              <label class="control-label">Funcion :&nbsp;</label>
                              <div>
                                <select id="cargo" value="cargo" class="span2 m-">
                                  <option value="cargo"> Elegir Funcion</option>
                                    <?php foreach ($Cargos as $value): ?>
                                      <option value="<?php echo $value->carg_id;?>"><?php echo $value->carg_descripcion;?>
                                      </option>
                                    <?php endforeach ?>
                                </select>
                              </div>
                            </div>

                            <div class="control-group">
                              <div class="controls" align="center">
                                  <button type="button" class="btn btn-success" style="margin-bottom:1px;" data-placement="right" onclick="return Asignar(this.form);"><span class=" icon-ok-sign" aria-hidden="true"> Asignar </button>
                              </div>
                              
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
               

                    <div class="span11">
                      <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                          <h5>Lista de Comisión</h5>
                        </div>
                        <div class="widget-content nopadding">
                          <form id="form_detalle_comisiones">
                            <input type="hidden" id="proyecto_id_detalle" name="proyecto_id">
                            <table class="table table-bordered data-table" id="TablaDetalleComision">
                              <thead>
                                <tr>
                                  <th>Proyecto</th>
                                  <th>Docente</th>
                                  <th>Función</th>
                                  <th>Acción</th>
                                </tr>
                              </thead>

                              <tbody>
                              </tbody>
                            </table>
                          </form>
                        </div>
                      </div>
                    </div> 
                  </div>
              </div>

                  <div class="modal-footer clearfix">
                      <button type="button" onclick="Cancelar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                      <button type="button" onclick="enviar_detalle_comision()" class="btn btn-primary pull-left"><i class="fa fa-check"></i> Guardar</button>
                  </div>

          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->   



<!-- MODAL GRAFICO-->
 <div id="Grafico" class="modal hide" role="dialog">
  <div class="modal-dialog">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3 class="modal-title"><i class="fa fa-users"></i> Grafico Estadistico </h3>
    </div>
    <div class="modal-body">
      <div class="widget-content">
          <canvas id="GraficoReporte" width="600" height="150"></canvas>
      </div>
         
    </div>
    <div class="modal-footer clearfix">
        <a data-dismiss="modal" class="btn btn-primary" onclick="Actualizar();">Aceptar</a>
    </div>
  </div>
</div> 

<script type="text/javascript">
  function enviar_detalle_comision(){
    $.post(base_url+"comision_proyecto/grabardetallecomision",$("#form_detalle_comisiones").serialize(),function(data){
        if(data.msg == "ok"){
          $("#AsignarComision").modal("hide");
        }else{
          alert("no se pudo grabar");
        }
    },'json');
  }

  //PARA VALIDAR Y OCULTAR CAMPOS
  function ValidarPro(codigo){
      $("#proyecto_id_detalle").val(codigo);
      $.ajax({
          url: base_url+'comision_proyecto/ExisteProyecto',
          type:"POST",
          data:'codproyecto='+codigo,
          success: function(data){
              var datos = eval(data);
              
          }

      });
  }

  //PARA ENVIAR DATOS DEL PROYECTO AL MODAL
  function CargarProyecto(codigo){
      $("#proyecto_id_detalle").val(codigo);
      $.get("comision_proyecto/ProyectoAsignado",{'codproyecto':codigo},
      function(data){
        //alert(data);
          if (data == "1"){
              $.ajax({
                  url: base_url+'comision_proyecto/CargandoProyectosAsignados',
                  type:"POST",
                  data:'cargar='+codigo,
                  success: function(respuesta){
                      var datos = eval(respuesta);
                      $("#FomularioProyecto").hide();
                      //$("#TablaDetalleComision tbody").empty();
                      html="";
                      for (var i = 0; i < datos.length; i++){
                          html += "<tr>";
                          html += "<td>"+datos[i]['pro_id'] +"</td>";
                          html += "<td>"+datos[i]['doc_id'] +"</td>";
                          html += "<td>"+datos[i]['comeva_fecha_designacion'] +"</td>";
                          html += "</tr>";
                      }
                      $("#TablaDetalleComision tbody").append(html);
                      
                  }
              });
          }else{
              $.ajax({
                  url: base_url+'comision_proyecto/CargandoProyectos',
                  type:"POST",
                  data:'cargar='+codigo,
                  success: function(respuesta){
                      var datos = eval(respuesta);
                      $("#codproyecto").val(datos[0]['pro_id']);
                      $("#nombre").val(datos[0]['pro_nombre']);
                  }

              });
          }
      },'json');
  }

  //PARA ENVIAR DATOS DEL DOCENTE DEL PROYECTO AL MODAL
  function CargarDocente(codigo){
      $("#proyecto_id_detalle").val(codigo);
      $.ajax({
          url: base_url+'comision_proyecto/CargarPresidente',
          type:"POST",
          data:'cargar='+codigo,
          success: function(data){
              var datos = eval(data);
              
              $("#codproyecto").val(datos[0]['pro_id']);
              $("#nombre").val(datos[0]['pro_nombre']);
          }

      });
  }

  function Asignar(obj){
      if(obj.docente.value==""){
          $('#docente').focus();
          $('#docente').popover('show'); return 0;
      }
      if(obj.cargo.value==""){
          $('#cargo').focus();
          $('#cargo').popover('show'); return 0;
      }

      var existedodecente = false;
      $('input[name^="id_docente"]').each(function() {
          if($('#docente').val() == $(this).val()){
            existedodecente = true;
          }
      });

      var existecargo = false;
      $('input[name^="id_cargo"]').each(function() {
          if($('#cargo').val() == $(this).val()){
            existecargo = true;
          }
      });

      if((existecargo == true) || (existedodecente == true) ){
        alert("el cargo o docente ya estan asignados");
        return 0;
      }
          html ="<tr id='Proyecto_"+$("#pro_id").val()+"'>"+
          "<td> "+$("#nombre").val()+"</td>"+
          "<td><input type='hidden' name='id_docente[]' value='"+$("#docente").val()+"'' > "+$("#docente option:selected").text()+"</td>"+
          "<td><input type='hidden' name='id_cargo[]' value='"+$("#cargo").val()+"'' > "+$("#cargo option:selected").text()+"</td>"+
          "<td><button class='btn btn-primary btn-xs' style='margin-bottom:1px;' onclick=$(this).closest('tr').remove();><span class='icon-remove' style='color:#D01111'></span> </button></td></tr>";

          $("#TablaDetalleComision tbody").append(html);
     
  }

  
 
  var ctx = $("#GraficoReporte");
  var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ["Miguel Valles","Carlos Grandes","Buenaventura Rios","Pamela Granda","Andy Rucoba","Jhon Ruiz","Quique Lopez","Miguel Arias","Janina Cotrina","Jorge Valverde","Juan Carlos","Pedro Gonzales"], 
            datasets: [
                {
                    label: 'Proyectos',
                    data: [30,15,35,9,40,11,8,20,38,6,25,50],
                    backgroundColor: [
                        'rgba(75,192,192,0.4)',

                    ],

                    borderColor: [
                        'rgba(255,99,132,1)',
                    ],

                    borderwidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
      });

  window.onload = function () {

      var chart = new CanvasJS.Chart("chartContainer",
      {
        theme: "theme3",
        animationEnabled: true,
        title:{
          text: "Proyectos y Tesis, 2016",
          fontSize: 16
        },
        toolTip: {
          shared: true
        },      
        axisY: {
          title: "Nro de Proyectos"
        },
        axisY2: {
          title: "Proyectos/Mes"
        },      
        data: [ 
        {
          type: "column", 
          name: "Proyectos de Tesis",
          legendText: "Proyectos de Tesis",
          showInLegend: true, 
          dataPoints:[
              <?php foreach ($ProyectoTesis as $key => $value) {
                echo '{label: "'.$value["pro_semestre"].'"'.', y: '.(int)$value["total"].'},';
              } ?>
          ]
        },
        {
          type: "column", 
          name: "Tesis",
          legendText: "Tesis",
          axisYType: "secondary",
          showInLegend: true,
          dataPoints:[
              <?php foreach ($Tesis as $key => $value) {
                echo '{label: "'.$value["semestre"].'"'.', y: '.(int)$value["total"].'},';
              } ?>
          ]
        }
        
        ],
            legend:{
              cursor:"pointer",
              itemclick: function(e){
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                  e.dataSeries.visible = false;
                }
                else {
                  e.dataSeries.visible = true;
                }
               // chart.render();
              }
            },
          });
    chart.render();
  
    //GRAFICO PROYECTO DOCENTES
    var barra = new CanvasJS.Chart("chartBarra",
    {
      title:{
        text: "Top Proyectos de Tesis",
        fontSize: 16    
      },
      animationEnabled: true,
      axisY: {
        title: "N° Proyectos de Tesis"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      width: 1000,
      theme: "theme2",
      data: [
        {        
          type: "column",  
          //showInLegend: true, 
          //legendMarkerColor: "grey",
          //legendText: "MMbbl = one million barrels",
          dataPoints: [   
            <?php foreach ($DocentesChart as $key => $value) {
              echo '{y: '.(int)$value["total"].', label: "'.$value["doc_nombre"].'"},';
            } ?>   
          ]
        }   
      ]
    });
    barra.render();
    
    //GRAFICO LINEAS D INVESTIGACION
    var circulo = new CanvasJS.Chart("chartCirculo",
    {
      title:{
        text: "Top Lineas de Investigacion, 2016",
        fontSize: 16
      },
      exportFileName: "Pie Chart",
      exportEnabled: true,
      animationEnabled: true,
      legend:{
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      data: [
        {       
            type: "pie",
            //showInLegend: true,
            //toolTipContent: "{linin_descripcion}: <strong>{y}%</strong>",
            //indexLabel: "{linin_descripcion} {y}%",
            dataPoints: [
              <?php foreach ($LinInvesChart as $key => $value) {
                echo '{y: '.(int)$value["total"].', label: "'.$value["linin_descripcion"].'"},';
              } ?>
            ]
        }
      ]
    });
    circulo.render();
  }

  var tablapro = $('#tablaproyecto').DataTable( {
      "processing": true,
      "bJQueryUI": true,
      "sPaginationType": "full_numbers",
      "sDom": '<""l>t<"F"fp>',
      "bPaginate": true,
      "bLengthChange": true,
      "bFilter": true,
      "bSort": true,
      "bInfo": true,
      "bAutoWidth": false,
      "oLanguage" :{
          'sProcessing':     'Cargando...',
          'sLengthMenu':     'Mostrar _MENU_ registros',
          'sZeroRecords':    'No se encontraron resultados',
          'sEmptyTable':     'Ningún dato disponible en esta tabla',
          'sInfo':           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
          'sInfoEmpty':      'Mostrando registros del 0 al 0 de un total de 0 registros',
          'sInfoFiltered':   '(filtrado de un total de _MAX_ registros)',
          'sInfoPostFix':    '',
          'sSearch':         'Buscar : ',
          'sUrl':            '',
          'sInfoThousands':  '',
          'sLoadingRecords': 'Cargando...',
          'oPaginate': {
              'sFirst':    'Primero',
              'sLast':     'Último',
              'sNext':     'Siguiente',
              'sPrevious': 'Anterior'
          },
          'oAria': {
              'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
              'sSortDescending': ': Activar para ordenar la columna de manera descendente'
          }
      },
      "columnDefs": [
                  {
                      "targets": [ 2 ],
                      "visible": true
                  }],
      'aaSorting': [[ 0, 'asc' ]],//ordenar
      'iDisplayLength': 10,
      'aLengthMenu': [[5, 10, 20], [5, 10, 20]]
  });
</script>

<style type="text/css">
    .modal {
        width: 1140px;
        left: 28%;
    }/*
    .modal {
        width: 900px;
        left: 38%;
    }*/
    .text_detail {
        padding: 0px 10px;
    } 
    
   .modal.fade.in {
        top: 5%;
    } 
    .modal-footer {
        padding: 13px 15px 15px;
        height: 100px:;
    }
    .widget-box {
        margin-top: 5px;
        margin-bottom: 10px;
    }

    .form-horizontal .controls {
        padding: 8px 0;
    }

         .caja{
            margin: auto;
            max-width: 250px;
            padding: 20px;
            border: 1px solid #BDBDBD;
        }
        .caja select{
            width: 100%;
            font-size: 16px;
            padding: 5px;
        }
        .resultados{
            margin: auto;
            margin-top: 40px;
            width: 1000px;
        }
}
</style>
