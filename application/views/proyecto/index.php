<?php
  $partes=$parte;

  function nivel_parte($orden)  {
      $niveles = explode(".", $orden);
      return count($niveles);
  }

?>
<style type="text/css">
  .fix_hgt{ /*Clase de Div = Cuerpo de Secciones */
    height: 310px;
  }
</style>

<div id="content" style="padding: 0px 13px;">
  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Proyecto</center></h1>
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
                  
                  <?php  // MOSTRAR LAS SECCIONES DISPONIBLES EN LA CABECERA        
                    $active="class='active'";                
                      for ($i=0; $i <$cant_seccion ; $i++) { 
                        if($i>=1){ $active="";};
                        echo "<li ".$active."><a data-toggle='tab' href='#tab".$i."'>Sección ".$seccion[$i]['seccion']."</a></li>";
                      }
                  ?>

                </ul>
              </div>

              <div class="widget-content tab-content fix_hgt" name="Cuerpo de Secciones">

                <?php                
                  $active="active";  // MOSTRAR LAS SECCIONES DISPONIBLES EN EL CUERPO                        
                    for ($i=0; $i <$cant_seccion ; $i++) { 
                      if($i>=1){ $active="";}
                        echo "<div id='tab".$i."' class='tab-pane ".$active."'> ";
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
    
    <div class="span9"> 80% Proyecto
      <div class="progress progress-danger progress-striped " >
        <div style="width: 80%;" class="bar"></div>
      </div>                  
    </div>
    <div class="span2" style="padding-top: 10px; margin-left: 30px;">
      <button class="btn btn-success" id="subir_proyecto">Subir Proyecto</button>
    </div>


<style type="text/css">
  .modal {
    width: 950px;
    left: 38%;

  }
  textarea {
    width: 98%;
  }

 

</style>

<!-- MODAL  -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="widget-box" id="RTF_modal">
          
        </div>
        <div class="alert alert-info">
          <button class="close" data-dismiss="alert">×</button>
          <p id='informacion_parte'></p> 
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="guardar_cambio">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    