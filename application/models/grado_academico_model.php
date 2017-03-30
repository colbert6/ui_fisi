<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class grado_academico_model extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database('default');   
        }

        function mostrar_tabla(){
            $sql="SELECT * FROM grado_academico";
            $query=$this->db->query($sql);
            return $query;
        }
    }
?>
