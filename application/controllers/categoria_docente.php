<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class categoria_docente extends CI_Controller
    {    
        function __construct(){
            parent::__construct();
        }

        public function index(){  
            $this->load->database('default');
            $this->load->model('categoria_docente_model');

            $dato_foother= array ( 'add_table'=> 'si'); 

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php'); 
            $this->load->view('categoria_docente/index.php');
            $this->load->view('layout/foother.php',$dato_foother);             
        }  

        public function cargar_datos(){ 
            $this->load->database('default');
            $this->load->model('categoria_docente_model');

            $consulta=$this->categoria_docente_model->MostrarCategoriaDocente();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }

        public function Nuevo(){
            $this->load->database('default');
            $this->load->model('categoria_docente_model');

            $NuevaCategoriaDocente = $this->categoria_docente_model->Nuevo();
            echo json_encode($NuevaCategoriaDocente);
        }

        public function Guardar(){
            $this->load->database('default');
            $this->load->model('categoria_docente_model');

            $NuevaCategoriaDocente = $this->categoria_docente_model->Guardar($this->input->post("catdoc_id"),$this->input->post("catdoc_descripcion"));

            echo "<center> <span class='icon-warning-sign' aria-hidden='true'></span> <b> Categoria Docente Insertado Correctamente </b> </center>";
        }
    }
 ?>
