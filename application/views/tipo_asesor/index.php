<div id="content" style="padding: 0px 13px;">
  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Tipo Asesor</center></h1>
  </div>
  <div class="container-fluid">
      <hr style="margin:0px">
      <div class="row-fluid">
        <div class="span7 center">
          <div class="widget-box">

            <div class="widget-title">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Tabla</a></li>
                <li><a data-toggle="tab" href="#tab2">Formulario</a></li>
              </ul>
            </div>

            <div class="widget-content tab-content">
              <div id="tab1" class="tab-pane active">

                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Lista Tipo Asesor</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" id="tab">
                      <thead>
                        <tr>
                          <th>Id</th>
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
                <div class="span11">
                  <div class="widget-box">
                      <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
                        <h5>Información</h5>
                      </div>
                      <div class="widget-content nopadding">
                        <form action="#" method="get" class="form-horizontal">
                          <div class="control-group">
                            <label class="control-label">Codigo :</label>
                            <div class="controls">
                              <input type="text"  class="span11" placeholder="Enter codigo"  />
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">Descripción :</label>
                            <div class="controls">
                              <input type="text" class="span11" placeholder="Tipo Asesor" />
                            </div>
                          </div> 
                          <div class="form-actions">
                            <center>
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="submit" class="btn btn-danger">Cancelar</button>
                            </center>
                          </div> 
                        </form>
                      </div>
                  </div>
                </div> <!-- FIN de Fomulario de Informacion Personal -->
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

</style>
