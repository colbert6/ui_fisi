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
        
        <?php
            $username = array('name' => 'username', 'placeholder' => 'Ingrese Usuario');
            $password = array('name' => 'password', 'placeholder' => 'introduce tu password');
            $submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión', 'class' => 'btn btn-success');
        ?>
    </head>

    <body>
        <div class="content">
            <div id="header">
              <h2>PEMOPI <b> UNSM</b></h2>
            </div>

            <div id="search">
                <div style="height: 6px;"></div>
                <a href="<?php echo base_url();?>login"><b>Inicio</b></a> &nbsp;  &nbsp;
                <a data-target="#Login" data-toggle="modal"><i class="icon-lock"></i> Ingresar </a> &nbsp;  &nbsp;
            </div>

            <!--sidebar-menu-->
                <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
                  <ul>
                    <li class="active"><a href="#"><i class="icon icon-home"></i> <span>Portal</span></a> </li>
                  </ul>
                </div>

            <div id="content-header">
                <div id="breadcrumb">
                    <a href="#"><i class="icon-book"></i> UNSM </></a>
                    <span class="badge badge-important "style="float:right;margin-top:0.7%;"></span>               
                </div>
            </div>
            <div id="content" style="padding: 0px 13px;">
                <div id="content-header" style="margin-top: -20px;">
                    <h1><center>Escuela Academica Profesional de Ingenieria de Sistemas e Informatica</center></h1>
                </div>

                <div class="container-fluid" style="z-index: 1001;">
                    <hr style="margin:0px">
                    <div class="row-fluid">

                        <div class="span12">
                            <div class="widget-box">

                                <div class="widget-title" >
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#tab2" id="tabIndicadores">Indicadores</a></li>              
                                    </ul>
                                </div>

                                <div class="widget-content tab-content">
                                    <div id="tab2" class="tab-pane active">
                                        <div class="span12 pop">
                                            <div class="widget-box">
                                                <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                                                  <h5>Participación de los Docente</h5>
                                                </div>
                                                <div class="widget-content">
                                                  <div id="CanvasDocente" style="height: 350px; width: 100%; "></div>
                                                  
                                                </div>
                                            </div>
                                        </div>  

                                        <div class="row-fluid">
                                            <div class="span6 pop">
                                                <div class="widget-box">
                                                    <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                                                        <h5>Tipos de Proyectos por Semestre</h5>
                                                    </div>
                                                    <div class="widget-content">
                                                        <div id="CanvasTiposProyecto" style="height: 370px; width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </div>   

                                            <div class="span6 pop">
                                                <div class="widget-box">
                                                    <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                                                        <h5>Reportes por Linea de Investigacion</h5>
                                                    </div>
                                                    <div class="widget-content">
                                                        <div id="CanvasLineasInvestigacion" style="height: 370px; width: 100%;"></div>
                                                        
                                                    </div>
                                                </div>
                                            </div>   
                                        </div>  
                                    </div>
                                </div>
                            </div>           
                        </div>        
                    </div>
                </div>
            </div>   
                <!--Para Logearse-->
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
            <div class="row-fluid">
                <div id="footer" class="span12">FISI - Facultad Lider &copy; UNSM-T &nbsp; &nbsp; &nbsp;<b>Unidad de Investigacion</b> 
                </div>
            </div>
        </div>
        
        <script src="<?php echo base_url();?>librerias/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>librerias/js/matrix.login.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>librerias/canvasjs.min.js"></script>
        <script src="<?= base_url();?>application/views/login/facultades/fisi/run_table.js" type="text/javascript"></script>
        
    
        <style type="text/css">
            #main-header {
                margin-top: 0;
                position: fixed;
            }
            body {
                background: #eee;
                height: 500px;
            }
            .widget-box {
                background: none repeat scroll 0 0 #ffffff;
            }
            .container-fluid {
                padding-right: 20px; 
                padding-left: 0px;
            }
            .container-fluid .row-fluid:first-child {
                margin-top: 0px; 
            }
        </style>
        
    </body>
</html>