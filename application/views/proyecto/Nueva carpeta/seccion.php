
<div class="base_documento">
  <div class="documento">

    <table class="table_seccion" name="seccion">
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
            echo "<span>".$parte[$j]['nompar_descripcion']." </span>";

            if(!in_array($parte[$j]['nompar_id'], array_column($parte, 'parent_nompar_id'))){//No es padre de ninguna parte
              $info=$parte[$j]['nompar_informacion']; 
              $id=$parte[$j]['nompar_id']; 
            echo "<a class='btn btn-success btn-mini' data-original-title='Edit Task' id='editar_parte'".
                  "info_parte='".$info."'  id_parte='".$id."'  ><i class='icon-pencil'></i></a>"; 
            //------------------
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td class='seccion_text'>";
            echo "<div class='parte_text ' id='parte_".$id."_text' id_parte='".$id."' par_id='0' ></div>"; 
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

