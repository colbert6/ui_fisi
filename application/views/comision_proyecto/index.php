
  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Proyectos de Investigación en la Facultad</center></h1>
  </div>

  <div class="container-fluid" style="z-index: 1001;">
      <hr style="margin:0px">
      <div class="row-fluid">

        <div class="span12">
          <div class="widget-box">

            <div class="widget-title" >
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Registros</a></li> 
                <li ><a data-toggle="tab" href="#tab2" id="tabIndicadores">Indicadores</a></li>              
              </ul>
            </div>

            <div class="widget-content tab-content">

              <div id="tab1" class="tab-pane active">

                  <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                      <h5>Proyectos Registrados</h5>
                    </div>
                    <div class="widget-content nopadding">
                      <table class="table table-bordered data-table" id="tab">
                        <thead>
                          <tr>
                            <th>Nro</th>
                            <th>Responsable</th>
                            <th>Nombre de Proyecto</th>
                            <th>Tipo</th>
                            <th>Fecha Registro</th>
                            <th colspan="4" style="width: 85px">Jurado</th>                          
                          </tr>
                        </thead>

                        <tbody>
                        </tbody>

                      </table>
                    </div>
                  </div>

                  <div class="row-fluid">
                      <div class="span12">
                          <center>
                              <a  class="btn btn-info btn-mini">PT</a><b> Proyecto de Tesis </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <a  class="btn btn-primary btn-mini">T</a><b> Tesis </b>
                          </center>
                      </div>
                  </div>

              </div>

              <div id="tab2" class="tab-pane">
                 <div class="span12 pop">
                      <div class="widget-box">
                          <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                              <h5>Participación de los Docente</h5>
                          </div>
                          <div class="widget-content">
                              <div id="CanvasDocente" style="height: 350px; width: 100%; "></div>
                              
                          </div>
                      </div>
                </div>  

                <div class="row-fluid">
                    <div class="span6 pop">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                                <h5>Tipos de Proyectos por Semestre</h5>
                            </div>
                            <div class="widget-content">
                                <div id="CanvasTiposProyecto" style="height: 370px; width: 100%;"></div>
                            </div>
                        </div>
                    </div>   

                    <div class="span6 pop">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                                <h5>Reportes por Linea de Investigacion</h5>
                            </div>
                            <div class="widget-content">
                                <div id="CanvasLineasInvestigacion" style="height: 370px; width: 100%;"></div>
                                
                            </div>
                        </div>
                    </div>   
                </div>  

              </div>

              
            </div>


          </div>           
        </div>        

      </div>
    </div>

<script type="text/javascript" src="<?php echo base_url();?>librerias/canvasjs.min.js"></script>
<script src="<?= base_url();?>application/views/comision_proyecto/run_table.js" type="text/javascript"></script>

<style type="text/css">
  .modal {
    width: 950px;
    left: 38%;

  }
  #AsignarComision {
    width: 1150px;
    left: 30%;

  }
  #ModalJURADO {
    width: 1150px;
    left: 30%;

  }
  .text_detail {
    padding: 7px 10px;
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

</style>

<!-- MODAL  -->

<!-- MODAL COMISION PROYECTO -->
  <div class="modal fade" id="AsignarComision" tabindex="-1" role="dialog" >
      <div class="modal-dialog">
          <div class="modal-content">

              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center>
                    <h3 class="modal-title"><i class="fa fa-users"></i> Asignar Comision Evaluadora o Jurado </h3>
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
                                <input type="text" id="ACnombrePro" disabled="" class="span12">
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
                              <!--div class="controls span2">
                                  &nbsp;
                                  <button class="btn btn-warning btn-xs" style="margin-bottom:1px;" data-toggle="modal" data-target="#Grafico"><span class="icon-plus-sign"></span> Ver </button>
                              </div-->
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

                  </div>  
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary" id="guardar_nombre">Guardar Cambios</button>
              </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->   



  <!-- MODAL  -->

 <div class="modal fade" id="ModalJurado"  tabindex="-1" role="dialog">
  
    <div class="modal-dialog" role="document">

        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">MIEMBROS DEL JURADO</h4>
          </div>

          <div class="modal-body">
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

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="guardar_nombre">Guardar Cambios</button>
          </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->    
