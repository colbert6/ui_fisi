<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class proyecto extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();    
            $this->load->database('default');  
            $this->load->model('nombre_parte_model'); 
        }
        
        public function index()
        {               
            $dato_foother= array ( 'js'=>array ('js') );
            $data= array ('seccion'=> $this->nombre_parte_model->select_seccion()->result_array(),
                          'parte'=> $this->nombre_parte_model->select_parte()->result_array() );
            //echo"<pre>";print_r($data);exit();

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('proyecto/index.php',$data);
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
       
        

    }
 ?>

