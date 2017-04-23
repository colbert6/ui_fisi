<?php
  function nivel_parte($orden)  {
      $niveles = explode(".", $orden); 
      return count($niveles); // (si orden=1.1.1 => return 3 ) (si orden=1.1 => return 2 )
  }

?>
<link rel="stylesheet" href="<?php echo base_url();?>application/views/proyecto/ext/proyectoss.css" />

  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Formato del Proyecto</center></h1>
    <input value="<?php echo $pro_id ?>" id="pro_id" type="hidden" >
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
                  
                  <li class=active ><a data-toggle=tab href=#tab_car>Caratula</a></li>;

                  <?php  // MOSTRAR LAS SECCIONES DISPONIBLES EN LA CABECERA        
                     for ($i=0; $i <$cant_seccion ; $i++) {                         
                        echo "<li><a data-toggle=tab href=#tab".$i.">Sección ".$seccion[$i]['seccion']."</a></li>";
                      }
                  ?>

                </ul>
              </div>

              <div class="widget-content tab-content fix_hgt" name="Cuerpo de Secciones">

                <?php $this->load->view('proyecto/caratula.php'); ?> <!-- Cargar La caratula  -->
                
                <?php                
                   // MOSTRAR LAS SECCIONES DISPONIBLES EN EL CUERPO                        
                    for ($i=0; $i <$cant_seccion ; $i++) { 
                      
                        echo "<div id=tab".$i." class=tab-pane > ";
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

    <div class="span2" style="padding-top: 10px; margin-left: 30px;" id="prueba">
      <button class="btn btn-success" id="subir_proyecto">Subir Proyecto</button>
    </div>

   



<script type="text/template" id="Criterios-Partejs">
    <div class="widget-title"> <span class='icon'> <i class='icon-th'></i> </span>
        <h5>Instrumento Evaluación </h5>
    </div>

    <div class='widget-content nopadding'>
        <table class='table table-bordered table-striped'>
            <thead>
              <tr>
                <th>Indicadores</th>
                <th>Escalera<br>(min - max)</th>
              </tr>
            </thead>

            <tbody>
                <% _.each(data, function(f,h){  %>

                  <tr class=''>
                    <td>
                    <a title='Criterio <%= f.crit_id%>' id='example4' data-content='<%= f.crit_descripcion %>'
                      data-placement='left' data-toggle='popover' class='btn btn-success'  
                      data-original-title='<%= f.crit_id %>'>Criterio <%= f.crit_id%> </a>                         
                    </td>
                    <td><%= f.cri_rango_min %> - <%= f.cri_rango_max %></td>              
                  </tr>

                <% }) %>               

            </tbody>
        </table>
    </div>
</script>

<!-- MODAL PARA EL NOMBRE DEL PROYECTO -->
<div class="modal fade" id="Modal-EditNombre"  tabindex="-1" role="dialog">
  
    <div class="modal-dialog" role="document">

        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"></h4>
          </div>

          <div class="modal-body">
            <form  id="form-EditNombre" action="#" class="j-forms" novalidate>
                <input type="hidden" value="<?php echo $pro_id ?>" name="pro_id">
                <input type="hidden" id="nompar" name="nompar" value="NombreProyecto">
                <div class="row-fluid">
                  
                    <div class="widget-title"> <span class="icon"> <i class="icon-tag"></i> </span>
                      <h5>Editar Nombre del Proyecto</h5>
                    </div>

                      
                    <div class="controls-row">
                      <br>
                      <label class="control-label">Nombre del Proyecto :</label>
                        <div class="span11">
                          
                          <div class="controls">
                            <textarea class="span11 nombre" placeholder="Ingrese Nombre" name="nombrePro" id="nombrePro" ></textarea>
                          </div>
                        </div>
                    </div>

                </div> 
            </form>      

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="guardar_nombre">Guardar Cambios</button>
          </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->    


<!-- MODAL PARA EL ASESOR -->
<div class="modal fade" id="Modal-EditAsesor"  tabindex="-1" role="dialog">
  
    <div class="modal-dialog" role="document">

        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"></h4>
          </div>

          <div class="modal-body">
            <form  id="form-EditAsesor" action="#" class="j-forms" novalidate>
                <input type="hidden" value="<?php echo $pro_id ?>" name="pro_id">
                <input type="hidden" id="nompar" name="nompar" value="NombreProyecto">
                <div class="row-fluid">
                  
                    <div class="widget-title"> <span class="icon"> <i class="icon-tag"></i> </span>
                      <h5>Editar Asesor del Proyecto</h5>
                    </div>

                      
                    <div class="controls-row">
                      <br>
                       <div class="span11">
                       
                            <div class="control-group">
                                <label class="control-label">Seleccione Docente  :</label>
                                <div class="controls">
                                  <select id="sel_asesor" name="sel_asesor" class="span7">
                                       <option value="" > Seleccione ...</option>           
                                  </select>
                                </div>
                            </div>
                          
                        </div>
                    </div>

                </div> 
            </form>      

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="guardar_nombre">Guardar Cambios</button>
          </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->    



<!-- MODAL PARA EL NOMBRE DEL PROYECTO -->
<div class="modal fade" id="Modal-Parte" tabindex="-1" role="dialog">
  
    <div class="modal-dialog" role="document">

        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"></h4>
          </div>

          <div class="modal-body">
            <form  id="form-EditParte" action="#" class="j-forms" novalidate>
                <input type="hidden" value="<?php echo $pro_id ?>" name="pro_id">
                <input type="hidden" id="par_id" name="par_id">
                <input type="hidden" id="nompar_id" name="nompar_id">
                <div class="row-fluid">
                  
                  <div class="span9">

                    <div id="Editor_Texto" class="widget-box" ></div>

                    <div id="id_alert" class="alert alert-info">
                      <button class="close" data-dismiss="alert">×</button>
                      <p id=informacion_parte></p> 
                    </div> 

                  </div>

                  <div class="span3" >
                    <div class="widget-box" id="Criterios-Parte"></div>
                  </div>

                </div> 
            </form>      

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="guardar_parte">Guardar Cambios</button>
          </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->    


<script src="<?= base_url();?>application/views/proyecto/ext/elaborar.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>librerias/js/underscore-min.js"></script>
<script src="<?php echo base_url();?>librerias/js/matrix.popover.js"></script>

