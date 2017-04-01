<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class semestre_academico_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database('default');   
		}

		function Select(){
            $sql="SELECT * FROM semestre_academico";
            $query=$this->db->query($sql);
            return $query;
        }
		
	}
?>