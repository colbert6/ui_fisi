  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Mis Proyectos</center></h1>
  </div>

  <div class="container-fluid" style="z-index: 1001;">
      <hr style="margin:5px">
      <div class="row-fluid">

        <div class="span12">     

          <button onclick="loader('proyecto/registrar_proyecto');" url="" type="button" class="btn btn-primary">Nuevo Proyecto</button>

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
</div>

<script src="<?= base_url();?>application/views/proyecto/ext/mis_proyectos.js" type="text/javascript"></script>    