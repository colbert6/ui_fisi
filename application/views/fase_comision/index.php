<div id="content" style="padding: 0px 13px;">
  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Fase Comision</center></h1>
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
                    <h5>Lista de Fases de Comisión Registrados</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" id="tablafasecomision">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Descripción</th>
                          <th>Plazo</th>
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
                  <div class="widget-box" align="center">
                      <div class="widget-title"> <span class="icon"> <i class="icon-tag"></i> </span>
                        <h5>Información</h5>
                      </div>
                      <div class="widget-content nopadding">
                        <form class="form-horizontal" id="ForFaseComision">
                          <div class="control-group span3" align="left">
                            <label class="control-label">Nro :</label>
                            <div class="controls">
                              <input type="text" class="span12" id="fascom_id" name="fascom_id" disabled="" />
                            </div>
                          </div>
                          <div class="control-group span5" align="left">
                            <label class="control-label">Descripción :</label>
                            <div class="controls">
                              <input type="text" class="span11" id="fascom_descripcion" name="fascom_descripcion" disabled="" placeholder="Ingrese Descripción"/>
                            </div>
                          </div>
                          <div class="control-group span3" align="left">
                            <label class="control-label">Plazo: </label>
                            <div class="controls">
                                <input type="text" class="span12" id="fascom_plazo" name="fascom_plazo" disabled="" placeholder="Nro de Dias" />
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

<style type="text/css">
  .modal {
    width: 950px;
    left: 38%;
  }

  .text_detail {
    padding: 7px 10px;
  } 

  .form-horizontal .control-label {
    padding-top: 15px;
    width: 190px;
  } 

</style>
