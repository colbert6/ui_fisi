<?php
	class login_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function loguear($user,$clave){
			$this->db->where('alu_usuario',$user);
			$this->db->where('alu_clave',$clave);
			$this->db->from('alumno');
			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>