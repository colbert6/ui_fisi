<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class escuela extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();    
            $this->load->model('escuela_model');   
        }
        
        public function index()
        {              
            $this->load->view('escuela/index.php');           
        }
       
        public function cargar_datos($tabla='escuela')
        {   
            $consulta=$this->escuela_model->mostrar_tabla();
            //echo "<pre>";            print_r($consulta);exit();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }
    }
?>