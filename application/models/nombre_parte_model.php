<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Nombre_parte_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database('default');              
        }


        function select_seccion(){// seccion de la parte en general
            $sql="SELECT nompar_seccion as seccion
                FROM nombre_parte
                GROUP BY  nompar_seccion
                HAVING nompar_seccion!='' 
                ORDER BY nompar_seccion";
            $query=$this->db->query($sql);
            return $query;
        }

        function select_parte(){// Nombre de la parte en general
            $this->db->select('*');
            $this->db->from('nombre_parte'); 
            $this->db->order_by("nompar_orden");           
            $query = $this->db->get();
            return $query;
        }

        function select_criterio($data){//Criterio de la parte
            $this->db->select('*');
            $this->db->from('criterio'); 
            $this->db->where("nompar_id",$data['nompar_id']);
            $this->db->order_by("cri_rango_min","desc");          
            $query = $this->db->get();
            return $query;
        }

        

    }
?>