<?php
	class categoria_docente_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function MostrarCategoriaDocente(){
            $sql="SELECT * FROM categoria_docente";
            $query=$this->db->query($sql);
            return $query;
        }
		
        function Nuevo(){
			$this->db->select_max('catdoc_id');
			$query = $this->db->get('categoria_docente');
			return $query->result();
		} 

		function Guardar($cod,$descrip){
			$data = array(
               'catdoc_id' => $cod,
               'catdoc_descripcion' => $descrip
            );
			$this->db->insert('categoria_docente', $data);
		} 
	}
?>