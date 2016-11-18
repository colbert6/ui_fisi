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
    background: #C0C0C0 !important;
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
    overflow:hidden;
  }
  .modal-body {
    height: 435px;
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
  <!-- <div id="content-header" style="margin-top: -20px;">
      <h1><center>Proyecto</center></h1>
    <input value="<?=$pro_id?>" id="pro_id" type="hidden" >
  </div> -->
  <div class="container-fluid" style="z-index: 1001;">
      <hr style="margin:0px">
      <div class="row-fluid">

        <div class="span12">
          <div class="widget-box ">

            <?php
            $cant_seccion=count($seccion);
            if($cant_seccion>1){         //VALIDAR EL FORMATO DE PRESENTACION      ?>
                <?php $this->load->view('proyecto/caratula.php'); ?>

                <?php
                   // MOSTRAR LAS SECCIONES DISPONIBLES EN EL CUERPO
                    for ($i=0; $i <$cant_seccion ; $i++) {


                        $dato_seccion= array ( 'sec_nombre'=>$seccion[$i]['seccion'] );
                        $this->load->view('proyecto/seccion.php',$dato_seccion);


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



