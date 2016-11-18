<div id="content" style="padding: 0px 13px;">
  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Nuevo Proyecto de Tesis</center></h1>
  </div>
  <div class="container-fluid" style="z-index: 1001;">
      <hr style="margin:0px">
      <div class="row-fluid">

        <div class="span12">
          <div class="widget-box">

            <div class="widget-title" >
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Información</a></li>
                <li><a data-toggle="tab" href="#tab2" id="ir_form">Requisitos</a></li>
              </ul>
            </div>

            <div class="widget-content tab-content">
              <div id="tab1" class="tab-pane active">
                <p>Información</p>
                <div class="widget-content nopadding">
                  <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    <div class="control-group">
                      <label class="control-label">Codigo</label>
                      <div class="controls">
                        <input type="text" value="PRO1ALU12016">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Linea de Investigacion :</label>
                      <div class="controls">
                        <select id="controls">
                            <?php for($i=0;$i<4/*count($escuela)*/;$i++){ //Aca va la lista de los modulos padres ?> 
                                    <option value="<?php// echo $escuela[$i]['esc_id'];?>"><?php //echo $escuela[$i]['esc_descripcion']?></option>
                                
                            <?php } ?>                     
                        </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Email</label>
                      <div class="controls">
                        <input type="text" name="email" id="email">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Hoy</label>
                      <div class="controls">
                        <input type="text" name="date" id="date" >
                      </div>
                    </div>
                    
                    <div class="form-actions">
                      <input type="submit" value="Validate" class="btn btn-success">
                    </div>
                  </form>
                </div>               

              </div>
              <div id="tab2" class="tab-pane"> 
                
                <p>Tabla</p>

                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Alumnos Registrados</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" id="tab">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Codigo</th>
                          <th>Nombre</th>                    
                          <th>Escuela</th>
                          <th>Correo</th>
                          <th>Movil</th>
                          <th colspan="2">Acciones</th>                          
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
        </div>        

      </div>
    </div>

