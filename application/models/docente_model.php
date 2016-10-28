<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Docente_model extends CI_Model{
		function __construct(){
			parent::__construct();
		    $this->load->database('default');              
		}

		function select(){
            //$this->db->where("estado",1);  
            $query=$this->db->get("docente");      
            return $query;            
        }

	}
?>