<style type="text/css">
  body{
    font-family: 'Open Sans', sans-serif;
    color: #666;
  }
  .word{
    margin: 0px 0px 0px 0px;
  }
  .base_documento {
    background: #C0C0C0!important;
    padding: 30px;
  }
  .documento {
    background: white!important;
    padding: 30px;
  }
  .caratula{
    text-align: center;
    margin: 20px 0px 30px 0px;
  }
  .seccion{
    margin: 20px 5px 10px 25px;
    font-weight: bold;
    font-size: 17px;
  }
  .sub_seccion{
    margin-left: 40px;
    margin-top: 10px;
    font-size: 12px;
    font-weight: bold;
  }
  .sub_sub_seccion{
    margin-left: 50px;
    margin-top: 10px;
    font-size: 12px;
    font-weight: bold;
  }
  .parte_text{
    margin-right: 50px;
    text-align: justify;  
  }
</style>

<?php

 
  $partes=$parte;
  function nivel_parte($orden)  {
      $niveles = explode(".", $orden);
      return count($niveles);
  }

?>

<html>
<head>
<script>   var base_url="<?= base_url(); ?>";  </script>
     <input value="1" id="pro_id" type="hidden" >
<script src="<?php echo base_url();?>librerias/js/jquery-1.12.3.min.js"></script> 
<script src="<?php echo base_url();?>librerias/js/jquery.min.js"></script> 

<script type="text/javascript">


function buscar_datos_proyecto(){
  var pro_id=$('#pro_id').val();  
    $.post(base_url+"proyecto/buscar_proyecto",{pro_id:pro_id},function(datos){//Buscar datos del proyecto
        var obj = JSON.parse(datos);
        if(obj.length){
          $('#parte_pro_nombre_text').html(obj["0"].pro_nombre);
        }
        
    });
  }

  function buscar_asesor_proyecto(){
  var pro_id=$('#pro_id').val();  
    $.post(base_url+"proyecto/buscar_asesor",{pro_id:pro_id},function(datos){
        var obj = JSON.parse(datos);
        if(obj.length){
          $('#parte_asesor_text').html(obj["0"].nombre);
        }
    });    
  }

  function buscar_parte_proyecto(){
    var pro_id=$('#pro_id').val();  
    $.post(base_url+"proyecto/buscar_parte",{pro_id:pro_id},function(datos){
        var obj = JSON.parse(datos);
        if(obj.length){
          for (var i = 0; i < obj.length; i++) {
            $('#parte_'+obj[i].nompar_id+'_text').html(obj[i].par_contenido);
          }
        }
    });    
  }

  buscar_datos_proyecto();
  buscar_asesor_proyecto();
  buscar_parte_proyecto();
</script>
<!--meta http-equiv="Refresh" content="10 ; URL=<?php echo base_url();?>application/views/proyecto/header_word.php"-->
</head>

  <body>
      

    <div class="container-fluid word" style="z-index: 1001;">
      <div class="row-fluid">
        
          <div class="widget-box ">           
            <div class="widget-content tab-content" name="Cuerpo">

               <!--CARATULA-->
                <div class="base_documento">
                  <div class="documento caratula">
                    <h2>UNIVERSIDAD NACIONAL DE SAN MARTIN</h2>
                    <h2>FACULTAD DE INGENIERIA DE SISTEMAS E INFORMATICA</h2>
                    <h4>ESCUELA ACADEMICO PROFESIONAL DE INGENIERIA DE SISTEMAS E INFORMATICA</h4>                    
                    <img src="<?= base_url();?>img/logo_unsm.jpg">  
                    <br>            
                    <span>PROYECTO DE TESIS</span>
                    <div class='parte_pro_nombre_text'></div>   
                    <br>                  
                    <span>Presentado por el Estudiante</span>              
                    <h4>COLBERT MOISES BRYAN CALAMPA TANTACHUCO</h4>
                    <span>Asesor:</span> 
                    <h4><div class='parte_asesor_text'></div></h4>
                    <h3>Tarapoto -Perú</h3>
                    <h3>2016</h3>      
                    <br> <br><br> <br>    
                  </div>
                </div>
              
              <!--FIN CARATULA-->

            <!--SECCION-->
              <?php 
                $cant_seccion=count($seccion);  
                           
                // MOSTRAR LAS SECCIONES DISPONIBLES EN EL CUERPO                        
                for ($i=0; $i <$cant_seccion ; $i++) { 
                  $sec_nombre=$seccion[$i]['seccion'] ;
              ?>   
                  <div class="base_documento">
                    <div class="documento">                
                          
                      <?php 
                        for ($j=0; $j <count($parte) ; $j++) { 
                          if($parte[$j]['nompar_seccion']==$sec_nombre){                              
                          
                            if(nivel_parte($parte[$j]['nompar_orden'])==1){ //Para Determinar el nivel, la funcion esta en el index
                              $class="seccion";
                            }else if(nivel_parte($parte[$j]['nompar_orden'])==2){
                              $class="sub_seccion";
                            }else {
                              $class="sub_sub_seccion";
                            }                        
                                                   
                            echo "<div class='$class' >".$parte[$j]['nompar_descripcion']." </div>";

                            if(!in_array($parte[$j]['nompar_id'], array_column($parte, 'parent_nompar_id'))){//No es padre de ninguna parte
                              
                              $id=$parte[$j]['nompar_id'];                             
                              echo "<div class='$class parte_text' id='parte_".$id."_text' ></div>"; 
                            }

                          }
                        }// FIN FOR

                      ?>            
                          
                    </div>
                  </div>

              <?php
                      
                      
                }
              ?>
            <!--FIN SECCION-->    

             
            </div>
          </div>                          
         
      </div>          
    </div>
  

  </body>
</html>

