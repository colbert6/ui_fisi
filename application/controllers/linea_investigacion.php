<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class linea_investigacion extends CI_Controller
    {    
        function __construct(){
            parent::__construct();    
            $this->load->database('default');
            $this->load->model('linea_investigacion_model');
            $this->load->model('eje_tematico_model');   
        }

        public function index()
        {   
            $dato_foother= array ( 'add_table'=> 'si');
            $data= array ( 'eje_tematico'=> $this->eje_tematico_model->select()->result_array());

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('linea_investigacion/index.php',$data);
            $this->load->view('layout/foother.php',$dato_foother);             
        }

        public function cargar_datos($tabla='linea_investigacion')
        {   
            $this->load->database('default');
            $this->load->model('linea_investigacion_model');

            $consulta=$this->linea_investigacion_model->mostrar_tabla($tabla);
            //echo "<pre>";            print_r($consulta);exit();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }

        public function Nuevo(){
            $this->load->database('default');
            $this->load->model('linea_investigacion_model');

            $NuevaLineaInvestigacion = $this->linea_investigacion_model->Nuevo();
            echo json_encode($NuevaLineaInvestigacion);
        }
/*
        public function Guardar(){
            $NuevaLineaInvestigacion = $this->linea_investigacion_model->InsertarTP($this->input->post("linin_id"),$this->input->post("linin_eje"));

            echo "<center> <span class='icon-warning-sign' aria-hidden='true'></span> <b> Tipo Proyecto Insertado Correctamente </b> </center>";
        }*/
    }
 ?>

