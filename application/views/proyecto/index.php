<?php
  $partes=$parte;

  function nivel_parte($orden)  {
      $niveles = explode(".", $orden);
      return count($niveles);
  }

?>
<style type="text/css">
  .fix_hgt{ /*Clase de Div = Cuerpo de Secciones */
    height: 410px;
  }
  .observaciones{ /*Clase de Div = Cuerpo de observaciones */
    height: 100px;
  }
  .table_seccion {
    width: 100%;
  }
  .nombre {
    text-align: center;
    font-size: 25px;
    font-weight: bold;
    padding: 20px 0;
  }
  .caratula {
    text-align: center;
  }
  .seccion{
    padding: 20px 5px 20px 5px;
    font-weight: bold;
    font-size: 17px;
  }
  .sub_seccion{
    padding-top: 10px;
    font-size: 12px;
    font-weight: bold;
  }
  .seccion_text{
    padding-top: 10px;
    font-size: 12px;
  }
  .base_documento {
    background: #C0C0C0!important;
    padding: 20px;
  }
  .documento {
    background: white!important;
    padding: 20px;
  }
  table {
    display: table;
    border-collapse: separate;
    border-spacing: 2px;
    border-color: silver;
  }
  .parte_text{
    border-radius: 5px;
    border: 1px solid #DCDCDC;
    padding: 5px;
    height: 40px;
    overflow:auto;
  }
  .modal  {
    width: 1180px;
    left: 30%;
  }
  .modal-body {
    height: 430px;
    max-height: 600px;
  }
  .modal.fade.in {
    top: 6%;
  }
  textarea {
    width: 98%;
  }
  #contenido_modal{
    height: 260px;
    text-align: justify;  
  }

  li{
    line-height: 15px; 
  }
  .widget-content {
     border-bottom: 0px; 
}

 
</style>

<div id="content" style="padding: 0px 13px;">
  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Proyecto</center></h1>
    <input value="1" id="pro_id" type="hidden" >
  </div>
  <div class="container-fluid" style="z-index: 1001;">
      <hr style="margin:0px">
      <div class="row-fluid">
          
        <div class="span12">
          <div class="widget-box ">

            <?php 
            $cant_seccion=count($seccion);  
            if($cant_seccion>1){         //VALIDAR EL FORMATO DE PRESENTACION      ?>  

              <div class="widget-title" >
                <ul class="nav nav-tabs">
                  
                  <li class='active' ><a data-toggle='tab' href='#tab_car'>Caratula</a></li>;
                  <?php  // MOSTRAR LAS SECCIONES DISPONIBLES EN LA CABECERA        
                     for ($i=0; $i <$cant_seccion ; $i++) {                         
                        echo "<li><a data-toggle='tab' href='#tab".$i."'>Sección ".$seccion[$i]['seccion']."</a></li>";
                      }
                  ?>

                </ul>
              </div>

              <div class="widget-content tab-content fix_hgt" name="Cuerpo de Secciones">
                <?php $this->load->view('proyecto/caratula.php'); ?>
                
                <?php                
                   // MOSTRAR LAS SECCIONES DISPONIBLES EN EL CUERPO                        
                    for ($i=0; $i <$cant_seccion ; $i++) { 
                      
                        echo "<div id='tab".$i."' class='tab-pane '> ";
                        $dato_seccion= array ( 'sec_nombre'=>$seccion[$i]['seccion'] );
                        $this->load->view('proyecto/seccion.php',$dato_seccion);
                        echo "</div>";
                        
                    }
                ?>
              

            <?php } else { //ERROR AL CARGAR EL FORMATO DE PRESENTACION?> 

                <div class="widget-title" >
                  <span class="icon"> <i class="icon-align-justify"></i> </span>
                  <h5>ERROR EN EL FORMATO DE PRESENTACIÓN  </h5>               
                </div>
                <div class="widget-content tab-content">
                  <p>-Es posible, que no se ha creado un formato para este tipo de proyecto.<br>
                    -El Formato de Presentacion, presenta errores de distribucion.
                  </p>                 

            <?php }  ?>

                </div>
              </div>                
                  
          </div>    
        </div>          
    </div>
    
    <div class="span9"> 80% Proyecto <!--Barra de Progreso-->
      <div class="progress progress-danger progress-striped " >
        <div style="width: 80%;" class="bar"></div>
      </div>                  
    </div>
    <div class="span2" style="padding-top: 10px; margin-left: 30px;">
      <button class="btn btn-success" id="subir_proyecto">Subir Proyecto</button>
    </div>


<!-- MODAL  -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="row-fluid">
          <div class="span9">
            <div class="widget-box" id="contenido_modal"></div>
            <div id="id_alert" class="alert alert-info">
              <button class="close" data-dismiss="alert">×</button>
              <p id='informacion_parte'></p> 
            </div>

          </div>
          <div class="span3" >
            <div class="widget-box" id="tabla_criterio_modal">              
            </div>
          </div>
        </div>       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="guardar_cambio">Guardar Cambios</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    


