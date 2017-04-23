<?php 

	class tipo_proyecto_model extends CI_Model{
		function __construct(){
			parent::__construct(); 
			$this->load->database('default'); 
		}

		function MostrarTipoProyecto(){
            $sql="SELECT * FROM tipo_proyecto WHERE parent_tipro_id=0";
            $query=$this->db->query($sql);
            return $query;
        }

	}
?>