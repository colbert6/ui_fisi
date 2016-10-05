        <div class="row-fluid">
          <div id="footer" class="span12"> 
              Innóvate FISI &copy; UNSM-T &nbsp; &nbsp; &nbsp;<b>Unidad de Investigacion</b> 
          </div>
        </div>

        <script src="<?php echo base_url();?>librerias/js/jquery.min.js"></script> 
        <script src="<?php echo base_url();?>librerias/js/jquery.ui.custom.js"></script> 
        <script src="<?php echo base_url();?>librerias/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>librerias/js/bootstrap-colorpicker.js"></script> 
        <script src="<?php echo base_url();?>librerias/js/bootstrap-datepicker.js"></script>  
        <script src="<?php echo base_url();?>librerias/js/masked.js"></script>
        <script src="<?php echo base_url();?>librerias/js/jquery.uniform.js"></script>
        <script src="<?php echo base_url();?>librerias/js/select2.min.js"></script>
        <script src="<?php echo base_url();?>librerias/js/matrix.js"></script>
        <script src="<?php echo base_url();?>librerias/js/matrix.tables.js"></script> 
        <script src="<?php echo base_url();?>librerias/js/matrix.form_common.js"></script> 
        <script src="<?php echo base_url();?>librerias/js/wysihtml5-0.3.0.js"></script> 
        <script src="<?php echo base_url();?>librerias/js/jquery.peity.min.js"></script> 
        <script src="<?php echo base_url();?>librerias/js/bootstrap-wysihtml5.js"></script> 
        <?php
            if(isset ($add_table) && $add_table=='si'){    
        ?>    
           <!--link href="<?= base_url(); ?>librerias/css/datatables/jquery.dataTables.css" rel="stylesheet" type="text/css" /--> 
           <!--script src="<?= base_url(); ?>librerias/js/jquery.dataTables.min.js" type="text/javascript"></script-->
           <script src="<?= base_url(); ?>librerias/js/datatables/jquery.dataTables.js" type="text/javascript"></script>
           <!--script src="<?= base_url(); ?>librerias/js/datatables/dataTables.buttons.min.js" type="text/javascript"></script-->

           <script src="<?= base_url(); ?>application/views/<?= $this->uri-> segment(1);?>/run_table.js" type="text/javascript"></script>
           
        <?php
            }
        ?>
        
        
    </body>

