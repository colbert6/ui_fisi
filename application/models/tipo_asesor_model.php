<?php
	class tipo_asesor_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function MostrarTipoAsesor(){
            $sql="SELECT * FROM tipo_asesor";
            $query=$this->db->query($sql);
            return $query;
        }
    }
?>