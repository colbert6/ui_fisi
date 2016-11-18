<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class escuela extends CI_Controller
    {    
        function __construct(){
            parent::__construct();
        }

        public function index(){  
            $this->load->database('default');
            $this->load->model('escuela_model');

            $dato_foother= array ( 'add_table'=> 'si'); 

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php'); 
            $this->load->view('escuela/index.php');
            $this->load->view('layout/foother.php',$dato_foother);             
        }  

        public function cargar_datos($tabla='escuela'){ 
            $this->load->database('default');
            $this->load->model('escuela_model');

            $consulta=$this->escuela_model->MostrarEscuela($tabla);
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }

        public function Nuevo(){
            $this->load->database('default');
            $this->load->model('escuela_model');

            $Facultad = $this->escuela_model->Nuevo();
            echo json_encode($Facultad );
        }

        public function Guardar(){
            $this->load->database('default');
            $this->load->model('escuela_model');

            $NuevaFacultad = $this->escuela_model->Guardar($this->input->post("fac_id"),$this->input->post("fac_descripcion"),$this->input->post("fac_codigo_sira"),$this->input->post("fac_abreviatura"),$this->input->post("fac_logo"));

            echo "<center> <span class='icon-warning-sign' aria-hidden='true'></span> <b> Facultad Insertado Correctamente </b> </center>";
        }
    }
 ?>
