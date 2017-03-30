<?php
	class login_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database('default');  
		}

		function logueardocente($user,$clave){
			$sql="SELECT d.*, dep.*, f.fac_descripcion,f.fac_logo,f.fac_abreviatura,
					(SELECT c.com_funcion 
					FROM comision as c INNER JOIN comision_docente cd ON c.com_id=cd.com_id
					WHERE c.fac_id=dep.fac_id and cd.doc_id=d.doc_id)
				 FROM  docente as d INNER JOIN departamento as dep ON d.dep_id=dep.dep_id  
				 		INNER JOIN facultad as f ON f.fac_id=dep.fac_id 
				 WHERE d.doc_usuario='$user' and d.doc_clave='$clave' ";
			$query=$this->db->query($sql);  

			if($query->num_rows() == 1)
			{				
            	return $query->result_array();   
			}else{
				return null;  
			} 
		}

		function loguearalumno($user,$clave){
			$sql="SELECT a.*,e.*,f.*
				FROM alumno as a INNER JOIN escuela as e  ON e.esc_id=a.esc_id 
    							INNER JOIN facultad as f ON f.fac_id=e.fac_id
				WHERE a.alu_usuario='$user' and a.alu_clave='$clave'";
			$query=$this->db->query($sql);  
			
            if($query->num_rows() == 1)
			{				
            	return $query->result_array();   
			}else{
				return null; 
			}  
		}


	}
?>