<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class fase_comision extends CI_Controller
    {    
        public function index()
        {                
            $this->load->database('default');
            $this->load->model('fase_comision_model'); 

            $dato_foother= array ('add_table'=> 'si'); 
            
            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php'); 
            $this->load->view('fase_comision/index.php');
            $this->load->view('layout/foother.php',$dato_foother);                        
        }

        public function cargar_datos($tabla='fase_comision'){
            $this->load->database('default');
            $this->load->model('fase_comision_model');

            $consulta=$this->fase_comision_model->MostrarFaseComision($tabla);

            $result = array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());        
            echo json_encode($result);
        }

        public function Nuevo(){
            $this->load->database('default');
            $this->load->model('fase_comision_model');

            $NuevaFaseComision = $this->fase_comision_model->Nuevo();
            echo json_encode($NuevaFaseComision);
        }

        public function Guardar(){
            $this->load->database('default');
            $this->load->model('fase_comision_model');

            $NuevoFasCom = $this->fase_comision_model->InsertarFasCom($this->input->post("fascom_id"),$this->input->post("fascom_descripcion"),$this->input->post("fascom_plazo"));

            echo "<center> <span class='icon-warning-sign' aria-hidden='true'></span> <b> Tipo Proyecto Insertado Correctamente </b> </center>";
        }
        
    }
 ?>
