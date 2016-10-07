<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Escuela_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database('default');         
        
        }

        function select(){
            $this->db->where("esc_estado",1);  
            $query=$this->db->get("escuela");      
            return $query;            
        }
        

    }
?>