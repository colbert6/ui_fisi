<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class tipo_asesor extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();    
            $this->load->database('default');
            $this->load->model('tipo_asesor_model');  
        }
        
        public function index()
        {                
            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php'); 
            $this->load->view('tipo_asesor/index.php');
            $this->load->view('layout/foother.php');             
        }

        public function cargar_datos($tabla='tipo_asesor')
        {   
            $consulta=$this->tipo_asesor_model->MostrarTipoAsesor($tabla);        
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());

            echo json_encode($result);
        }

    }
 ?>

