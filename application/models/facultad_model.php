<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Facultad_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database('default');              
        }

        function select(){
            $query=$this->db->get("facultad");      
            return $query;            
        }

        function mostrar_tabla(){
            $sql="SELECT * FROM facultad";
            $query=$this->db->query($sql);
            return $query;
<<<<<<< HEAD
        }
=======
        }       

       

>>>>>>> 56f5d1cd79ab5bf48e91d537ffe9b4724133e307
    }
?>

