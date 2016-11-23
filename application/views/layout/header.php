<?php
    
    $tipo_usu = $this->session->userdata('tipo');
    $correo_usu= $this->session->userdata('correo');  
    $cod_usu =$this->session->userdata('id');
    $nombre_usu =$this->session->userdata('nombre');
    $facultad =$this->session->userdata('facultad');
    $escuela =$this->session->userdata('escuela');
    $fac_abreviatura =$this->session->userdata('fac_abreviatura');
?>

<!DOCTYPE html>
    <head>
        <title>Unidad de Investigacion</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/colorpicker.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/datepicker.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/uniform.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/select2.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/fullcalendar.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/matrix-style.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/matrix-media.css" />
        <link href="<?php echo base_url();?>librerias/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/jquery.gritter.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/bootstrap-wysihtml5.css" />
        <!--link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'-->
        <script src="<?php echo base_url();?>librerias/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>librerias/canvasjs.min.js"></script>
        <script src="<?php echo base_url();?>librerias/Chart-2.3.0.min.js"></script>
        <script src="<?php echo base_url();?>librerias/js/datatables/jquery.dataTables.js"></script>

    </head>

    <body>
            <div id="header">
              <h2>Sist. Reg. Seg. Eva. <b>TESIS</b></h2>
            </div>
            <script>   var base_url="<?= base_url(); ?>";  </script>
            <div id="search">
                <div style="height: 6px;"></div>
                <a href="#"><b><?php echo "Bienvenido, ". $tipo_usu;?>: </b></a> &nbsp;  &nbsp;
                <a href="#"><i class="icon-user user"></i> <b><?php echo  $nombre_usu; ?></b>    </a> &nbsp;&nbsp;&nbsp; &nbsp;                
                <a href="<?php echo base_url();?>login/cerrarsession"><i class=" icon-off"></i> Salir</a> &nbsp;  &nbsp;
            </div>

            <div id="content-header">
                <div id="breadcrumb">
                    <a href="<?= base_url(); ?>uifisi">
                        <i class="icon-book"></i> UNSM - <?php echo  $fac_abreviatura; ?></i>                        
                    </a>
                        
                    <span class="badge badge-important "style="float:right;margin-top:0.7%;"><?php echo  $correo_usu; ?></span>               

                </div>


            </div>
            <input value="<?=$cod_usu?>" id="cod_usu" type="hidden" >


        

        
        
