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
<div id="content" style="padding: 0px 13px;">
  <div id="content-header" style="margin-top: -20px;">
    <h1><center>Nuevo Proyecto de Tesis</center></h1>
  </div>
  <div class="container-fluid" style="z-index: 1001;">
      <div class="row-fluid">

        <div class="span12">
          <div class="widget-box">

            <div class="widget-title" >
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Información</a></li>
                <li><a data-toggle="tab" href="#tab2" id="ir_form">Requisitos</a></li>
              </ul>
            </div>

            <div class="widget-content tab-content">
              <div id="tab1" class="tab-pane active">
                <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
                  <div class="control-group">
                    <div class="span6">
                      <div class="control">
                        <label class="control-label">Facultad</label>
                        <div class="controls">
                          <input type="text" id="reg_fac" >
                        </div>                   
                      </div>
                    </div> 
                    <div class="span6">
                      <div class="control">
                        <label class="control-label label-a" >Escuela </label>
                        <div class="controls control-a">
                          <input type="text" id="reg_esc">
                        </div>                   
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Alumno</label>
                    <div class="controls">
                      <input type="text" id="reg_alu" class="span7 m-wrap">
                    </div>
                  </div>                

                  <div class="control-group">
                    <label class="control-label">Linea de Investigacion :</label>
                    <div class="controls">
                      <select id="controls" class="span7">
                          <?php for($i=0;$i<count($linea_inv);$i++){ //Aca va la lista de los modulos padres ?> 
                            <option value="<?php echo $linea_inv[$i]['linin_id'];?>"><?php echo $linea_inv[$i]['linin_descripcion']?></option>
                          <?php } ?>                     
                      </select>
                    </div>
                  </div>
                   <div class="control-group">
                    <label class="control-label">Tipo Proyecto :</label>
                    <div class="controls">
                      <select  class="span7">
                          <?php for($i=0;$i<count($tipo_pro);$i++){ //Aca va la lista de los modulos padres ?> 
                            <option value="<?php echo $tipo_pro[$i]['tipro_id'];?>"><?php echo $tipo_pro[$i]['tipro_descripcion']?></option>
                          <?php } ?>                     
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Ciclo Academico</label>
                    <div class="controls">
                      <input type="text" id="reg_cic" class="span3 m-wrap">
                    </div>
                  </div>
                  
                  <div class="form-actions">
                    <input type="submit" value="Validate" class="btn btn-success">
                  </div>
                </form>
                              

              </div>
              <div id="tab2" class="tab-pane"> 
                
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Requisitos para Proyecto de Tesis</h5>
                  </div>
                  <div class="widget-content">
                    <table class="table table-bordered data-table" id="tab">
                      <thead>
                        <tr>
                          <th>Item</th>
                          <th>Descripcion</th>
                          <th>Estado</th>                    
                          <th>Accion</th>                       
                        </tr>
                      </thead>

                      <tbody>
                        <?php for($i=0;$i<count($requisitos);$i++){ //Aca va la lista de los modulos padres ?> 
                              <option value="<?php// echo $escuela[$i]['esc_id'];?>"><?php //echo $escuela[$i]['esc_descripcion']?></option>
                              <tr>
                                <td><?php echo ($i+1); ?></td>
                                <td><?php echo $requisitos[$i]['descripcion']; ?></td>
                                <td class="falta-req"></td>
                                <td class="subir-req"></td>
                              </tr>
                        <?php } ?>  
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

