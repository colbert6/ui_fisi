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
                <a href="<?php echo base_url();?>login"><b> Inicio </b></a> &nbsp;  &nbsp;
                <a href="<?php echo base_url();?>login"><b> Volver </b></a> &nbsp;  &nbsp;
                <a data-target="#Login" data-toggle="modal"><i class="icon-lock"></i> <b> Ingresar </b></a> &nbsp;  &nbsp;
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
                    <center><h1>Indicadores a Nivel de Facultades</h1></center> 
                </div>
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span4">
                            <div class="widget-box">
                                <div class="widget-title"><h5>Facultad de Ingenieria de Sistemas e Informatica</h5>
                                </div>
                                <div class="row-fluid">
                                    <div id="FISI" onclick="location.href='<?php echo base_url();?>login/fisi'" style="min-width: 310px; max-width: 200px; height: 300px; margin: 0 auto"></div>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="widget-box">
                                <div class="widget-title"><h5>Facultad de Ciencias Económicas</h5>
                                </div>
                                <div class="row-fluid">
                                    <div id="FCE" onclick="location.href='<?php echo base_url();?>login/ciencias_economicas'" style="min-width: 310px; max-width: 200px; height: 300px; margin: 0 auto"></div>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="widget-box">
                                <div class="widget-title"><h5>Facultad de Ingeniería Civil y Arquitectura</h5>
                                </div>
                                <div class="row-fluid">
                                    <div id="FICA" onclick="location.href='#'" style="min-width: 310px; max-width: 200px; height: 300px; margin: 0 auto"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span4">
                            <div class="widget-box">
                                <div class="widget-title"><h5>Facultad de Ciencias de la Salud</h5>
                                </div>
                                <div class="row-fluid">
                                    <div id="FSC" onclick="location.href='#'" style="min-width: 310px; max-width: 200px; height: 300px; margin: 0 auto"></div>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="widget-box">
                                <div class="widget-title"><h5>Facultad de Ecología</h5>
                                </div>
                                <div class="row-fluid">
                                    <div id="FECOL" onclick="location.href='#'" style="min-width: 310px; max-width: 200px; height: 300px; margin: 0 auto"></div>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="widget-box">
                                <div class="widget-title"><h5>Facultad de Derecho y Ciencias Políticas</h5>
                                </div>
                                <div class="row-fluid">
                                    <div id="FDCP" onclick="location.href='#'" style="min-width: 310px; max-width: 200px; height: 300px; margin: 0 auto"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span4">
                            <div class="widget-box">
                                <div class="widget-title"><h5>Facultad de Medicina Humana</h5>
                                </div>
                                <div class="row-fluid">
                                    <div id="FMH" onclick="location.href='#'" style="min-width: 310px; max-width: 200px; height: 300px; margin: 0 auto"></div>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="widget-box">
                                <div class="widget-title"><h5>Facultad de Ingeniería Agroindustrial</h5>
                                </div>
                                <div class="row-fluid">
                                    <div id="FIAI" onclick="location.href='#'" style="min-width: 310px; max-width: 200px; height: 300px; margin: 0 auto"></div>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="widget-box">
                                <div class="widget-title"><h5>Facultad de Educación y Humanidades</h5>
                                </div>
                                <div class="row-fluid">
                                    <div id="FEH" onclick="location.href='#'" style="min-width: 310px; max-width: 200px; height: 300px; margin: 0 auto"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span4">

                        </div>
                        <div class="span4">
                            <div class="widget-box">
                                <div class="widget-title"><h5>Facultad de Ciencias Agrarias</h5>
                                </div>
                                <div class="row-fluid">
                                    <div id="FCA" onclick="location.href='#'" style="min-width: 310px; max-width: 200px; height: 300px; margin: 0 auto"></div>
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
                <div id="footer" class="span12">Rumbo a la Excelencia &copy; UNSM-T &nbsp; &nbsp; &nbsp;<b>Unidad de Investigacion</b> 
                </div>
            </div>
        </div>
        
        <script src="<?php echo base_url();?>librerias/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>librerias/js/matrix.login.js"></script>
        <script src="<?php echo base_url();?>librerias/highcharts.js"></script>
        <script src="<?php echo base_url();?>librerias/highcharts-more.js"></script>
        <script src="<?php echo base_url();?>application/views/login/facultades/facultades.js"></script>
    
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
            .container-fluid .row-fluid:first-child {
                margin-top: 0px; 
            }

        </style>
        
    </body>
</html>
