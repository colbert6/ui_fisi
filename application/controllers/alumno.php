<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class alumno extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();    
            $this->load->model('alumno_model'); 
            $this->load->model('escuela_model'); 
            $this->load->model('grado_academico_model');    
        }
        
        public function index()
        {               
            $data= array ( 'escuela'=> $this->escuela_model->select()->result_array(),
                           'grado_academico'=>$this->grado_academico_model->select()->result_array());
                        
            $this->load->view('alumno/index.php',$data);           
        }
       
        public function cargar_datos($tabla='alumno')
        {   
            $consulta=$this->alumno_model->mostrar_tabla($tabla);
            //echo "<pre>";            print_r($consulta);exit();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }
    }
 ?>

