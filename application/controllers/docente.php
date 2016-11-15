<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class docente extends CI_Controller
    {   
        function __construct(){
            parent::__construct();   
            $this->load->model('docente_model');       
        }
        
        public function index()
        {   
            $this->load->database('default');
            $this->load->model('docente_model');

            $dato_foother= array ( 'add_table'=> 'si');

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('docente/index.php');
            $this->load->view('layout/foother.php',$dato_foother);            
        }

       public function cargar_datos($tabla='docente'){ 
            $this->load->database('default');
            $this->load->model('docente_model');

            $consulta=$this->docente_model->mostrar_tabla($tabla);
            //echo "<pre>";            print_r($consulta);exit();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }
    }
 ?>
