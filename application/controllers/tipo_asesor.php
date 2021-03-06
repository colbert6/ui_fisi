<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class tipo_asesor extends CI_Controller
    {   
        function __construct(){
            parent::__construct();  
            $this->load->database('default');
            $this->load->model('tipo_asesor_model');  
        }
        
        public function index()
        {                
            $this->load->view('tipo_asesor/index.php');            
        }

        public function cargar_datos()
        { 
            $consulta=$this->tipo_asesor_model->MostrarTipoAsesor();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }

        function guardar()
        {
            $data = array(
               'tipase_descripcion' => $_POST["descripcion"]
            );
        
            if($_POST["id"]==""){
              $estado=$this->db->insert('tipo_asesor', $data);
                if($estado==1){
                  echo 'I';
                }else{
                    echo '0';
                }
            }else{
              $this->db->where('tipase_id',$_POST["id"]);
              $estado=$this->db->update('tipo_asesor', $data);
                if($estado==1){
                    echo 'M';
                }else{
                    echo '0';
                }
            }
        }
    }
 ?>

