<div id="content" style="padding: 0px 13px;">
  <div id="content-header" style="margin-top: -20px;">
    <h1><center> Docentes </center></h1>
  </div>
  <div class="container-fluid" style="z-index: 1001;">
      <hr style="margin:0px">
      <div class="row-fluid">

        <div class="span12">
          <div class="widget-box">

            <div class="widget-title" >
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Lista</a></li>
                <li><a data-toggle="tab" href="#tab2" id="ir_form">Formulario</a></li>
              </ul>
            </div>

            <div class="widget-content tab-content">
              <div id="tab1" class="tab-pane active">

                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Docentes Registrados</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" id="tabladocente">
                      <thead>
                        <tr>
                          <th>Nro</th>
                          <th>Nombre</th>                    
                          <th>Grado Académico</th>
                          <th>Categoría Docente</th>
                          <th>Departamento</th>
                          <th>Dedicación Docente</th>
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

                <div class="span6">
                  <div class="widget-box">
                      <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
                        <h5>Informacion Personal</h5>
                      </div>
                      <div class="widget-content nopadding">
                        <form action="#" method="get" class="form-horizontal">
                          <div class="control-group">
                            <label class="control-label">Codigo :</label>
                            <div class="controls">
                              <input type="text" class="span11" placeholder="Enter codigo" id="text_1" />
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">Apellido Paterno :</label>
                            <div class="controls">
                              <input type="text" class="span11" placeholder="Apellido Paterno" id="text_2" />
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">Apellido Materno :</label>
                            <div class="controls">
                              <input type="text" class="span11" placeholder="Apellido Materno" id="text_3" />
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">Nombre(s) :</label>
                            <div class="controls">
                              <input type="text" class="span11" placeholder="Nombre(s)" id="text_4"/>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">DNI :</label>
                            <div class="controls">
                              <input type="text"  class="span11" placeholder="Enter DNI" id="text_5" />
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">Sexo :</label>
                            <div class="controls">
                              <label>
                                <input type="radio" name="radio_1"/>Masculino</label>
                              <label>
                                <input type="radio" name="radio_1"/>Femenino</label>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">Fecha Nacimiento :</label>
                            <div class="controls">
                              <input type="date"  class="span11" placeholder="fecha nacimiento" id="date_1"/>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">Departamento :</label>
                            <div class="controls">
                              <select id="select_1">
                                <option value=""></option>
                                <option value="010101">CHACHAPOYAS</option>
                                <option value="010102">ASUNCION</option>
                                <option value="010103">BALSAS</option>
                                <option value="010104">CHETO</option>                        
                              </select>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">Estado Civil :</label>
                            <div class="controls">
                              <label>
                                <input type="radio" name="radio_2"/>Soltero</label>
                              <label>
                                <input type="radio" name="radio_2"/>Casado</label>
                            </div>
                          </div>
                          
                        </form>
                      </div>
                  </div>
                  <button class="btn btn-success ">GUARDAR</button>
                  <button class="btn btn-danger">CANCELAR</button>
                </div> <!-- FIN de Fomulario de Informacion Personal -->

                <div class="span5"><!-- Fomulario de Contacto -->
                  <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-tag"></i> </span>
                      <h5>Información Adicional</h5>
                    </div>
                    <div class="widget-content nopadding">
                      <form action="#" class="form-horizontal">
                        <div class="control-group">
                          <label class="control-label">Foto :</label>
                          <div class="controls">
                            <input type="file" />
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">Escuela :</label>
                          <div class="controls">
                            <select id="select_2">
                                <?php for($i=0;$i<count($escuela);$i++){ //Aca va la lista de los modulos padres ?> 
                                        <option value="<?php echo $escuela[$i]['esc_id'];?>"><?php echo $escuela[$i]['esc_descripcion']?></option>
                                    
                                <?php } ?>                     
                            </select>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">Grado Academico :</label>
                          <div class="controls">
                            <select id="select_3">
                                <?php for($i=0;$i<count($grado_academico);$i++){ //Aca va la lista de los modulos padres ?> 
                                        <option value="<?php echo $grado_academico[$i]['grac_id'];?>"><?php echo $grado_academico[$i]['grac_descripcion']?></option>
                                    
                                <?php } ?>                        
                            </select>
                          </div>
                        </div>
                        <div class="control-group">
                          <label for="normal" class="control-label">Telefono Fijo :</label>
                          <div class="controls">
                            <input type="text" id="mask-phone" class="span8 mask text" id="text_6">
                            <span class="help-block blue span8">(999) 999-999</span> </div>
                        </div>
                        <div class="control-group">
                          <label for="normal" class="control-label">Telefono Movil :</label>
                          <div class="controls">
                            <input type="text" id="mask-phoneExt" class="span8 mask text" id="text_7">
                            <span class="help-block blue span8">999-999-999</span> </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Correo :</label>
                            <div class="controls">
                              <input type="text"  class="span11" placeholder="Correo" id="text_8" />
                            </div>
                          </div>
                      </form>
                    </div>
                  </div>
                </div><!-- FIN de Fomulario de contacto -->

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

<!-- MODAL  -->

  <div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-hidden="true" >
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title"><i class="fa fa-users"></i> Detalle de Alumno</h4>
              </div>
              <form role="form" action="" method="post">
                  <div class="modal-body">
                    <div class="span4">
                      <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-repeat"></i></span>
                          <h5>Informacion Personal</h5>
                        </div>
                        <div class="widget-content nopadding">
                          <ul class="activity-list">
                            <li class="text_detail"><i class="icon-file"></i> <strong>Codigo : </strong><span id="codigo"> </span> </li>
                            <li class="text_detail"><i class="icon-user"></i> <strong>Nombre : </strong><span id="nombre"></span> </li>
                            <li class="text_detail"><i class="icon-credit-card"></i> <strong>DNI : </strong><span id="dni"> </span> </li>
                            <li class="text_detail"><i class="icon-info-sign"></i> <strong>Sexo : </strong><span id="sexo"></span> </li>
                            <li class="text_detail"><i class="icon-calendar"></i> <strong>Fecha Nac. : </strong><span  id="fec_nac"> </span> </li>
                            <li class="text_detail"><i class="icon-map-marker"></i> <strong>Ubigeo : </strong><span id="ubigeo"></span> </li>
                            <li class="text_detail"><i class="icon-heart"></i> <strong>Estado Civil : </strong><span  id="est_civil"> </span> </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="span4">
                      <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-repeat"></i></span>
                          <h5>Informacion Adicional</h5>
                        </div>
                        <div class="widget-content nopadding">
                          <ul class="activity-list">
                            <li class="text_detail"><i class="icon-camera"></i> <strong>Foto : </strong><span id="codigo"> </span> </li>
                            <li class="text_detail"><i class="icon-group"></i> <strong>Escuela : </strong><span id="nombre"></span> </li>
                            <li class="text_detail"><i class="icon-credit-card"></i> <strong>Grado Academico : </strong><span id="dni"> </span> </li>
                            <li class="text_detail"><i class="icon-phone-sign"></i> <strong>Fijo : </strong><span id="sexo"></span> </li>
                            <li class="text_detail"><i class="icon-phone"></i> <strong>Movil : </strong><span  id="fec_nac"> </span> </li>
                            <li class="text_detail"><i class="icon-envelope"></i> <strong>Correo : </strong><span id="ubigeo"></span> </li>
                          </ul>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer clearfix">
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                      <button type="button" id='submit_form' class="btn btn-primary pull-left"><i class="fa fa-check"></i> Guardar</button>
                  </div>
              </form>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->                
