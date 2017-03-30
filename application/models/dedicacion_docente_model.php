<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class dedicacion_docente_model extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database('default');   
        }

        function MostrarDedicacionDocente(){
            $sql="SELECT * FROM dedicacion_docente";
            $query=$this->db->query($sql);
            return $query;
        }
    }
?>