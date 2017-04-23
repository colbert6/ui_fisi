<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class tipo_proyecto extends CI_Controller
    {   
        function __construct(){
            parent::__construct();
            $this->load->database('default');
            $this->load->model('tipo_proyecto_model');     
        }

        public function index()
        {   
            $this->load->view('tipo_proyecto/index.php');         
        }

        public function cargar_datos()
        { 
            $consulta=$this->tipo_proyecto_model->MostrarTipoProyecto();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }


        function guardar()
        {
            $data = array(
               'tipro_descripcion' => $_POST["descripcion"]
            );
        
            if($_POST["id"]==""){
              $estado=$this->db->insert('tipo_proyecto', $data);
                if($estado==1){
                  echo 'I';
                }else{
                    echo '0';
                }
            }else{
              $this->db->where('tipro_id',$_POST["id"]);
              $estado=$this->db->update('tipo_proyecto', $data);
                if($estado==1){
                    echo 'M';
                }else{
                    echo '0';
                }
            }
        }

    }
 ?>
