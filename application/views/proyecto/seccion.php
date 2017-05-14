

<div class="base_documento">
  <div class="documento">

    <table class="table_seccion" name="seccion">
      <tbody>
        <!-- <tr>
          <td class="nombre" id="prue">
            FORMATO DE PROYECTO DE TESIS
          </td>
        </tr> -->
        <?php
        for ($j=0; $j <count($parte) ; $j++) {

            if($parte[$j]['nompar_seccion']==$sec_nombre){

              $class="seccion";
              for ($i=1; $i < nivel_parte($parte[$j]['nompar_orden']) ; $i++) { 
                $class="sub_"+$class; 
              }


              echo "<tr>";
              echo "<td class='".$class."'>";
              echo "<span>".$parte[$j]['nompar_descripcion']." </span>";



              if($parte[$j]['nompar_editable']=='t'){//No es padre de ninguna parte

                $info=$parte[$j]['nompar_informacion'];
                $id=$parte[$j]['nompar_id'];
                echo "<a class='btn btn-success btn-mini edit-parte' data-original-title='Edit Task' ".
                "info_parte='".$info."'  id_parte='".$id."'  ><i class='icon-pencil iconos'></i></a>";
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

