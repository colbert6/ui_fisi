<?php
    
    $tipo_usu = $this->session->userdata('tipo');
    $id_tipo = $this->session->userdata('id_tipo');
    $correo_usu= $this->session->userdata('correo');  
    $cod_usu =$this->session->userdata('id');
    $nombre_usu =$this->session->userdata('nombre');
    $facultad =$this->session->userdata('facultad');
    $escuela =$this->session->userdata('escuela');
    $fac_abreviatura =$this->session->userdata('fac_abreviatura');
    
    
?>

<!DOCTYPE html>
    <head>
        <title>PEMOPI</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/matrix-style.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/matrix-media.css" />
        <link href="<?php echo base_url();?>librerias/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/jquery.gritter.css" /> <!--Utilizo para alertas-->
        <script src="<?php echo base_url();?>librerias/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>librerias/js/datatables/jquery.dataTables.js"></script>
              
    </head>

    <body>
            <div id="header">
              <h2>PEMOPI <b> UNSM</b></h2>
            </div>
            <script>   
                    var base_url="<?= base_url(); ?>";
                    var cod_usu="<?php echo $cod_usu; ?>";
                    var tipo_usu="<?php echo $id_tipo; ?>";

            </script> <!-- Declaración de Base a Java-->

            <div id="search">
                <div style="height: 6px;"></div>
                <a href="#"><b><?php echo "Bienvenido, ". $tipo_usu;?>: </b></a> &nbsp;  &nbsp;
                <a href="#"><i class="icon-user user"></i> <b><?php echo  $nombre_usu; ?></b>    </a> &nbsp;&nbsp;&nbsp; &nbsp;                
                <a href="<?php echo base_url();?>login/cerrarsession"><i class=" icon-off"></i> Salir</a> &nbsp;  &nbsp;
            </div>

            <div id="content-header">
                <div id="breadcrumb">
                    <a href="<?= base_url(); ?>uifisi">
                        <i class="icon-book"></i> UNSM - <?php echo  $fac_abreviatura; ?></>                   
                    </a>
                        
                    <span class="badge badge-important "style="float:right;margin-top:0.7%;"><?php echo  $correo_usu; ?></span>               
                </div>
            </div>
            <div id="content" style="padding: 0px 13px;">
                <div id="content-header" style="margin-top: -20px;">
                    <center><h1>Bienvenido</h1></center> 
                </div>
                <div class="container-fluid">
                    <hr>
                    <div class="row-fluid">
                        <div class="span12">
                            <center>
                                <h4>Plataforma de Elaboracion y Monitoreo de Proyectos de Investigación</h4>
                                <img src="<?= base_url();?>librerias/img/logo/unsm.jpg" class="logo-universidad ">
                                <img src='<?php  echo base_url()."librerias/img/logo/".$logo_fac; ?>' class="logo-facultad">
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            


        

        
        
