
  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Alumnos</center></h1>
  </div>

  <div class="container-fluid" style="z-index: 1001;">
      <hr style="margin:0px">
      <div class="row-fluid">

        <div class="span12">
          <div class="widget-box">

            <div class="widget-title" >
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Tabla</a></li>                
              </ul>
            </div>

            <div class="widget-content tab-content">
              <div id="tab1" class="tab-pane active">
                <p>*Se muestran solo alumnos Matriculados en el ciclo actual</p>

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
                          <th colspan="1">Acciones</th>                          
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


<script src="<?= base_url();?>application/views/alumno/run_table.js" type="text/javascript"></script>

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
