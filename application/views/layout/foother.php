        <div class="row-fluid">
          <div id="footer" class="span12"> 
              FISI - Facultad Lider &copy; UNSM-T &nbsp; &nbsp; &nbsp;<b>Unidad de Investigacion</b> 
          </div>
        </div>

         
        <script src="<?php echo base_url();?>librerias/js/jquery.ui.custom.js"></script> 
        <script src="<?php echo base_url();?>librerias/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url();?>librerias/js/jquery.flot.min.js"></script> 
        <script src="<?php echo base_url();?>librerias/js/jquery.flot.pie.min.js"></script> 
         
        <script src="<?php echo base_url();?>librerias/js/bootstrap-colorpicker.js"></script> 
        <script src="<?php echo base_url();?>librerias/js/bootstrap-datepicker.js"></script>  
        <script src="<?php echo base_url();?>librerias/js/masked.js"></script>        
        <script src="<?php echo base_url();?>librerias/js/matrix.popover.js"></script>
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
           <script src="<?= base_url();?>application/views/<?= $this->uri-> segment(1);?>/run_table.js" type="text/javascript"></script>
        <?php
            }
        ?>

        <?php
            if(@count($js)>0){    

              for ($i=0; $i <count($js) ; $i++) { 
                echo "<script src='".base_url()."application/views/".$this->uri-> segment(1)."/ext/".$js[$i].".js' type='text/javascript'></script>";
              }
            }
        ?>

    </body>
</html>
