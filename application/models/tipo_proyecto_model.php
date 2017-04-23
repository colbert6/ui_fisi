<?php 

	class tipo_proyecto_model extends CI_Model{
		function __construct(){
			parent::__construct(); 
		}

		function MostrarTipoProyecto(){
            $sql="SELECT * FROM tipo_proyecto WHERE parent_tipro_id=0";
            $query=$this->db->query($sql);
            return $query;
        }

    	function Nuevo(){
			$this->db->select_max('tipro_id');
			$query = $this->db->get('tipo_proyecto');
			return $query->result();
		}

		function InsertarTP($cod,$descrip){
			$data = array(
               'tipro_id' => $cod,
               'tipro_descripcion' => $descrip
            );
			$this->db->insert('tipo_proyecto', $data);
		}
	}
?>