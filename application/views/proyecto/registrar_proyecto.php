
<style type="text/css">
  .label-a{
    width: 100px !important;
  }
  .control-a{
    width: 100px !important;
  }
  .control-a{
    margin-left:110px !important;
  }
</style>

<div id="content-header" style="margin-top: -20px;">
  <h1><center>Formulario de Proyecto de Tesis</center></h1>
</div>

<div class="container-fluid" style="z-index: 1001;">
<hr style="margin:0px">

    <div class="row-fluid">

      <div class="span12">
        <div class="widget-box">

          <div class="widget-title" >
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1">Información</a></li>
              <li><a data-toggle="tab" href="#tab2" id="tabRequisitos">Requisitos</a></li>
            </ul>
          </div>

          <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">

              <form class="form-horizontal" method="post" action="#" id="form-RegProyecto" novalidate="novalidate">
                
                <div class="control-group">
                  <label class="control-label">Id del Proyecto</label>
                  <div class="controls">
                    <input type="text" readonly="" name="proyecto_id" class="span7 m-wrap" value="0">
                  </div>
                </div> 

                <div class="control-group">
                  <label class="control-label">Responsable</label>
                  <div class="controls">
                    <input type="hidden" name="responsable" value="<?php echo $this->session->userdata('id'); ?>">
                    <input type="hidden" name="tipo_responsable" value="<?php echo $this->session->userdata('id_tipo'); ?>">
                    <input type="text" readonly="" class="span7 m-wrap" value="<?php echo $this->session->userdata('nombre');  ?>">
                  </div>
                </div>                

                <div class="control-group">
                  <label class="control-label">*Eje Tematico :</label>
                  <div class="controls">
                    <select id="eje" name="eje" class="span6" onchange="Mostrar_Lineas(this);">
                         <option value="" > Seleccione ...</option>
                        <?php for($i=0;$i<count($eje);$i++){ //Aca va la lista de los modulos padres ?> 
                          <option value="<?php echo $eje[$i]['eje_id'];?>"><?php echo $eje[$i]['eje_descripcion']?></option>
                        <?php } ?>                     
                    </select>
                  </div>

                  <label class="control-label">*Linea de Investigacion :</label>
                  <div class="controls">
                    <select class="span7" id='linea_investigacion' name="linea">
                                         
                    </select>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">*Tipo Proyecto :</label>
                  <div class="controls">
                    <select  class="span5" name="tipo_proyecto" id="tipo_proyecto">
                        <option value="" > Seleccione ...</option>
                        <?php for($i=0;$i<count($tipo_pro);$i++){ //Aca va la lista de los modulos padres ?> 
                          <option value="<?php echo $tipo_pro[$i]['tipro_id'];?>"><?php echo $tipo_pro[$i]['tipro_descripcion']?></option>
                        <?php } ?>                     
                    </select>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Nombre o Descripción</label>
                  <div class="controls">
                    <input type="text" class="span7 m-wrap" name="nombre">
                  </div>
                </div>   

                <div class="control-group">
                  <label class="control-label">Colaboradores</label>
                  
                  <div class="controls">
                    <div>
                      <input type="text" class="span3 m-wrap"  placeholder="Ingrese DNI">
                      <input type="text" readonly="" class="span7 m-wrap" placeholder="Nombre">
                      <button class="btn btn-primary ">Agregar</button>
                    </div>

                  </div>
                  <div class="controls" >
                    <div class="todo span6" id="Lista Colaboradores"></div>
                  </div>

                </div>

                
                
                <div class="control-group">
                  <label class="control-label">*Semestre Academico :</label>
                  <div class="controls">
                    <select  class="span4" name="semestre" id="semestre">
                        <option value="" > Seleccione ...</option>
                        <?php for($i=0;$i<count($semestre);$i++){ //Aca va la lista de los modulos padres ?> 
                          <option value="<?php echo $semestre[$i]['sem_id'];?>"><?php echo $semestre[$i]['sem_descripcion']?></option>
                        <?php } ?>                     
                    </select>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Codigo</label>
                  <div class="controls">
                    <input type="text" readonly="" class="span4 m-wrap" id="codigo" name="codigo">
                  </div>
                </div> 
                
                <div class="form-actions">
                    <button type="button" class="btn btn-success"  id="Guarda"><span class="icon-ok" aria-hidden="true"></span>Guardar</button>

                    <button type="button"  class="btn btn-danger" onclick="loader('proyecto/mis_proyectos');"><span class="icon-refresh" aria-hidden="true"></span> Cancelar </button>

                </div>

              </form>
                            

            </div>

            <div id="tab2" class="tab-pane"> 
              
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                  <h5 id="TipoRequisitos"></h5>
                </div>
                <div class="widget-content">
                  <table class="table table-bordered data-table" id="tab">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>Descripcion</th>
                        <th>Estado</th>  
                        <th>Subir</th>                         
                      </tr>
                    </thead>

                    <tbody id="MostrarRequisitos">
                      
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


<script type="text/template" id="Criterios-Partejs">
  
    <ul>
      <li class="clearfix">

        <input type="hidden" name="colaborador">

        <div class="txt"> 
            Luanch This theme on Themeforest 
            <span class="by label">Nirav</span> 
            <span class="date badge badge-important">Today</span> 
        </div>

        <div class="pull-right">
            <a class="tip" href="#" data-original-title="Delete"><i class="icon-remove"></i></a> 
        </div>
        
      </li>
    </ul>

</script>

<script src="<?= base_url();?>application/views/proyecto/ext/registrar_proyecto.js" type="text/javascript"></script>
