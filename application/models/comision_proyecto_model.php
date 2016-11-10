<?php 
	class comision_proyecto_model extends CI_Model{
		function __construct(){
			parent::__construct(); 
		}

		function MostrarProyectos(){
			$this->db->select('proyecto.pro_id,alumno.alu_nombre,alumno.alu_apellido_paterno,alumno.alu_apellido_materno,proyecto.pro_nombre,tipo_proyecto.tipro_id,tipo_proyecto.tipro_descripcion,proyecto.pro_fecha_registro');
			$this->db->from('proyecto');
			$this->db->join('alumno', 'alumno.alu_id = proyecto.alu_id');
			$this->db->join('linea_investigacion', 'linea_investigacion.linin_id = proyecto.linin_id');
			$this->db->join('tipo_proyecto', 'tipo_proyecto.tipro_id = proyecto.tipro_id');

			$query = $this->db->get();
			return $query->result();
		}
		
		function MostrarComisionProyectos(){
			$this->db->select('*');
			$this->db->from('comision_evaluadora');
			$this->db->join('proyecto', 'proyecto.pro_id = comision_evaluadora.pro_id');
			$this->db->join('docente', 'docente.doc_id = comision_evaluadora.doc_id');

			$query = $this->db->get();
			return $query->result();
		}

		function MostrarDocentes(){
			$query = $this->db->get_where('docente');
			return $query->result();
		}


		function MostrarCargos(){
			$query = $this->db->get_where('cargo');
			return $query->result();
		}

		function GrabarDetalle(){
			$id_proyecto = $_POST["proyecto_id"];
			foreach ($_POST["id_docente"] as $key => $value) {
				$data = array(
				   'pro_id' =>  $id_proyecto ,
				   'doc_id' => $value ,
				   'carg_id' => $_POST["id_cargo"][$key] ,
				   'comeva_fecha_designacion'=> date("d-m-Y H:i:s")
				   );
				 
				$this->db->insert('comision_evaluadora', $data); 
			}
		}

		function MostrarProyectosAsignados($cod){
			$query = $this->db->query("select * FROM comision_evaluadora where pro_id ='".$cod."'");
			$query = $this->db->query("select p.pro_nombre, d.doc_nombre, c.carg_descripcion, 			ce.comeva_fecha_designacion, ce.comeva_fecha_notificacion 
						from comision_evaluadora as ce
						inner join proyecto as p on p.pro_id = ce.pro_id
						inner join docente as d on d.doc_id = ce.doc_id
						inner join cargo as c on c.carg_id = ce.carg_id
						where ce.pro_id ='".$cod."'");
			return $query->result();
		}
				/*		as ce
						inner join proyecto as p on p.pro_id = ce.pro_id
						inner join docente as d on d.doc_id = ce.doc_id  */
		function MostrarProyecto($cod){
			$query = $this->db->query("select  pro_id, pro_nombre FROM proyecto where pro_id ='".$cod."'");
			return $query->result();
		}

		function MostrarPresidente($cod){
			$query = $this->db->query("select doc_id, pro_nombre FROM comision_evaluadora where pro_id ='".$cod."' and doc_id=1");
			return $query->result();
		}

		function ValidarProyecto($cod){
			$query = $this->db->query("select * from comision_evaluadora where pro_id='".$cod."'");
			return $query->result();
		}
	}
?>