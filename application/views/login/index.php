<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Unidad de Investigación UNSM-T</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/matrix-login.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/uniform.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/matrix-style.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/matrix-media.css" />
        <link href="<?php echo base_url();?>librerias/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/jquery.gritter.css" />
        <script src="<?php echo base_url();?>librerias/js/jquery.min.js"></script>
        
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/portada/master.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/portada/normalize.css" />
        
        <?php
            $username = array('name' => 'username', 'placeholder' => 'Ingrese Usuario');
            $password = array('name' => 'password', 'placeholder' => 'introduce tu password');
            $submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión', 'class' => 'btn btn-success');
        ?>
    </head>

    <body>
        <div class="content">
            <header id="main-header" class="cf">
                <nav id="main-nav" class="cf">
                    
                    <div class="menu-main-menu-container">
                        <ul id="menu-main-menu" class="menu">
                            <li id="menu-item-1648" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1648"><a href="#">Inicio</a></li>
                            <li id="menu-item-3521" class="featured menu-item menu-item-type-custom menu-item-object-custom menu-item-3521"><a data-target="#Login" data-toggle="modal">Ingresar</a></li>
                        </ul>
                    </div>     
                </nav>
            </header>

            <div class="container-fluid"><hr>
                <div>
                    <h2><center>Bienvenido</center></h2>
                </div>
                <div class="row-fluid">
                    <div class="span3">
                    </div>

                    <div class="span6">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-hand-right"></i> </span><h5>Indicadores Generales</h5>
                            </div>
                            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                        </div>

                        <div class="row-fluid">
     
                                <div class="widget-content">
                                    <ul class="quick-actions">
                                        <li class="bg_lb"> <a href="#"> <i class="icon-bar-chart"></i> Indicadores de Investigacion </a> </li>
                                        <li class="bg_lg"> <a href="#"> <i class="icon-bar-chart"></i> Indicadores Cuantitativos </a> </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>  

            <!-- Para Logearse-->
            <div class="modal fade" id="Login" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><center><b> Login Usuario </b></center></h4>                       
                        </div>
                        <center>
                            <div class="row-fliud"><br>
                                <div class="span5">
                                    
                                        <?=form_open('login/new_user')?>    

                                        <form method="POST" class="form-vertical" id="loginadmin">
                                            <div class="control-group normal_text"> <h3><img src="<?php echo base_url();?>librerias/img/logo/ui_unsm.png" alt="Logo" /></h3></div>

                                            <div style="width: 100%;height: 1px; background-color: #D8D8D8;"></div>

                                            <?php 
                                                if($this->session->flashdata('usuario_incorrecto'))
                                                {
                                                    echo '<p>'.$this->session->flashdata('usuario_incorrecto') . '</p>';
                                                }
                                            ?><br>
        
                                            <div class="control-group">
                                                <div class="controls">
                                                    <label class="span1 control-label">Usuario: </label>
                                                    <div class="span3">
                                                        <?=form_input($username)?><p><?=form_error('username')?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <label class="span1 control-label">  Clave: </label>
                                                    <div class="span3">
                                                        <?=form_password($password)?><p><?=form_error('password')?></p>
                                                        <?=form_hidden('token',$token)?>
                                                    </div>
                                                </div>
                                            </div><br><br><br>

                                            <div class="form-actions">
                                                <center>
                                                    <?=form_submit($submit)?>
                                                </center>
                                            </div>
                                        <?=form_close()?>
                                    
                                </div>

                                <div id="AlertaLogin" class="modal hide">
                                    <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                        <h3>Alert modal</h3>
                                    </div>

                                    <div class="modal-body">
                                        <center> <span aria-hidden='true'></span> <b> El Usuario no Existe </b> </center>
                                    </div>

                                    <div class="modal-footer"> <a data-dismiss="modal" class="btn btn-primary" href="#">Confirmar</a></div>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        
        <!--script src="<?php echo base_url();?>librerias/js/jquery.min.js"></script-->
        <script src="<?php echo base_url();?>librerias/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>librerias/js/matrix.login.js"></script>
        <script src="<?php echo base_url();?>librerias/canvasjs.min.js"></script>
        
        

        <script type="text/javascript">
            window.onload = function () {
                var chart = new CanvasJS.Chart("chartContainer",
                {
                    title:{
                        text: "Indicadores Generales UNSM",
                        fontFamily: "arial black"
                    },
                            animationEnabled: true,
                    legend: {
                        verticalAlign: "bottom",
                        horizontalAlign: "center"
                    },
                    theme: "theme1",
                    data: [
                    {        
                        type: "pie",
                        indexLabelFontFamily: "Garamond",       
                        indexLabelFontSize: 20,
                        indexLabelFontWeight: "bold",
                        startAngle:0,
                        indexLabelFontColor: "MistyRose",       
                        indexLabelLineColor: "darkgrey", 
                        indexLabelPlacement: "inside", 
                        toolTipContent: "{name}: {y}%",
                        showInLegend: true,
                        indexLabel: "#percent%", 
                        dataPoints: [
                            {  y: 80, name: "Indicador 1", legendMarkerType: "circle"},
                            {  y: 44, name: "Indicador 2", legendMarkerType: "circle"},
                            {  y: 12, name: "Indicador 3", legendMarkerType: "circle"} 
                        ]
                    }
                    ]
                });
                chart.render();
            }
        </script>

        <style type="text/css">
            #main-header {
                margin-top: 0;
                position: fixed;
            }
            body {
                background: #ffffff;
                height: 500px;
            }
            .widget-box {
                background: none repeat scroll 0 0 #efefef;
            }

            select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input {
                height: 40px;

            }
        </style>
        
    </body>
</html>
