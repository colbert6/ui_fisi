<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class alumno extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();    
            $this->load->database('default');
            $this->load->model('alumno_model'); 
            $this->load->model('escuela_model'); 
            $this->load->model('grado_academico_model');    
        }
        
        public function index()
        {               
            $dato_foother= array ( 'add_table'=> 'si');
            $data= array ( 'escuela'=> $this->escuela_model->select()->result_array(),
                           'grado_academico'=>$this->grado_academico_model->select()->result_array());
            //echo"<pre>";print_r($data);exit();

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('alumno/index.php',$data);
            $this->load->view('layout/foother.php',$dato_foother);             
        }

        public function guardar()
        {   
            if(!empty($_POST['id'])) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviatura'=> $this->input->post('abreviatura'));
                $guardar=$this->marca_model->editar($data);   

            }else{
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                                'abreviatura'=> $this->input->post('abreviatura') );
                $guardar=$this->marca_model->crear($data);
                
            } 
            echo json_encode($guardar);            
            
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

