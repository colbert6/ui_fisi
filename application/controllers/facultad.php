<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class facultad extends CI_Controller
    {    
        function __construct(){
            parent::__construct();
        }

        public function index(){  
            $this->load->database('default');
            $this->load->model('facultad_model');

            $dato_foother= array ( 'add_table'=> 'si'); 

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php'); 
            $this->load->view('facultad/index.php');
            $this->load->view('layout/foother.php',$dato_foother);             
        }  

        public function cargar_datos(){ 
            $this->load->database('default');
            $this->load->model('facultad_model');

            $consulta=$this->facultad_model->MostrarFacultad();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }
        
        public function Nuevo(){
            $this->load->database('default');
            $this->load->model('facultad_model');

            $Facultad = $this->facultad_model->Nuevo();
            echo json_encode($Facultad );
        }

        public function Guardar(){
            $this->load->database('default');
            $this->load->model('facultad_model');

            $NuevaFacultad = $this->facultad_model->Guardar($this->input->post("fac_id"),$this->input->post("fac_descripcion"),$this->input->post("fac_codigo_sira"),$this->input->post("fac_abreviatura"),$this->input->post("fac_logo"));

            echo "<center> <span class='icon-warning-sign' aria-hidden='true'></span> <b> Facultad Insertado Correctamente </b> </center>";
        }
    }
 ?>
