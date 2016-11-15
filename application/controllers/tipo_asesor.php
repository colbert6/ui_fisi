<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class tipo_asesor extends CI_Controller
    {   
        function __construct(){
            parent::__construct();    
        }
        
        public function index()
        {                
            $this->load->database('default');
            $this->load->model('tipo_asesor_model');  

            $dato_foother= array ('add_table'=> 'si');

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php'); 
            $this->load->view('tipo_asesor/index.php');
            $this->load->view('layout/foother.php',$dato_foother);             
        }

        public function cargar_datos($tabla='tipo_asesor')
        {   
            $this->load->database('default');
            $this->load->model('tipo_asesor_model'); 

            $consulta=$this->tipo_asesor_model->MostrarTipoAsesor($tabla);        
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());

            echo json_encode($result);
        }

        public function Nuevo(){
            $this->load->database('default');
            $this->load->model('tipo_asesor_model');

            $NuevoTipoAsesor = $this->tipo_asesor_model->Nuevo();
            echo json_encode($NuevoTipoAsesor);
        }

        public function Guardar(){
            $this->load->database('default');
            $this->load->model('tipo_asesor_model');

            $NuevoTipoAsesor = $this->tipo_asesor_model->GuardarTipAse($this->input->post("tipase_id"),$this->input->post("tipase_descripcion"));

            echo "<center> <span class='icon-warning-sign' aria-hidden='true'></span> <b> Tipo de Asesor Insertado Correctamente </b> </center>";
        }

    }
 ?>

