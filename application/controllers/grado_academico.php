<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class grado_academico extends CI_Controller
    {    
        public function index()
        {                
            $this->load->database('default');
            $this->load->model('grado_academico_model');  

            $dato_foother= array ('add_table'=> 'si');

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php'); 
            $this->load->view('grado_academico/index.php');
            $this->load->view('layout/foother.php',$dato_foother);             
        }

        public function cargar_datos($tabla='grado_academico'){
            $this->load->database('default');
            $this->load->model('grado_academico_model');

            $consulta=$this->grado_academico_model->MostrarGradoAcademico($tabla);

            $result = array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());        
            echo json_encode($result);
        }

         public function Nuevo(){
            $this->load->database('default');
            $this->load->model('grado_academico_model');

            $NuevoGradoAcademico = $this->grado_academico_model->Nuevo();
            echo json_encode($NuevoGradoAcademico);
        }

        public function Guardar(){
            $this->load->database('default');
            $this->load->model('grado_academico_model');

            $NuevoGradoAcademico = $this->grado_academico_model->GuardarGrAc($this->input->post("grac_id"),$this->input->post("grac_descripcion"));

            echo "<center> <span class='icon-warning-sign' aria-hidden='true'></span> <b> Grado Académico Insertado Correctamente </b> </center>";
        }

    }
 ?>
