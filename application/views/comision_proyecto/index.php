  <script type="text/javascript" src="<?php echo base_url();?>librerias/canvasjs.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>application/views/comision_proyecto/run_table.js"></script>
  <script src="<?php echo base_url();?>librerias/highcharts.js"></script>
  <script src="<?php echo base_url();?>librerias/exporting.js"></script>

  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Seguimiento de los Proyectos Registrados</center></h1>
  </div>

  <div class="container-fluid" style="z-index: 1001;">
      <hr style="margin:0px">

      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title" id="tabs" >
              <ul class="nav nav-tabs">
                <li  class="active"><a data-toggle="tab" href="#tab1">Lista de Proyectos</a></li>
                <li><a data-toggle="tab" href="#tab3" id="tabRegistrar">Estadísticas</a></li>
              </ul>
            </div>

            <div class="widget-content tab-content">
              <!--- TABLA -->
              <div id="tab1" class="tab-pane active">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"> <i class="icon-tag"></i> </span>
                    <h5>Lista de Proyectos Registrados</h5>
                  </div>
                  <div class="widget-content nopadding">
                      <table class="table table-bordered data-table" id="#">
                          <thead>
                              <tr>
                                <th>Nro</th>
                                <th>Alumno</th>
                                <th>Nombre de Proyecto</th>
                                <th>Tipo</th>
                                <th>Fecha Registro</th>
                                <th colspan="4">Jurado</th>                         
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
                                    if ($value->tipro_id == 1) { ?>
                                        <td><center> <img src="<?php echo base_url();?>img/celeste.png"></center></td>
                                      <?php }else 
                                      { ?>
                                        <td><center> <img src="<?php echo base_url();?>img/azul.png"></center></td>
                                      <?php }
                                  ?> 
                                  <td><center> <?php echo $value->pro_fecha_registro; ?></center>
                                  <td> 
                                      <button class="btn btn-warning btn-xs" style="margin-bottom:1px;" href="#AsignarComision" data-toggle="modal" id="AgregarComision" onclick="CargarProyecto(<?php echo $value->pro_id; ?>)"><span class="icon-plus-sign"></span></button>
                                  </td>
                                  <td>
                                      <button class="btn btn-success btn-xs" style="margin-bottom:1px;" href="#">P</button>
                                  </td>
                                  <td>
                                      <button class="btn btn-success btn-xs" style="margin-bottom:1px;" href="#">S</button>
                                  </td>
                                  <td>
                                      <button class="btn btn-success btn-xs" style="margin-bottom:1px;" href="#">M</button>
                                  </td>
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
              <!--- FIN DE TABLA -->  

              <!--- FORMULARIO -->
              <div id="tab3" class="tab-pane">
                <div class="span12"> 
                  <div class="row-fluid">
                      <div class="span12 pop">
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
              </div> 

            <!---FIN DE FORMULARIO -->
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

                    <div class="span11" id="tabladetalle1">
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

                              <tbody id="lista">
                              </tbody>
                            </table>
                          </form>
                        </div>
                      </div>
                    </div> 

                    <div class="span11" id="tabladetalle2">
                      <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                          <h5>Lista de Comisión</h5>
                        </div>
                        <div class="widget-content nopadding">
                          <form id="form_detalle_comisiones">
                            <input type="hidden" id="proyecto_id_detalle" name="proyecto_id">
                            <table class="table table-bordered data-table" id="TablaDetalleComisionAsignada">
                              <thead>
                                <tr>
                                  <th>Proyecto</th>
                                  <th>Docente</th>
                                  <th>Cargo</th>
                                  <th>Fecha Asignación</th>
                                  <th>Fecha Notificación</th>
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

              <div class="modal-footer clearfix">
                  <button type="button" onclick="Cancelar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                  <button type="button" onclick="enviar_detalle_comision()" class="btn btn-primary pull-left" id="BTNGuardar"><i class="fa fa-check"></i> Guardar</button>
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
          <div id="container" style="min-width: 1100px; height: 300px; margin: 0 auto"></div>
      </div>
    </div>
    <div class="modal-footer clearfix">
        <a class="btn btn-primary" id="btnAceptar">Aceptar</a>
    </div>
  </div>
</div> 

<script type="text/javascript">
    $('#btnAceptar').click(function(){
        $('#Grafico').modal('toggle');
    });

    $(function(){
      grafiquito();
    });

  function grafiquito(){
    var chart = new CanvasJS.Chart("chartContainer",
    {
        theme: "theme3",
        animationEnabled: true,
        title:{
          text: "Proyectos y Tesis, 2016",
          fontSize: 14
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
              echo '{y: '.(int)$value["total"].', label: "'.$value["nombre"].'"},';
            } ?>   
          ]
        }   
      ]
    });
    barra.render();
    
    //GRAFICO LINEAS D INVESTIGACION
    var circulo = new CanvasJS.Chart("chartCirculo",
    {
      //title:{
      //  text: "How my time is spent in a week?",
      //  fontFamily: "arial black"
      //}, 
                  animationEnabled: true,
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme1",
      data: [
      {        
        type: "pie",
        indexLabelFontFamily: "Garamond",       
        indexLabelFontSize: 20,
        indexLabelFontWeight: "bold",
        startAngle:0,
        indexLabelFontColor: "MistyRose",       
        indexLabelLineColor: "darkgrey", 
        indexLabelPlacement: "inside", 
        toolTipContent: "{name}: <strong>{y} Proyectos</strong>",
        showInLegend: true,
        //indexLabel: "#percent%", 
        dataPoints: [
          <?php foreach ($LinInvesChart as $key => $value) {
              echo '{y: '.(int)$value["total"].', name: "'.$value["linin_descripcion"]. '", indexLabel: "'.$value["total"].' Proy."},';
          } ?>
        ]
      }
      ]
    });
    circulo.render();
  }

  //GRAFICO MODAL 2 - DOCENTES
  Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Numero de Proyectos por Docente'
    },
    subtitle: {
        text: 'Oficina: <a href="#">Unidad de Investigacion</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Numero de Proyectos'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Proyectos: <b>{point.y:.1f} proyectos</b>'
    },
    series: [{
        name: 'Population',
        data: [
            <?php foreach ($Grafico as $key => $value) {
              echo '['.'"'.$value["nombre"].'"'.','.(int)$value["total"].'],';
            } ?> 
        ],
        /*
        
        */
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
  });

</script>

<style type="text/css">
    .modal {
        width: 1140px;
        left: 28%;
    }
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
