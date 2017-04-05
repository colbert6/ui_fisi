<?php 

	class tipo_proyecto_model extends CI_Model{
		function __construct(){
			parent::__construct(); 
			$this->load->database('default'); 
		}

		function MostrarTipoProyecto(){
            $sql="SELECT * FROM tipo_proyecto";
            $query=$this->db->query($sql);
            return $query;
        }

	}
?>