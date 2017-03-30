<?php
	class linea_investigacion_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function MostrarLineas(){
			$this->db->select('linea_investigacion.linin_id, linea_investigacion.linin_descripcion, eje_tematico.eje_descripcion');
			$this->db->from('linea_investigacion');
			$this->db->join('eje_tematico', 'eje_tematico.eje_id = linea_investigacion.eje_id');
			
			$query = $this->db->get();
			return $query->result();
		}

		function MostrarEje(){
			$query = $this->db->get('eje_tematico');
			return $query->result();
		}

		function mostrar_tabla(){
            $sql="SELECT *
                FROM linea_investigacion INNER JOIN eje_tematico ON eje_tematico.eje_id = linea_investigacion.eje_id";
            $query=$this->db->query($sql);
            return $query;
        }

        function Nuevo(){
        	$this->db->select_max('linin_id');
			$query = $this->db->get('linea_investigacion');
			return $query->result();
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

