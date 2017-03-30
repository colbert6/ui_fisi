<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class dedicacion_docente extends CI_Controller
    {    
        function __construct(){
            parent::__construct();
            $this->load->model('dedicacion_docente_model');
        }

        public function index()
        {              
            $this->load->view('dedicacion_docente/index.php');          
        }  

        public function cargar_datos()
        { 
            $consulta=$this->dedicacion_docente_model->MostrarDedicacionDocente();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }

        function guardar()
        {
            $data = array(
               'ded_descripcion' => $_POST["descripcion"]
            );
            
            $this->load->database('default');   
            if($_POST["id"]==""){
              $estado=$this->db->insert('dedicacion_docente', $data);
                if($estado==1){
                  echo 'I';
                }else{
                    echo '0';
                }
            }else{
              $this->db->where('ded_id',$_POST["id"]);
              $estado=$this->db->update('dedicacion_docente', $data);
                if($estado==1){
                    echo 'M';
                }else{
                    echo '0';
                }
            }
        }
    }
 ?>
