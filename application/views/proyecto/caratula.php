  
  <div id='tab_car' class='tab-pane active'> <!--Caratula-->
    <div class="base_documento">
      <div class="documento">
      <table class="table_seccion" name="seccion">
        <tbody>
          <tr>
            <td class='caratula'><h2>UNIVERSIDAD NACIONAL DE SAN MARTIN</h2></td>
          </tr>
          <tr>
            <td class='caratula' ><h3 id="pro_fac"></h3></td>                    
          </tr>
          <tr>
            <td class='caratula'><h5 id="pro_esc"></h5></td>                    
          </tr>
          <tr>
            <td class='caratula'><img src="<?= base_url();?>img/logo_unsm.jpg"> </td>                    
          </tr>
          <tr>
            <td class='caratula seccion'><span>PROYECTO DE TESIS</span>
              <button class='btn btn-success btn-mini' data-original-title='Edit Task' id='editar_parte' 
                info_parte='Ingrese el Nombre del Proyecto' id_parte='pro_nombre' onclick="EditarNombre();" ><i class='icon-pencil' ></i></button>
            </td>                    
          </tr>
          <tr>
            <td class='caratula'><div class='parte_text' id='nombre_proyecto'></div></td>                    
          </tr>
          <tr>
            <td class='caratula seccion'><span>Presentado por el Estudiante</span>              
            </td>                    
          </tr>
          <tr>
            <td class='caratula'><h5 id="pro_alu" ></h5>
            </td>                    
          </tr>
          <tr>
            <td class='caratula seccion'><span>Asesor:</span> 
            </td>                    
          </tr>
          <tr>
            <td class='caratula'><h5><div class='parte_text ' id='asesor_proyecto' ></div></h5>
            </td>                    
          </tr>
          <tr>
            <td class='caratula'><h4 id="pro_lugar">Tarapoto -Perú</h4>
            </td>                    
          </tr>
          <tr>
            <td class='caratula' ><h4 id="pro_fecha"></h4>
            </td>                    
          </tr>
    
        </tbody>
      </table>
      </div>
    </div>
  </div> <!--FIN Caratula-->