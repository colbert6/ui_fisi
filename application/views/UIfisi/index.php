<?php    
    $logo_fac =$this->session->userdata('logo_facultad');
?>
        <div id="content" style="padding: 0px 13px;">
            <div id="content-header" style="margin-top: -20px;">
                <center><h1>Bienvenido</h1></center> 
            </div>
            <div class="container-fluid">
                <hr>
                <div class="row-fluid">
                    <div class="span12">
                        <center>
                            <h4>Sistema de registro, control y evaluacion de TESIS</h4>
                            <img src="<?= base_url();?>librerias/img/logo/unsm.jpg" class="logo-universidad ">
                            <img src='<?php  echo base_url()."librerias/img/logo/".$logo_fac; ?>' class="logo-facultad">
                        </center>
                    </div>
                </div>
            </div>
        </div>