<?php
	class linea_investigacion_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function MostrarLineaInvestigacion(){
            $sql="SELECT *
                FROM linea_investigacion 
                INNER JOIN eje_tematico ON eje_tematico.eje_id = linea_investigacion.eje_id";
            $query=$this->db->query($sql);
            return $query;
        }

		function Select_eje($eje){
        	$sql="SELECT *
                FROM linea_investigacion INNER JOIN eje_tematico ON eje_tematico.eje_id = linea_investigacion.eje_id 
                WHERE eje_tematico.eje_id=".$eje;
            $query=$this->db->query($sql);
            return $query;  
        }
	}
?>

