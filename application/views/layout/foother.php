        <div class="row-fluid">
          <div id="footer" class="span12"> 
              FISI - Facultad Lider &copy; UNSM-T &nbsp; &nbsp; &nbsp;<b>Unidad de Investigacion</b> 
          </div>
        </div>

         
        <!--script src="<?php echo base_url();?>librerias/js/jquery.ui.custom.js"></script--> 
        <script src="<?php echo base_url();?>librerias/js/bootstrap.min.js"></script>

        <!--script src="<?php echo base_url();?>librerias/js/jquery.flot.min.js"></script--> 
        <!--script src="<?php echo base_url();?>librerias/js/jquery.flot.pie.min.js"></script--> 
             
        <!--script src="<?php echo base_url();?>librerias/js/matrix.popover.js"></script-->
        <!--script src="<?php echo base_url();?>librerias/js/jquery.uniform.js"></script-->
        <!--script src="<?php echo base_url();?>librerias/js/select2.min.js"></script-->
        <!--script src="<?php echo base_url();?>librerias/js/matrix.js"></script-->
        <!--script src="<?php echo base_url();?>librerias/js/matrix.tables.js"></script--> 
        <script src="<?php echo base_url();?>librerias/js/jquery.gritter.min.js"></script><!--Utilizo para alertas-->

        <script type="text/javascript">
            function loader(url){
               $("#content").load(base_url+url);
            }

            function alerta(texto){    
                var unique_id = $.gritter.add({
                    // (string | mandatory) the heading of the notification
                    title: 'Notification',
                    // (string | mandatory) the text inside the notification
                    text: texto,
                    class_name: 'my-sticky-class'
                });

                setTimeout(function(){
                    $.gritter.remove(unique_id, {
                        fade: true,
                        speed: 'slow'
                    });
                }, 3000)

                return false;
                   
            }

        </script>

               

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
