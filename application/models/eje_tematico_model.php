<?php
	class eje_tematico_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function MostrarEjeTematico(){
            $sql="SELECT *
                FROM eje_tematico INNER JOIN facultad ON facultad.fac_id = eje_tematico.fac_id";
            $query=$this->db->query($sql);
            return $query;
        }

        function select(){
        	$query = $this->db->get("eje_tematico");
        	return $query; 
        }

        
	}
?>

