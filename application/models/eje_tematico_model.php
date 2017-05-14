<?php
	class eje_tematico_model extends CI_Model{
		function __construct(){
			parent::__construct();
            $this->load->database('default');   
		}

		function MostrarEjeTematico(){
            $sql="SELECT *
                FROM eje_tematico INNER JOIN facultad ON facultad.fac_id = eje_tematico.fac_id";
            $query=$this->db->query($sql);
            return $query;
        }

        function Select($facultad){
        	$sql="SELECT *
                FROM eje_tematico INNER JOIN facultad ON facultad.fac_id = eje_tematico.fac_id 
                WHERE facultad.fac_id='".$facultad."'";
            $query=$this->db->query($sql);
            return $query;  
        }

        
	}
?>

