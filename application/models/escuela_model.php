<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class escuela_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database('default');
        }

        function select(){            
            $this->db->where("esc_estado",1);  
            $query=$this->db->get("escuela");      
            return $query;            
        }
        
        function mostrar_tabla(){
            $sql="SELECT  e.esc_id, e.esc_descripcion, f.fac_descripcion, e.esc_codigo_sira, e.esc_abreviatura, e.esc_logo
                FROM escuela AS e 
                INNER JOIN facultad AS f ON f.fac_id = e.fac_id";
            $query=$this->db->query($sql);
            return $query;
        }
    }
?>