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

        function select(){
            $query=$this->db->get("grado_academico");      
            return $query;            
        }


        function Nuevo(){
            $this->db->select_max('grac_id');
            $query = $this->db->get('grado_academico');
            return $query->result();
        }

        function GuardarGrAc($cod,$descrip){
            $data = array(
               'grac_id' => $cod,
               'grac_descripcion' => $descrip,
               'grac_estado' => 1
            );
            $this->db->insert('grado_academico', $data);
        }
    }
?>