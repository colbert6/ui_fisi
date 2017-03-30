<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class categoria_docente extends CI_Controller
    {    
        function __construct(){
            parent::__construct();
            $this->load->database('default');   
            $this->load->model('categoria_docente_model');
        }

        public function index()
        {              
            $this->load->view('categoria_docente/index.php');          
        }  

        public function cargar_datos()
        { 
            $consulta=$this->categoria_docente_model->MostrarCategoriaDocente();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
        }

        function guardar()
        {
            $data = array(
               'catdoc_descripcion' => $_POST["descripcion"]
            );
        
            if($_POST["id"]==""){
              $estado=$this->db->insert('categoria_docente', $data);
                if($estado==1){
                  echo 'I';
                }else{
                    echo '0';
                }
            }else{
              $this->db->where('catdoc_id',$_POST["id"]);
              $estado=$this->db->update('categoria_docente', $data);
                if($estado==1){
                    echo 'M';
                }else{
                    echo '0';
                }
            }
        }
    }
 ?>
