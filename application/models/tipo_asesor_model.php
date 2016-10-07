<?php
	class tipo_asesor_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function MostrarTipoAsesor(){
			$query = $this->db->get('tipo_asesor');
			return $query->result();
		}
	}
?>