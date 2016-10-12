<style type="text/css">
  .table_seccion {
    width: 100%;
  }
  .nombre {
    text-align: center;
    font-size: 25px;
    font-weight: bold;
    padding: 20px 0;
  }
  .seccion{
    padding: 20px 5px 20px 5px;
    font-weight: bold;
    font-size: 17px;
  }
  .sub_seccion{
    padding-top: 10px;
    font-size: 1em;
  }
  .sub_seccion{
    padding-top: 10px;
    font-size: 12px;
    font-weight: bold;
  }
  .sub_seccion{
    padding-top: 10px;
    font-size: 1em;
  }
  .base_documento {
    background: #C0C0C0!important;
    padding: 20px;
  }
  .documento {
    background: white!important;
    padding: 20px;
  }
  input[disabled] {
    width: 95%;
    cursor: default; 
    background-color: #fff; 
  }
  table {
    display: table;
    border-collapse: separate;
    border-spacing: 2px;
    border-color: silver;
  }

</style>



<div class="base_documento">
  <div class="documento">

    <table class="table_seccion" name="seccion_A">
      <tbody>
        <tr>
          <td class="nombre">
            FORMATO DE PROYECTO DE TESIS
          </td>
        </tr>
        <?php 
          for ($j=0; $j <count($parte) ; $j++) { 
            if($parte[$j]['nompar_seccion']==$sec_nombre){ 
                
            
            if(nivel_parte($parte[$j]['nompar_orden'])==1){ //Para Determinar el nivel, la funcion esta en el index
              $class="seccion";
            }else if(nivel_parte($parte[$j]['nompar_orden'])==2){
              $class="sub_seccion";
            }else {
              $class="sub_sub_seccion";
            }
           

            echo "<tr>";
            echo "<td class='".$class."'>";
            echo "<span>".$parte[$j]['nompar_descripcion']."</span>";
            if(!in_array($parte[$j]['nompar_id'], array_column($parte, 'parent_nompar_id'))){
              $info=$parte[$j]['nompar_informacion']; 
            echo "<a class='btn btn-danger btn-mini'  data-original-title='Edit Task' info_parte='".$info."'><i class='icon-pencil'></i></a>"; 
            //------------------
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td class='".$class."'>";
            echo "<input type='text' disabled class'campo_text'>"; 
            }
            echo "</td>";
            echo "</tr>";

            }
          }// FIN FOR


        ?>             
          
           
      </tbody>
    </table>

  </div>
</div>

<style type="text/css">
  .modal {
    width: 950px;
    left: 38%;

  }

 

</style>

<!-- MODAL  -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        
        <div class="alert alert-info">
          <button class="close" data-dismiss="alert">×</button>

          <p id='informacion_parte'></p> 
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    
