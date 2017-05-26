<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct() {
      parent::__construct();      
	  $this->load->model('login_model');
	  $this->load->model('menu_model');
	  $this->load->library(array('form_validation'));
	  $this->load->helper(array('form'));
	  //id_tipo  = ( 1. Admin ) ( 2. Director UI ) ( 3. Docente ) ( 4. Docente ) 
   	}

	public function index()
	{	
		/*$data['error'] = $this->session->flashdata('error'); 	
		$this->load->view('login/index.php',$data);	*/	
		if($this->session->userdata('logueado')){
			redirect('uifisi');
		}else{
			$data['token'] = $this->token();
			$this->load->view('login/index.php',$data);
		}		
	}

	public function facultades(){
		$this->load->view('login/facultades/index.php');
	}

	public function indi_investigacion(){
		$this->load->view('login/indi_investigacion.php');
	}

	public function indi_cuantitativos(){
		$this->load->view('login/indi_cuantitativos.php');
	}

	public function fisi(){
		$this->load->view('login/facultades/fisi/index.php');
	}
		public function episi(){
			$this->load->view('login/facultades/fisi/episi.php');
		}

	public function ciencias_economicas(){
		$this->load->view('login/facultades/ciencias_economicas/index.php');
	}
		public function economia(){
			$this->load->view('login/facultades/ciencias_economicas/economia.php');
		}
		public function contabilidad(){
			$this->load->view('login/facultades/ciencias_economicas/contabilidad.php');
		}
		public function administracion(){
			$this->load->view('login/facultades/ciencias_economicas/administracion.php');
		}

	public function new_user()
	{
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
		{
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|max_length[150]|xss_clean');
 
            //lanzamos mensajes de error si es que los hay
            
			if($this->form_validation->run() == FALSE)
			{
				$this->index();
			}else{
				$user = $this->input->post('username');
				$password = $this->input->post('password');

				$check_user = true;

				if(!$this->isAdmin($user,$password) ){
					if(!$this->isDocente($user,$password)){
						if(!$this->isAlumno($user,$password)){
							$check_user = false;
						}
					}
				}
				
				if($check_user) //Si entra algun usuario
				{	
					$this->index();			
				}else{
					$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
					redirect('login','refresh');
				}
				
				
			}
		}else{
			redirect('login');
		}
	}

	function isAdmin($user,$clave){

		if(($user=="admin" and $clave=="123456")){
			$data= array(   'logueado'=> TRUE,
							'id'=> '0',
							'tipo'=> 'Admin',
							'id_tipo'=> '1',
							'codigo'=> '12345678',
							'nombre'=> 'El Admin',
							'correo'=> 'fisi@gmail.com',
							'escuela'=> 'Ingenieria de Sistemas',
							'facultad'=> 'Ingenieria de Sistemas',
							'esc_abreviatura'=> 'EPISI',
							'fac_abreviatura'=> 'FISI',
							'logo_facultad'=> 'admin.png' );

			$this->session->set_userdata($data);
			return TRUE;
		}

		return false;
	}

	public function isDocente($user,$clave){
		$usuario = $this->login_model->logueardocente($user,$clave);

		if(count($usuario) == 1){
			if($usuario[0]['com_funcion']=='UI'){
				$tipo="Director UI";
				$id_tipo="2";
			}else {
				$tipo="Docente";
				$id_tipo="3";
			}

			$data= array(  
					'logueado'=> TRUE,
					'id'=> $usuario[0]['doc_id'],
					'tipo'=> $tipo,
					'id_tipo'=> $id_tipo,
					'codigo'=> $usuario[0]['doc_dni'],
					'nombre'=> $usuario[0]['doc_nombre'].' '.$usuario[0]['doc_apellido_paterno'].' '.$usuario[0]['doc_apellido_materno'],
					'correo'=> $usuario[0]['doc_correo'],
					'escuela'=> $usuario[0]['dep_descripcion'],
					'facultad'=> $usuario[0]['fac_descripcion'],
					'fac_id'=> $usuario[0]['fac_id'],
					'fac_abreviatura'=> $usuario[0]['fac_abreviatura'],
					'logo_facultad'=> $usuario[0]['fac_logo']);

			$this->session->set_userdata($data);
			return TRUE;
		}

	}

	public function isAlumno($user,$clave){
		$usuario = $this->login_model->loguearalumno($user,$clave);

		if(count($usuario) == 1){
			$data= array( 	
					'logueado'=> TRUE,
					'id'=> $usuario[0]['alu_id'],
					'tipo'=> 'Alumno',
					'id_tipo'=> '4',
					'codigo'=> $usuario[0]['alu_codigo'],
					'nombre'=> $usuario[0]['alu_nombre'].' '.$usuario[0]['alu_apellido_paterno'].' '.$usuario[0]['alu_apellido_materno'],
					'correo'=> $usuario[0]['alu_correo'],
					'escuela'=> $usuario[0]['esc_descripcion'],
					'facultad'=> $usuario[0]['fac_descripcion'],
					'fac_id'=> $usuario[0]['fac_id'],
					'fac_abreviatura'=> $usuario[0]['fac_abreviatura'],
					'logo_facultad'=> $usuario[0]['fac_logo']);
			
			$this->session->set_userdata($data);
			return TRUE;
		}
		return false;
	}

	public function buscar_menu()//
    {   
    	$this->load->database('default');
        $tipo_user=$_POST['tipo_user'];
        $consulta=$this->menu_model->menu_usu($tipo_user);
        echo json_encode( $consulta->result_array());
    } 

    public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}	
	
	public function cerrarsession(){
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

}