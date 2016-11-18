<div id="content" style="padding: 0px 13px;">
  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Mis Proyectos</center></h1>
  </div>
  <div class="container-fluid" style="z-index: 1001;">
      <hr style="margin:5px">
      <div class="row-fluid">

        <div class="span12">     

          <a href="<?php echo base_url();?>proyecto/registrar_proyecto" type="button" class="btn btn-primary" id="guardar_cambio">Nuevo Proyecto</a>

          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Proyectos Registrados</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table" id="tab">
                <thead>
                  <tr>
                    <th>Cod</th>
                    <th>Titulo</th>
                    <th>Fecha</th>
                    <th colspan="3">Acciones</th>                          
                  </tr>
                </thead>

                <tbody>
                </tbody>

              </table>
            </div>
          </div>           

      </div>
    </div>