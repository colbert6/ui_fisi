<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class docente extends CI_Controller
    {   
        private $fac_id;

        function __construct(){
            parent::__construct();    
            $this->load->model('docente_model');   
            $this->fac_id=$this->session->userdata('fac_id');  
        }
        
        public function index()
        {               
            $this->load->view('docente/index.php');           
        }
       
        public function cargar_datos()
        {   
            $consulta=$this->docente_model->mostrar_tabla();
            //echo "<pre>";            print_r($consulta);exit();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }

        public function Asesor_json(){    
          //$eje=$_POST['valor'] ;          
          $query = $this->docente_model->listar_asesores($this->fac_id)->result();
          echo json_encode($query);    
        }
    }
?>
