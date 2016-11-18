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
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/fullcalendar.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/matrix-style.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/matrix-media.css" />
        <link href="<?php echo base_url();?>librerias/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/jquery.gritter.css" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

        <script type="text/javascript">
            function Validar(obj){
                if(obj.email.value==""){
                    $('#email').focus();
                    alert("Ingrese su Email"); return 0;
                }
                if(obj.contra.value==""){
                    $('#contra').focus();
                    alert("Ingrese Contraseña de Usuario"); return 0;
                }
                obj.submit();
            }
        </script>
    </head>

    <body>
        <script src="<?php echo base_url();?>Librerias/Validaciones.js"></script>
        <center>
            <div class="row-fliud"><br><br><br><br><br>
                <h2>Bienvenido</h2>
                <div class="span4"></div>
                <div class="span5">
                    <div class="widget-box">
                        <form method="POST" class="form-vertical" action="<?php echo base_url();?>login/ingresar"      id="loginadmin">
                            <div class="control-group normal_text"> <h3><img src="<?php echo base_url();?>img/logofisi.png" alt="Logo" /></h3></div>
                            <div style="width: 100%;height: 1px; background-color: #D8D8D8;"></div>
                            <br><br>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="span1 control-label">Usuario: </label>
                                    <div class="span3">
                                        <input type="text" name="email" id="email" placeholder="Ingrese Email" maxlength="50" />
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <label class="span1 control-label">  Clave: </label>
                                    <div class="span3">
                                        <input type="password" name="contra" id="contra" placeholder="Ingrese Contraseña" maxlength="20"/>
                                    </div>
                                </div>
                            </div><br><br><br><br>

                            <div class="form-actions">
                                <center>
                                    <button type="button" class="btn btn-success" onclick="Validar(this.form);">
                                        <span class="pull-top" aria-hidden="true"></span> Iniciar Sesión
                                    </button>
                                </center>
                            </div>
                        </form>
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
        </center>

        <script src="<?php echo base_url();?>librerias/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>librerias/js/matrix.login.js"></script>
    </body>

</html>
