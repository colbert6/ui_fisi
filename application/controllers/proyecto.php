<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class proyecto extends CI_Controller
    {   

        private $fac_id;
        private $usuario;
        private $tipo_usu;
        
        function __construct(){
            parent::__construct();    
            $this->load->database('default');  
            $this->load->model('nombre_parte_model');
            $this->load->model('proyecto_model'); 
            $this->load->model('requisito_model');
            $this->load->model('eje_tematico_model');  
            $this->load->model('tipo_proyecto_model');
            $this->load->model('semestre_academico_model');

            $this->fac_id=$this->session->userdata('fac_id');
            $this->usuario=$this->session->userdata('id');
            $this->tipo_usu=$this->session->userdata('id_tipo');

        }

        public function proyectos()//Del Docente como asesor o evaluador
        {
           $this->load->view('proyecto/proyectos.php');         
        }

        public function mis_proyectos()//Del Alumno o Docente
        {    
            $this->load->view('proyecto/mis_proyectos.php');         
        }

        public function proyectos_facultad()
        {
            //Hcer cambio de comicion proyecto aqui 
        }
       
        public function registrar_proyecto()
        {               
            $data= array ( 
                    'eje'=> $this->eje_tematico_model->select($this->fac_id)->result_array(),
                    'semestre'=> $this->semestre_academico_model->Select()->result_array(),
                    'tipo_pro'=> $this->tipo_proyecto_model->MostrarTipoProyecto()->result_array());
            
            $this->load->view('proyecto/registrar_proyecto.php',$data);        
        }
        
        public function elaborar_proyecto($pro_id)
        {   
            //Validar que el proyecto sea del usuario            
            $data= array ('seccion'=> $this->nombre_parte_model->select_seccion()->result_array(),
                          'parte'=> $this->nombre_parte_model->select_parte()->result_array(),
                          'pro_id'=>$pro_id,
                          'tipo' => 'elaborar');
            //echo"<pre>";print_r($data);exit();
            
            $this->load->view('proyecto/formato.php',$data);           
        }

        public function evaluar_proyecto($pro_id)
        {   
            //Validar que el proyecto sea del usuario         
            $data= array ('seccion'=> $this->nombre_parte_model->select_seccion()->result_array(),
                          'parte'=> $this->nombre_parte_model->select_parte()->result_array(),
                          'pro_id'=>$pro_id ,
                          'tipo' => 'evaluar');
            //echo"<pre>";print_r($data);exit();
            
            $this->load->view('proyecto/formato.php',$data);          
        }

        public function mostrar_proyecto($pro_id)
        {   
                 
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

        //--------CARGAR ---------------------//

        public function Guardar_Proyecto()//Guardar Nombre_Proyecto/Parte
        {   
            if($_POST['proyecto_id']==0){
                $data= array ( 'responsable_id'=> $this->input->post('responsable'),
                               'tipo_responsable'=> $this->input->post('tipo_responsable'),
                               'linin_id'=> $this->input->post('linea'),
                               'tipro_id'=> $this->input->post('tipo_proyecto'),
                               'pro_nombre'=> $this->input->post('nombre'),
                               'pro_codigo'=> $this->input->post('codigo'),
                               'sem_id'=> $this->input->post('semestre'),
                               'colaborador'=> $this->input->post('colaborador')
                               );
                $guardar=$this->proyecto_model->insertar_proyecto($data);


            }else if($_POST['proyecto_id']!=0){
                $data= array ( 'pro_id'=> $this->input->post('pro_id'),
                               'nompar_id'=> $this->input->post('nompar_id'),
                               'par_contenido'=> $this->input->post('RichTextEditor'));
                $guardar=$this->proyecto_model->editar_proyecto($data);
            }
            echo $guardar;   
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

        public function cargar_proyectos_facultad()//Poyectos en general de esa 
        {   
           
            $consulta=$this->proyecto_model->select_proyectos_facultad($this->fac_id);        
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());            
            echo json_encode($result);
        }

        public function cargar_mis_proyectos()//Poyectos del alumno o Docente
        {   
            
            $consulta=$this->proyecto_model->select_proyecto_responsable($this->usuario,$this->tipo_usu);        
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());            
            echo json_encode($result);
        }

        public function cargar_proyecto_moderador($modo)//Poyectos del docente en que este asesorando
        {               
            if($modo=='asesor'){
                $consulta=$this->proyecto_model->select_proyecto_asesor($this->usuario);
            }else if($modo=='evaluador'){
                $consulta=$this->proyecto_model->select_proyecto_evaluador($this->usuario);
            }else{
                $consulta= array();
            }                    
            
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
            $consulta=$this->proyecto_model->select_id($pro_id,$this->usuario,$this->tipo_usu);
            //echo "<pre>";            print_r($consulta);exit();
            echo json_encode( $consulta->result());
        } 

              

        public function buscar_colaborador()//Poyecto especifico
        {   
            $dni=$_POST['dni'];
            $consulta=$this->proyecto_model->select_colaborador($dni);
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

