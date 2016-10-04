<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Unidad de Investigación FISI</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/matrix-login.css" />
        <link href="<?php echo base_url();?>librerias/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

        <script type="text/javascript">
            function Validar(obj){
                if(obj.nombre.value==""){
                    $('#nombre').focus();
                    alert("Ingrese Nombre Usuario"); return 0;
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
        <div id="loginbox">            
            <form method="POST" class="form-vertical" action="<?php echo base_url();?>login/ingresar"      id="loginadmin">
				 <div class="control-group normal_text"> <h3><img src="<?php echo base_url();?>img/logofisi.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" name="nombre" id="nombre" placeholder="Usuario" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="contra" id="contra" placeholder="Contraseña" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <center>
                        <button type="button" class="btn btn-success" onclick="Validar(this.form);">
                            <span class="pull-top" aria-hidden="true"></span> Aceptar
                        </button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger">
                            <span class="pull-top" aria-hidden="true"></span> Cancelar
                        </button>
                    </center>
                </div>
    
            </form>
        </div>
        
        <script src="<?php echo base_url();?>librerias/js/jquery.min.js"></script>  
        <script src="<?php echo base_url();?>librerias/js/matrix.login.js"></script> 
    </body>

</html>
