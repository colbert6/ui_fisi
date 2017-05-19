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
              <h5>Mis Proyectos Registrados</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table" id="tab">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Codigo</th>
                    <th style="width: 30%">Titulo</th>
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

<!-- MODAL  -->
<style type="text/css">
  .modal  {
    width: 95%;
    left: 23.5%;
  }
  .modal-body {
    height: 435px;
    max-height: 600px;
  }
  .modal.fade.in {
    top: 6%;
  }
  td.neg {   font-weight: bold;
           width: 40%;}
</style>

<div class="modal fade" id="modal_detail" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detalle del Proyecto</h4>
      </div>
      <div class="modal-body"> 
        <div class="span5">
          <div class="widget-content">

              <table class="table table-bordered table-striped data-proyecto"   >     
                <thead>
                  <tr>
                    <th colspan="2">INFORMACIÓN</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="neg">Escuela</td>                  
                    <td id="esc"></td>
                  </tr>
                  <tr>
                    <td class="neg">Alumno</td>                  
                    <td id="alu"></td>
                  </tr>
                  <tr>
                    <td class="neg">Tipo Proyecto</td>                  
                    <td id="tipro"></td>
                  </tr>
                  <tr>
                    <td class="neg">Linea de Investigación</td>                  
                    <td id="liinv"></td>
                  </tr>
                  <tr>
                    <td class="neg">Codigo Proyecto</td>                  
                    <td id="codpro"></td>
                  </tr>
                  <tr>
                    <td class="neg">Nombre Proyecto</td>                  
                    <td id="nompro"></td>
                  </tr>
                  <tr>
                    <td class="neg">Fecha Registro</td>                  
                    <td id="fecreg"></td>
                  </tr>
                  <tr>
                    <td class="neg">Asesor</td>                  
                    <td id="asesor"></td>
                  </tr>                    
                </tbody>
              </table>
              
          </div>
        </div>

        <div class="span4">
          <div class="widget-content">

              <table class="table table-bordered table-striped data-proyecto"   >     
                <thead>
                  <tr>
                    <th colspan="2">JURADOS</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="neg">PRESIDENTE</td>                  
                    <td id="presidente"> NO DEFINIDO</td>
                  </tr>
                  <tr>
                    <td class="neg">SECRETARIO</td>                  
                    <td id="secretario"> NO DEFINIDO</td>
                  </tr>
                  <tr>
                    <td class="neg">MIEMBRO</td>                  
                    <td id="miembro"> NO DEFINIDO</td>
                  </tr>                
                </tbody>
              </table>
              
          </div>
        </div>

        <div class="span3">
          <div class="widget-content">

              <table class="table table-bordered table-striped data-proyecto"   >     
                <thead>
                  <tr>
                    <th colspan="2">PROGRESO</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="neg">REGISTRO DEL PROYECTO</td>                  
                    <td id="presidente"> 11-05-2017</td>
                  </tr>
                  <tr>
                    <td class="neg">PROYECTO SUBIDO</td>                  
                    <td id="secretario"> 11-05-2017</td>
                  </tr>
                  <tr>
                    <td class="neg">REVISIÓN</td>                  
                    <td id="miembro"> NO DEFINIDO</td>
                  </tr>                
                </tbody>
              </table>
              
          </div>
        </div>
        
      </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    