<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class fase_comision extends CI_Controller
    {    
        function __construct(){
            parent::__construct();
            $this->load->database('default');
            $this->load->model('fase_comision_model');
        }

        public function index()
        {                
            $this->load->view('fase_comision/index.php');                      
        }

        public function cargar_datos()
        { 
            $consulta=$this->fase_comision_model->MostrarFaseComision();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }

        function guardar()
        {
            $data = array(
               'fascom_descripcion' => $_POST["descripcion"],
               'fascom_plazo' => $_POST["plazo"]
            );
        
            if($_POST["id"]==""){
              $estado=$this->db->insert('fase_comision', $data);
                if($estado==1){
                  echo 'I';
                }else{
                    echo '0';
                }
            }else{
              $this->db->where('fascom_id',$_POST["id"]);
              $estado=$this->db->update('fase_comision', $data);
                if($estado==1){
                    echo 'M';
                }else{
                    echo '0';
                }
            }
        }
        
    }
 ?>
