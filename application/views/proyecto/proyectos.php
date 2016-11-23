<div id="content" style="padding: 0px 13px;">
  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Proyectos de la FISI</center></h1>
  </div>
  <div class="container-fluid" style="z-index: 1001;">
      <hr style="margin:5px">
      <div class="row-fluid">

        <div class="span12">     

          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Proyectos Registrados</h5>
            </div>
            <div class="widget-content nopadding">

              <table class="table table-bordered data-table" id="tab">
                <thead>
                  <tr>
                    <th>Cod</th>
                    <th>Escuela</th>
                    <th>Alumno</th>
                    <th>Titulo</th>                    
                    <th>Fecha</th>
                    <th>Tipo</th>
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

<!-- MODAL  -->
<style type="text/css">
  .modal  {
    width: 1180px;
    left: 30%;
  }
  .modal-body {
    height: 435px;
    max-height: 600px;
  }
  .modal.fade.in {
    top: 6%;
  }
  td.neg {   font-weight: bold;}
  td.data-proyecto {  width: 70%; }
</style>

<div class="modal fade" id="modal_detail" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detalle del Proyecto</h4>
      </div>
      <div class="modal-body"> 
        <div class="span11">
          <div class="widget-content">

              <table class="table table-bordered table-striped">     
                <thead>
                  <tr>
                    <th colspan="2">Información del Proyecto</th>
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