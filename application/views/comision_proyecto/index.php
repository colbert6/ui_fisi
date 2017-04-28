
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
                            <th colspan="4">Jurado</th>                          
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

<script type="text/javascript">

</script>