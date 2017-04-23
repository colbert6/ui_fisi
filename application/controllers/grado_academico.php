<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class grado_academico extends CI_Controller
    {    
        function __construct(){
            parent::__construct();
            $this->load->database('default');
            $this->load->model('grado_academico_model'); 
        }

        public function index()
        {              
            $this->load->view('grado_academico/index.php');          
        }  

        public function cargar_datos()
        { 
            $consulta=$this->grado_academico_model->mostrar_tabla();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }

        function guardar()
        {
            $data = array(
               'grac_descripcion' => $_POST["descripcion"]
            );
             
            if($_POST["id"]==""){
              $estado=$this->db->insert('grado_academico', $data);
                if($estado==1){
                  echo 'I';
                }else{
                    echo '0';
                }
            }else{
              $this->db->where('grac_id',$_POST["id"]);
              $estado=$this->db->update('grado_academico', $data);
                if($estado==1){
                    echo 'M';
                }else{
                    echo '0';
                }
            }
        }
    }
 ?>
