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

        public function cargar_datos($tabla='linea_investigacion')
        {   
            $this->load->model('linea_investigacion_model');

            $consulta=$this->linea_investigacion_model->mostrar_tabla($tabla);
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }
       
        
        public function Nuevo(){
            $this->load->model('linea_investigacion_model');

            $NuevaLineaInvestigacion = $this->linea_investigacion_model->Nuevo();
            echo json_encode($NuevaLineaInvestigacion);
        }
        /*
        public function Guardar(){
            $NuevaLineaInvestigacion = $this->linea_investigacion_model->InsertarTP($this->input->post("linin_id"),$this->input->post("linin_eje"));

            echo "<center> <span class='icon-warning-sign' aria-hidden='true'></span> <b> Tipo Proyecto Insertado Correctamente </b> </center>";
        }*/


        public function Lineas_json(){            
          $this->load->model('linea_investigacion_model'); 
          $eje=$_POST['valor'] ;          
          $query = $this->linea_investigacion_model->Select_eje($eje)->result();
          echo json_encode($query);    
        }
    }
 ?>

