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
    font-size: 12px;
    font-weight: bold;
  }
  .seccion_text{
    padding-top: 10px;
    font-size: 12px;
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
  .parte_text{
    border-radius: 5px;
    border: 1px solid #DCDCDC;
    padding: 5px;
    height: 30px;
    overflow:auto;
  }

</style>



<div class="base_documento">
  <div class="documento">

    <table class="table_seccion" name="seccion_A">
      <tbody>
        <tr>
          <td class="nombre" id="prue">
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

            if(!in_array($parte[$j]['nompar_id'], array_column($parte, 'parent_nompar_id'))){//No es padre de ninguna parte
              $info=$parte[$j]['nompar_informacion']; 
              $id=$parte[$j]['nompar_id']; 
            echo "<a class='btn btn-danger btn-mini' data-original-title='Edit Task' id='editar_parte'".
                  "info_parte='".$info."'  id_parte='".$id."'  ><i class='icon-pencil'></i></a>"; 
            //------------------
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td class='seccion_text'>";
            echo "<div class='parte_text ' id='parte_".$id."_text'></div>"; 
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

