<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class eje_tematico extends CI_Controller
    {   
        function __construct(){
            parent::__construct();
            $this->load->database('default');
            $this->load->model('eje_tematico_model');   
                 
        } 
        
        public function index()
        {  
            $this->load->view('eje_tematico/index.php');
        }

        public function cargar_datos()
        {     
            $consulta=$this->eje_tematico_model->MostrarEjeTematico();
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                "recordsFiltered"=>$consulta->num_rows(),
                "data"=>$consulta->result());
            
            echo json_encode($result);
        }

         public function Facultad_json()
        {              
           $sql="SELECT * FROM facultad";
           $query=$this->db->query($sql)->result();  
            echo json_encode($query);    
        }

        function guardar()
        {
            $data = array(
               'eje_descripcion' => $_POST["descripcion"],
               'fac_id' => $_POST["facultad"]

            );
        
            if($_POST["id"]==""){
              $estado=$this->db->insert('eje_tematico', $data);
                if($estado==1){
                  echo 'I';
                }else{
                    echo '0';
                }
            }else{
              $this->db->where('eje_id',$_POST["id"]);
              $estado=$this->db->update('eje_tematico', $data);
                if($estado==1){
                    echo 'M';
                }else{
                    echo '0';
                }
            }
        }

    }
 ?>

