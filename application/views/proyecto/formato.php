<?php
    function nivel_parte($orden)  {
      $niveles = explode(".", $orden);
      return count($niveles);
  }

?>
<!--link rel="stylesheet" href="<?php echo base_url();?>librerias/css/bootstrap.min.css" /-->
<link rel="stylesheet" href="<?php echo base_url();?>application/views/proyecto/ext/proyecto.css" />

<div id="content" style="padding: 0px 13px;">
  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Proyecto</center></h1>
    <input value="<?=$pro_id?>" id="pro_id" type="hidden" >
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
              <p id='observaciones_parte'></p> 
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


