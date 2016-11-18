<div id="content" style="padding: 0px 13px;">
  <div id="content-header" style="margin-top: -20px;">
    <h1><center> Reporte Proyectos </center></h1>
  </div>
  <div class="container-fluid" style="z-index: 1001;">
      <hr style="margin:0px">
      <div class="row-fluid">

        <div class="span12">
          <div class="widget-box">
            <div class="widget-content tab-content">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5> Proyectos Registrados </h5>
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
                          <!--?php 
                            foreach ($Proyectos as $value): ?>SS
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
                                <td><center> <?php echo $value->pro_fecha_registro; ?></center></td>
                                  <td> 
                                      <button class="btn btn-warning btn-xs" style="margin-bottom:1px;" href="#AsignarComision" data-toggle="modal" id="AgregarComision" onclick="CargarProyecto(<?php echo $value->pro_id; ?>)"><span class="icon-plus-sign"></span></button>
                                  </td>

                                  <td>
                                    <button class="btn btn-success btn-xs" style="margin-bottom:1px;" href="#" data-toggle="modal"></button>
                                    <button class="btn btn-success btn-xs" style="margin-bottom:1px;" href="#" data-toggle="modal"></button>
                                    <button class="btn btn-success btn-xs" style="margin-bottom:1px;" href="#" data-toggle="modal"></button>
                                    </a>
                                  </td>
                              </tr>
                            <?php endforeach 
                          ?> -->
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>           
        </div>        
      </div>
  </div>

<div id="Alerta" class="modal hide">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>
            <center> <div id="Mensaje"></div> </center>
        </h3>
    </div>
    <div class="modal-body" align="center">
        <a data-dismiss="modal" class="btn btn-primary" onclick="Actualizar();">Aceptar</a>
    </div>
</div>


<style type="text/css">
  .modal {
    width: 950px;
    left: 38%;

  }

  .text_detail {
    padding: 7px 10px;
  }  
</style>
