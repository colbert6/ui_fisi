<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class proyecto extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();    
            $this->load->database('default');  
            $this->load->model('nombre_parte_model');
            $this->load->model('proyecto_model');  
        }
        
        public function elaborar_proyecto()
        {   
            //Validar que el proyecto sea del usuario            
            $dato_foother= array ( 'js'=>array ('elaborar') );
            $data= array ('seccion'=> $this->nombre_parte_model->select_seccion()->result_array(),
                          'parte'=> $this->nombre_parte_model->select_parte()->result_array() );
            //echo"<pre>";print_r($data);exit();

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('proyecto/index.php',$data);
            $this->load->view('layout/foother.php',$dato_foother);              
        }

        public function revisar_proyecto()
        {   
            //Validar que el proyecto sea del usuario    
            $dato_foother= array ( 'js'=>array ('revisar') );        
            $data= array ('seccion'=> $this->nombre_parte_model->select_seccion()->result_array(),
                          'parte'=> $this->nombre_parte_model->select_parte()->result_array() );
            //echo"<pre>";print_r($data);exit();

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('proyecto/index.php',$data);
            $this->load->view('layout/foother.php',$dato_foother);              
        }

        public function guardar()
        {   
            if($_POST['id_campo']=='pro_nombre'){//editar el nombre del proyecto
                $data= array ( 'pro_id'=> $this->input->post('pro_id'),
                                'pro_nombre'=> $this->input->post('valor'));
                $guardar=$this->proyecto_model->editar_nombre($data);  
            }
            if($_POST['id_campo']=='asesor'){//Registrar Asesor
                $data= array ( 'pro_id'=> $this->input->post('pro_id'),
                                'doc_id'=> $this->input->post('valor'));
                $guardar=$this->proyecto_model->insertar_asesor($data);  
            }
            if($_POST['id_campo']!='asesor' and $_POST['id_campo']!='pro_nombre'){//Registrar Asesor
                if($_POST['par_id']==0){
                    $data= array ( 'pro_id'=> $this->input->post('pro_id'),
                                    'nompar_id'=> $this->input->post('id_campo'),
                                    'par_contenido'=> $this->input->post('valor'));
                    $guardar=$this->proyecto_model->insertar_parte($data);

                }else if($_POST['par_id']!=0){
                    $data= array ( 'pro_id'=> $this->input->post('pro_id'),
                                    'par_id'=> $this->input->post('par_id'),
                                    'par_contenido'=> $this->input->post('valor'));
                    $guardar=$this->proyecto_model->editar_parte($data);
                }
            }

            echo json_encode($guardar);            
            
        }

        public function buscar_proyecto()//Poyecto especifico
        {   
            $pro_id=$_POST['pro_id'];
            $consulta=$this->proyecto_model->select_id($pro_id);
            //echo "<pre>";            print_r($consulta);exit();
            echo json_encode( $consulta->result());
        }

        public function buscar_asesor()//Poyecto especifico
        {   
            $pro_id=$_POST['pro_id'];
            $consulta=$this->proyecto_model->select_asesor($pro_id);
            //echo "<pre>";            print_r($consulta);exit();
            echo json_encode( $consulta->result());
        }       
        
        public function buscar_parte()//Poyecto especifico
        {   
            $pro_id=$_POST['pro_id'];
            $consulta=$this->proyecto_model->select_parte($pro_id);
            //echo "<pre>";            print_r($consulta);exit();
            echo json_encode( $consulta->result());
        } 

        public function buscar_nombre_parte_criterio()//Criterio en general
        {   
            $data= array ( 'nompar_id'=> $this->input->post('nompar_id'));
            $consulta=$this->nombre_parte_model->select_criterio($data);
            //echo "<pre>";            print_r($consulta);exit();
            echo json_encode( $consulta->result());
        }

    }
 ?>

