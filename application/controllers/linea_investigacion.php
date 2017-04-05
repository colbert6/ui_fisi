<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class linea_investigacion extends CI_Controller
    {    
        function __construct(){
            parent::__construct();  
            $this->load->database('default');
            $this->load->model('linea_investigacion_model');     
        }

        public function index()
        {   
            $this->load->view('linea_investigacion/index.php');            
        }

        public function cargar_datos()
        { 
            $consulta=$this->linea_investigacion_model->MostrarLineaInvestigacion();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }
       
        public function Eje_json(){            
          $eje=$_POST['valor'] ;          
          $query = $this->linea_investigacion_model->Select_eje($eje)->result();
          echo json_encode($query);    
        }
    }
 ?>

