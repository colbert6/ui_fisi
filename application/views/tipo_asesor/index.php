
  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Tipo Asesor</center></h1>
  </div>

  <div class="container-fluid" style="z-index: 1001;">
      <hr style="margin:0px">

      <div class="row-fluid">

        <div class="span12">

          <div class="widget-box">

            <div class="widget-title" id="tabs" >
              <ul class="nav nav-tabs">
                <li  class="active"><a data-toggle="tab" href="#tab1">Lista</a></li>
                <li><a data-toggle="tab" href="#tab2" id="tabRegistrar">Registrar</a></li>
              </ul>
            </div>

            <div class="widget-content tab-content">


            <!--- TABLA -->
              <div id="tab1" class="tab-pane active">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Lista de Tipos de Asesor Registrados</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" id="tab">
                      <thead>
                        <tr>
                          <th>Nro</th>
                          <th>Descripción</th>
                          <th>Acciones</th>                          
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            <!--- FIN DE TABLA -->  

            <!--- FORMULARIO -->

              <div id="tab2" class="tab-pane"> 
                <div class="span12" align="center">
                  <div class="widget-box">
                    <form class="form-horizontal" id="form-TipoAsesor" action="#" class="j-forms" novalidate>
                      <div class="widget-title"> <span class="icon"> <i class="icon-tag"></i> </span>
                        <h5>Tipo de Asesor</h5>
                      </div>

                      
                      <div class="controls-row">
                        <div class="span5">
                            <label class="control-label">ID:</label>
                            <div class="controls">
                              <input type="text" class="span11" name="id" id="id" readonly="" />
                            </div>
                          </div>
                          <div class="span6">
                            <label class="control-label">Descripción :</label>
                            <div class="controls">
                              <input type="text" class="span12" placeholder="Ingrese Descripción" name="descripcion" id="descripcion" />
                            </div>
                          </div>
                      </div>

                      <br>

                      <div class="form-actions">
                          <button type="button" class="btn btn-success"  id="Guarda"><span class="icon-refresh" aria-hidden="true"></span>Guardar</button>

                          <button class="btn btn-danger" onclick="Cancelar();"><span class="icon-refresh" aria-hidden="true"></span> Cancelar </button>

                      </div>

                    </form>  
                  </div>

                </div> 

              </div>

          <!---FIN DE FORMULARIO -->

            </div>

          </div>           
        </div>        
      </div>
  </div>

<script src="<?= base_url();?>application/views/tipo_asesor/run_table.js" type="text/javascript"></script>  



<style type="text/css">
  .modal {
    width: 950px;
    left: 38%;

  }

  .text_detail {
    padding: 7px 10px;
  }  
</style>
