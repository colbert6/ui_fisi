<?php
    class facultad_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        function select(){
            $query=$this->db->get("facultad");      
            return $query;            
        }

        function MostrarFacultad(){
            $sql="SELECT * FROM facultad";
            $query=$this->db->query($sql);
            return $query;
        }
    }
?>