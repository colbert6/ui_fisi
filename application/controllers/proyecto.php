<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class proyecto extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();    
            $this->load->database('default');  
            $this->load->model('nombre_parte_model');
            $this->load->model('proyecto_model');  
        }

        public function index()
        {               
            $dato_foother= array ( 'add_table'=> 'si');
            //echo"<pre>";print_r($data);exit();

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('proyecto/index.php');
            $this->load->view('layout/foother.php',$dato_foother);             
        }

        public function registrar_proyecto()
        {               
            $dato_foother= array ( 'add_table'=> 'no');
            //$data= array ( 'proyecto'=> $this->proyecto_model->select()->result_array());
            //echo"<pre>";print_r($data);exit();

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('proyecto/registrar.php');
            $this->load->view('layout/foother.php',$dato_foother);             
        }
        
        public function elaborar_proyecto($pro_id=1)
        {   
            //Validar que el proyecto sea del usuario            
            $dato_foother= array ( 'js'=>array ('elaborar') );
            $data= array ('seccion'=> $this->nombre_parte_model->select_seccion()->result_array(),
                          'parte'=> $this->nombre_parte_model->select_parte()->result_array(),
                          'pro_id'=>$pro_id );
            //echo"<pre>";print_r($data);exit();

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('proyecto/formato.php',$data);
            $this->load->view('layout/foother.php',$dato_foother);              
        }

        public function revisar_proyecto($pro_id=1)
        {   
            //Validar que el proyecto sea del usuario    
            $dato_foother= array ( 'js'=>array ('revisar') );        
            $data= array ('seccion'=> $this->nombre_parte_model->select_seccion()->result_array(),
                          'parte'=> $this->nombre_parte_model->select_parte()->result_array(),
                          'pro_id'=>$pro_id );
            //echo"<pre>";print_r($data);exit();

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('proyecto/formato.php',$data);
            $this->load->view('layout/foother.php',$dato_foother);              
        }

        public function proyecto_word()//Criterio en general
        {   
            $data= array ('seccion'=> $this->nombre_parte_model->select_seccion()->result_array(),
                          'parte'=> $this->nombre_parte_model->select_parte()->result_array() );
            $this->load->view('proyecto/proyecto_word.php',$data);
            //sleep(10);
            // $this->load->view('proyecto/header_word.php',$data);
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

        public function guardar_evaluacion()
        {   
            $data= array ( 'pro_id'=> $this->input->post('pro_id'),
                                'doc_id'=> $this->input->post('doc_id'),
                                'crit_id'=> $this->input->post('crit_id'),
                                'par_id'=> $this->input->post('par_id'),
                                'obs'=> $this->input->post('obs'),
                                'nota'=> $this->input->post('nota'));
            if($_POST['insert']==1){//editar el nombre del proyecto                
                $guardar=$this->proyecto_model->editar_evaluacion($data);  
            }else{
                $guardar=$this->proyecto_model->insertar_evaluacion($data);  
            }
           
            
            echo json_encode($guardar);            
            
        }

        public function cargar_proyectos_alumno($alu_id)//Poyecto especifico
        {   
            $consulta=$this->proyecto_model->select_proyecto_alumno($alu_id);
        
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            
            echo json_encode($result);
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

        public function buscar_evaluacion()//Criterio en general
        {   
            $data= array ( 'nompar'=> $this->input->post('nompar'),
                            'pro'=> $this->input->post('pro'),
                            'doc'=> $this->input->post('doc'),
                            'part'=> $this->input->post('part'));
            $consulta=$this->proyecto_model->select_evaluacion($data);
            //echo "<pre>";            print_r($consulta->result());exit();
            echo json_encode( $consulta->result());
        }

        

    }
 ?>

