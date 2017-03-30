<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class categoria_docente_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database('default');   
		}

		function MostrarCategoriaDocente(){
            $sql="SELECT * FROM categoria_docente";
            $query=$this->db->query($sql);
            return $query;
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