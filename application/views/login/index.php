<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Unidad de Investigación FISI</title>
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

       
    </head>
    <?php
        $username = array('name' => 'username', 'placeholder' => 'Ingrese Usuario');
        $password = array('name' => 'password', 'placeholder' => 'introduce tu password');
        $submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión', 'class' => 'btn btn-success');
    ?>

    <body>
        <center>
            <div class="row-fliud"><br><br><br><br><br>
                <h2>Bienvenido</h2>
                <div class="span4"></div>
                <div class="span5">
                    <div class="widget-box">
                        <?=form_open(base_url().'login/new_user')?>

                        <form method="POST" class="form-vertical" action="<?php echo base_url();?>login/ingresar"      id="loginadmin">
                            <div class="control-group normal_text"> <h3><img src="<?php echo base_url();?>librerias/img/logo/ui_unsm.png" alt="Logo" /></h3></div>

                            <div style="width: 100%;height: 1px; background-color: #D8D8D8;"></div>

                            <?php 
                             if($this->session->flashdata('usuario_incorrecto'))
                             {
                                echo '<p>'.$this->session->flashdata('usuario_incorrecto') . '</p>';
                             }
                            
                            ?>
                            
                            <br><br>


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
                            </div><br><br><br><br>

                            <div class="form-actions">
                                <center>
                                    <?=form_submit($submit)?>
                                </center>
                            </div>
                        <?=form_close()?>
                    </div>
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
        </center-->

        

           

        <script src="<?php echo base_url();?>librerias/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>librerias/js/matrix.login.js"></script>
    </body>

</html>
