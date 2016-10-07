<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Grado_academico_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database('default');         
        
        }

        function select(){
            //$this->db->where("esc_estado",1);  
            $query=$this->db->get("grado_academico");      
            return $query;            
        }
        

    }
?>