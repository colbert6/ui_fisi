<div id="content" style="padding: 0px 13px;">
  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Tipo Asesor</center></h1>
  </div>
  <div class="container-fluid" style="z-index: 1001;">
      <hr style="margin:0px">
      <div class="row-fluid">

        <div class="span12">
          <div class="widget-box">

            <div class="widget-title" >
              <ul class="nav nav-tabs">
                <li  class="active"><a data-toggle="tab" href="#tab1">Lista</a></li>
                <li><a data-toggle="tab" href="#tab2" id="ir_form">Registrar</a></li>
              </ul>
            </div>

            <div class="widget-content tab-content">
              <div id="tab1" class="tab-pane active">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Lista de Tipo de Asesor Registrados</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" id="tablatipoasesor">
                      <thead>
                        <tr>
                          <th>Nro</th>
                          <th>Descripción</th>
                          <th colspan="2">Acciones</th>                          
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div id="tab2" class="tab-pane"> 
                <div class="span12" align="center">
                  <div class="widget-box">
                      <div class="widget-title"> <span class="icon"> <i class="icon-tag"></i> </span>
                        <h5>Información</h5>
                      </div>
                      <div class="widget-content nopadding">
                        <form class="form-horizontal" id="ForTipoAsesor">
                          <div class="control-group span4">
                            <label class="control-label">Nro :</label>
                            <div class="controls">
                              <input type="text" class="span11" name="tipase_id" id="tipase_id" disabled="" />
                            </div>
                          </div>
                          <div class="control-group span6">
                            <label class="control-label">Descripción :</label>
                            <div class="controls">
                              <input type="text" class="span12" placeholder="Ingrese Descripción" name="tipase_descripcion" id="tipase_descripcion" disabled="" />
                            </div>
                          </div><br><br><br>
                        </form>
                      </div><br>
                      <div class="row-fluid">
                          <button class="btn btn-success" id="NuevoBTN" onclick="Nuevo();"><span class="icon-plus" aria-hidden="true"></span> Nuevo </button>
                          <button class="btn btn-primary" id="GuardarBTN" disabled="disabled" onclick="return Guardar(this.form);"><span class="icon-share" aria-hidden="true"></span> Guardar </button>
                          <button class="btn btn-danger" id="CancelarBTN" disabled="disabled" onclick="Cancelar();"><span class="icon-refresh" aria-hidden="true"></span> Cancelar </button>
                      </div><br>
                  </div>
                </div> <!-- FIN de Fomulario de Informacion -->

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
