<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class eje_tematico extends CI_Controller
    {   
        function __construct(){
            parent::__construct();
                    
        } 
        
        public function index(){  
            $this->load->database('default');
            $this->load->model('eje_tematico_model'); 
            $this->load->model('facultad_model'); 

            $dato_foother= array ( 'add_table'=> 'si');
            $data= array ( 'facultad'=> $this->facultad_model->select()->result_array());

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('eje_tematico/index.php', $data);
            $this->load->view('layout/foother.php',$dato_foother);             
        }

        public function cargar_datos($tabla='eje_tematico'){ 
            $this->load->database('default');
            $this->load->model('eje_tematico_model');

            $consulta=$this->eje_tematico_model->MostrarEjeTematico($tabla);
            //echo "<pre>";            print_r($consulta);exit();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }

        public function Nuevo(){
            $NuevoEjeTematico = $this->eje_tematico_model->Nuevo();
            echo json_encode($NuevoEjeTematico);
        }

    }
 ?>

