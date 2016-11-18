<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class dedicacion_docente extends CI_Controller
    {    
        function __construct()
        {   parent::__construct();
        }

         public function index()
        {                
            $this->load->database('default');
            $this->load->model('dedicacion_docente_model');  

            $dato_foother= array ('add_table'=> 'si');

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php'); 
            $this->load->view('dedicacion_docente/index.php');
            $this->load->view('layout/foother.php',$dato_foother);             
        }

        public function cargar_datos($tabla='dedicacion_docente')
        {   
            $this->load->database('default');
            $this->load->model('dedicacion_docente_model'); 

            $consulta=$this->dedicacion_docente_model->MostrarDedicacionDocente($tabla);        
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());

            echo json_encode($result);
        }

        public function Nuevo(){
            $this->load->database('default');
            $this->load->model('dedicacion_docente_model');

            $NuevoDedDocente = $this->dedicacion_docente_model->Nuevo();
            echo json_encode($NuevoDedDocente);
        }

        public function Guardar(){
            $this->load->database('default');
            $this->load->model('dedicacion_docente_model');

            $NuevoDedDocente = $this->dedicacion_docente_model->GuardarDeDoc($this->input->post("ded_id"),$this->input->post("ded_descripcion"));

            echo "<center> <span class='icon-warning-sign' aria-hidden='true'></span> <b> Dedicación Docente Insertado Correctamente </b> </center>";
        }
    }
 ?>
