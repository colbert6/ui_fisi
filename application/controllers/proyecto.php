<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class proyecto extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();    
            $this->load->database('default');  
            $this->load->model('nombre_parte_model');
            $this->load->model('proyecto_model'); 
            $this->load->model('requisito_model');
            $this->load->model('eje_tematico_model');  
            $this->load->model('linea_investigacion_model');   
            $this->load->model('tipo_proyecto_model');

            $this->load->model('semestre_academico_model');

        }

        public function proyectos()//Del Admin
        {
           $this->load->view('proyecto/proyectos.php');         
        }

        public function mis_proyectos()//Del Alumno
        {    
            $this->load->view('proyecto/mis_proyectos.php');         
        }

        public function proyecto_asesor()//Del docente
        {    
            $this->load->view('proyecto/proyecto_asesor.php');         
        }

        public function proyecto_evaluador()//Del docente
        {               
            $this->load->view('proyecto/proyecto_evaluador.php');       
        }

        public function registrar_proyecto()
        {               
            $data= array ( 
                    'eje'=> $this->eje_tematico_model->select($this->session->userdata('fac_id'))->result_array(),
                    'semestre'=> $this->semestre_academico_model->Select()->result_array(),
                    'tipo_pro'=> $this->tipo_proyecto_model->MostrarTipoProyecto()->result_array());
            //echo"<pre>";print_r($data);exit();
            //echo $this->session->userdata('alu_id');
            
            $this->load->view('proyecto/registrar_proyecto.php',$data);        
        }
        
        public function elaborar_proyecto($pro_id)
        {   
            //Validar que el proyecto sea del usuario            
            $data= array ('seccion'=> $this->nombre_parte_model->select_seccion()->result_array(),
                          'parte'=> $this->nombre_parte_model->select_parte()->result_array(),
                          'pro_id'=>$pro_id );
            //echo"<pre>";print_r($data);exit();
            
            $this->load->view('proyecto/formato.php',$data);           
        }

        public function evaluar_proyecto($pro_id)
        {   
            //Validar que el proyecto sea del usuario         
            $data= array ('seccion'=> $this->nombre_parte_model->select_seccion()->result_array(),
                          'parte'=> $this->nombre_parte_model->select_parte()->result_array(),
                          'pro_id'=>$pro_id );
            //echo"<pre>";print_r($data);exit();
            
            $this->load->view('proyecto/formato.php',$data);          
        }

        public function mostrar_proyecto()
        {   
            //Validar que el proyecto sea del usuario   
            $pro_id= $this->input->post('pro_id');      
            $data= array ('seccion'=> $this->nombre_parte_model->select_seccion()->result_array(),
                          'parte'=> $this->nombre_parte_model->select_parte()->result_array(),
                          'pro_id'=>$pro_id );
            //echo"<pre>";print_r($data);exit();
            
            $this->load->view('proyecto/formato.php',$data);          
        }

        public function proyecto_word()//Criterio en general
        {   
            $data= array ('seccion'=> $this->nombre_parte_model->select_seccion()->result_array(),
                          'parte'=> $this->nombre_parte_model->select_parte()->result_array() );
            $this->load->view('proyecto/proyecto_word.php',$data);
            //sleep(10);
            // $this->load->view('proyecto/header_word.php',$data);
        }



        public function Guardar_nombrePro()//Guardar Nombre_Proyecto/Parte
        {   
            if($_POST['nompar']=='NombreProyecto'){//editar el nombre del proyecto
                $data= array ( 'pro_id'=> $this->input->post('pro_id'),
                                'pro_nombre'=> $this->input->post('nombrePro'));
                $guardar=$this->proyecto_model->editar_nombre($data);  
            }
            echo $guardar;   
        }

        public function Guardar_asesor()//Guardar Nombre_Proyecto/Parte
        {   
            if($_POST['id_campo']=='pro_nombre'){//editar el nombre del proyecto
                $data= array ( 'pro_id'=> $this->input->post('pro_id'),
                                'pro_nombre'=> $this->input->post('valor'));
                $guardar=$this->proyecto_model->editar_nombre($data);  
            }
            echo $guardar;   
        }

        public function Guardar_parte()//Guardar Nombre_Proyecto/Parte
        {               
            
            if($_POST['par_id']==0){
                $data= array ( 'pro_id'=> $this->input->post('pro_id'),
                               'nompar_id'=> $this->input->post('nompar_id'),
                               'par_contenido'=> $this->input->post('RichTextEditor'));
                $guardar=$this->proyecto_model->insertar_parte($data);

            }else if($_POST['par_id']!=0){
                $data= array ( 'pro_id'=> $this->input->post('pro_id'),
                               'nompar_id'=> $this->input->post('nompar_id'),
                               'par_contenido'=> $this->input->post('RichTextEditor'));
                $guardar=$this->proyecto_model->editar_parte($data);
            }
        
            echo $guardar;            
            
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

        //--------CARGAR ---------------------//

        public function cargar_proyectos()//Poyectos en general
        {   
            $consulta=$this->proyecto_model->select_proyectos();        
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());            
            echo json_encode($result);
        }

        public function cargar_mis_proyectos($id)//Poyectos del alumno
        {   
            $consulta=$this->proyecto_model->select_proyecto_alumno($id);        
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());            
            echo json_encode($result);
        }

        public function cargar_proyecto_asesor($id)//Poyectos del docente en que este asesorando
        {   
            $consulta=$this->proyecto_model->select_proyecto_asesor($id);        
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());            
            echo json_encode($result);
        }

        public function cargar_proyecto_evaluador($id)//Poyectos del docente en que este asesorando
        {   
            $consulta=$this->proyecto_model->select_proyecto_evaluador($id);        
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());            
            echo json_encode($result);
        }

        //--BUSQUEDAS ---------------------------//
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
            if($_POST['nompar_id'] == "" ){
                $consulta=$this->proyecto_model->select_parte($pro_id);
            }else{
                $consulta=$this->proyecto_model->select_parte_id($pro_id,$_POST['nompar_id']);
            }
            
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

        public function buscar_requisito_pro()//Requisito del proyecto
        {   
            $tipo_proyecto=$_POST['tipo'];
            $consulta=$this->requisito_model->select_requisitos($tipo_proyecto);
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

