<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Nombre_parte_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database('default');              
        }


        function select_seccion(){
            $sql="SELECT nompar_seccion as seccion
                FROM nombre_parte
                GROUP BY  nompar_seccion
                HAVING nompar_seccion!='' 
                ORDER BY nompar_seccion";
            $query=$this->db->query($sql);
            return $query;
        }

        function select_parte(){
            $this->db->select('*');
            $this->db->from('nombre_parte'); 
            $this->db->order_by("nompar_orden");           
            $query = $this->db->get();
            return $query;
        }

        

    }
?>