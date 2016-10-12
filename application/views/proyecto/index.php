<?php
  $partes=$parte;

  function nivel_parte($orden)  {
      $niveles = explode(".", $orden);
      return count($niveles);
  }

?>
<style type="text/css">
  .fix_hgt{
    height: 370px;
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

              <div class="widget-content tab-content  fix_hgt">

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

              </div>




            <?php } else { //ERROR AL CARGAR EL FORMATO DE PRESENTACION?> 

                <div class="widget-title" >
                  <span class="icon"> <i class="icon-align-justify"></i> </span>
                  <h5>ERROR EN EL FORMATO DE PRESENTACIÓN  </h5>               
                </div>
                <div class="widget-content tab-content">
                  <p>-Es posible, que no se ha creado un formato para este tipo de proyecto.<br>
                    -El Formato de Presentacion, presenta errores de distribucion.
                  </p> 
                </div> 

            <?php }  ?>


          </div>  

                  
        </div>        

      </div>
    </div>

