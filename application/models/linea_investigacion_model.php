<?php
	class linea_investigacion_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function MostrarLineaInvestigacion(){
			$this->db->select('*');
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
/*
		function InsertarLI($descrip,$eje){
			//Obteniendo nuevo cod cliente
			$this->db->select_max('linin_id');
		    $result= $this->db->get('linea_investigacion')->result_array();
		    $id_linin= $result[0]['linin_id']+1;

			$data = array(
               'linin_id' => $id_linin,
               'linin_descripcion' => $descrip,
               'linin_eje' => $eje
            );
			$this->db->insert('linea_investigacion', $data);
			//printf($data) ;
		}  */
	}
?>

