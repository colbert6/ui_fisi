<?php
    class grado_academico_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        function MostrarGradoAcademico(){
            $sql="SELECT * FROM grado_academico";
            $query=$this->db->query($sql);
            return $query;
        }

    }
?>