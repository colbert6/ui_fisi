<?php
    session_start();
    $CI =& get_instance();
    $CI->load->database('default');
    $id = $_SESSION['codtipousuario'];
    $_SESSION['email'];
    $_SESSION['usuario'];
    $_SESSION['codusuario']
?>
<!DOCTYPE html>
    <head>
        <title>Unidad de Investigacion FISI</title>
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
        <!--link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'-->
        <script src="<?php echo base_url();?>librerias/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>librerias/canvasjs.min.js"></script>
        <script src="<?php echo base_url();?>librerias/Chart-2.3.0.min.js"></script>
        <script src="<?php echo base_url();?>librerias/js/datatables/jquery.dataTables.js"></script>

    </head>

    <body>
            <div id="header">
              <h2>Innóvate <b>FISI</b></h2>
            </div>
            <script>   var base_url="<?= base_url(); ?>";  </script>
            <div id="search">
                <div style="height: 6px;"></div>
                <a href="#"><i class="icon-user user"></i> Bienvenido,<b><?php echo $_SESSION['usuario']; ?></b></a> &nbsp;  &nbsp;
                <a href="#"><i class="icon-ok-circle"></i> Id Tipo Usuario = <b><?php echo $id;?></b></a> &nbsp;  &nbsp;
                <a href="<?php echo base_url();?>login/cerrarsession"><i class=" icon-off"></i> Salir</a> &nbsp;  &nbsp;
            </div>

            <div id="content-header">
                <div id="breadcrumb">
                    <a href="#">
                        <i class="icon-time"></i> Tiempo Restante: 2:19:29 <i class="icon-repeat"></i>
                        <span style="margin-left: 970px;">Innóvate FISI</span>
                    </a>
                </div>
            </div>

        

        
        
