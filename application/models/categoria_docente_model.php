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
		
	}
?>