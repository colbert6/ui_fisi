
<div id="content" style="padding: 0px 13px;">
  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Linea de Investigación</center></h1>
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
                    <h5>Lista de Lineas de Investigación Registrada</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" id="tablalineainvestigacion">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Descripción</th>
                          <th>Eje</th>
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
                        <form class="form-horizontal" id="ForLineaInvestigacion">
                          <input type="hidden" id="eje_id" name="eje_id" disabled="" />

                          <div class="control-group span6">
                            <label class="control-label">Descripción :</label>
                            <div class="controls">
                              <input type="text" class="span11" placeholder="Ingrese Descripción" id="linin_descripcion" disabled="" />
                            </div>
                          </div>
                          <div class="control-group span5">
                            <label class="control-label">Eje Tematico :</label>
                            <div class="controls">
                              <select id="linin_eje" disabled="disabled">
                                <option value="linin_eje"> Seleccione Eje... </option>
                                <?php for($i=0;$i<count($eje_tematico);$i++){ //Aca va la lista de los modulos padres ?> 
                                        <option value="<?php echo $eje_tematico[$i]['eje_id'];?>"><?php echo $eje_tematico[$i]['eje_descripcion']?></option>
                                    
                                <?php } ?>
                              </select>
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

  .table th, .table td {
    padding: 5px;

  }

  .table th {
    font-size: 12px; */
  }

</style>
