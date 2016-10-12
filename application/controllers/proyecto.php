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

       
        

    }
 ?>

