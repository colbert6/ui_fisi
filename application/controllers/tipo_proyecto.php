<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class tipo_proyecto extends CI_Controller
    {   
        function __construct(){
            parent::__construct();
                 
        }

        public function index()
        {   
            $this->load->database('default');
            $this->load->model('tipo_proyecto_model');

            $dato_foother= array ('add_table'=> 'si'); 
            
            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php'); 
            $this->load->view('tipo_proyecto/index.php');
            $this->load->view('layout/foother.php',$dato_foother);                        
        }

        public function cargar_datos($tabla='tipo_proyecto'){
            $this->load->database('default');
            $this->load->model('tipo_proyecto_model');

            $consulta=$this->tipo_proyecto_model->MostrarTipoProyecto($tabla);

            $result = array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());        
            echo json_encode($result);
        }

        public function Nuevo(){
            $this->load->database('default');
            $this->load->model('tipo_proyecto_model');

            $NuevoTipoProyecto = $this->tipo_proyecto_model->Nuevo();
            echo json_encode($NuevoTipoProyecto);
        }

        public function Guardar(){
            $this->load->database('default');
            $this->load->model('tipo_proyecto_model');

            $NuevoTipoProyecto = $this->tipo_proyecto_model->InsertarTP($this->input->post("tipro_id"),$this->input->post("tipro_descripcion"));

            echo "<center> <span class='icon-warning-sign' aria-hidden='true'></span> <b> Tipo Proyecto Insertado Correctamente </b> </center>";
        }
    }
 ?>
