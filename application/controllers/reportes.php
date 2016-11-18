<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class reportes extends CI_Controller
    {    
        function __construct(){
            parent::__construct();
        }

        public function proyectos(){  
            $this->load->database('default');
            $this->load->model('reportes_model');

            $dato_foother= array ( 'add_table'=> 'si'); 

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php'); 
            $this->load->view('reportes/reporte_proyecto.php');
            $this->load->view('layout/foother.php',$dato_foother);             
        }  

        public function cargar_datos(){ 
            $this->load->database('default');
            $this->load->model('reportes_model');

            $consulta=$this->reporte_proyecto_model->MostrarProyectos();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }

      
    }
 ?>
