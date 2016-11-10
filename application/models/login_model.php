<?php
	class login_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function logueardocente($user,$clave){
			$this->db->where('doc_correo',$user);
			$this->db->where('doc_clave',$clave);
			$this->db->from('docente');
			$query = $this->db->get();
			return $query->result_array();
		}

		function loguearalumno($user,$clave){
			$this->db->where('alu_correo',$user);
			$this->db->where('alu_clave',$clave);
			$this->db->from('alumno');
			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>