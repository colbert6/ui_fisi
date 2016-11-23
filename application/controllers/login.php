<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct() {
      parent::__construct();      
	  $this->load->model('login_model');
	  $this->load->model('menu_model');
   	}

	public function index()
	{
		

		$data['error'] = $this->session->flashdata('error'); 	
		$this->load->view('login/index.php',$data);
		
		/*$this->load->model('login_model');
		$usuario = $this->login_model->logueardocente('12345678','12345');
		echo "<pre>";
		print_r($usuario);exit();*/
		
	}

	public function ingresar()
	{
		$this->load->database('default');
		$logueado = false;
		$user=$this->input->post("email");
		$clave=$this->input->post("contra");

		#print_r($_POST); exit;
		if(($user=="admin" and $clave=="1234") and !$logueado){
			$data= array(   'id'=> '0',
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
			$logueado=true;
		}

		if(!$logueado){
			$usuario = $this->login_model->logueardocente($user,$clave);

			if(count($usuario) == 1){
				if($usuario[0]['com_funcion']=='Encargado'){
					$tipo="Director UI";
					$id_tipo="2";
				}else {
					$tipo="Docente";
					$id_tipo="3";
				}

				$data= array(  'id'=> $usuario[0]['doc_id'],
						'tipo'=> $tipo,
						'id_tipo'=> $id_tipo,
						'codigo'=> $usuario[0]['doc_dni'],
						'nombre'=> $usuario[0]['doc_nombre'].' '.$usuario[0]['doc_apellido_paterno'].' '.$usuario[0]['doc_apellido_materno'],
						'correo'=> $usuario[0]['doc_correo'],
						'escuela'=> $usuario[0]['dep_descripcion'],
						'facultad'=> $usuario[0]['fac_descripcion'],
						'fac_abreviatura'=> $usuario[0]['fac_abreviatura'],
						'logo_facultad'=> $usuario[0]['fac_logo']);

				$logueado=true;
			}

		}

		if(!$logueado){
			$usuario = $this->login_model->loguearalumno($user,$clave);

			if(count($usuario) == 1){
				$data= array( 	'id'=> $usuario[0]['alu_id'],
						'tipo'=> 'Alumno',
						'id_tipo'=> '4',
						'codigo'=> $usuario[0]['alu_codigo'],
						'nombre'=> $usuario[0]['alu_nombre'].' '.$usuario[0]['alu_apellido_paterno'].' '.$usuario[0]['alu_apellido_materno'],
						'correo'=> $usuario[0]['alu_correo'],
						'escuela'=> $usuario[0]['esc_descripcion'],
						'facultad'=> $usuario[0]['fac_descripcion'],
						'fac_abreviatura'=> $usuario[0]['fac_abreviatura'],
						'logo_facultad'=> $usuario[0]['fac_logo']);
				$logueado=true;
			}

		}

		if($logueado){
			$this->session->set_userdata($data);
			redirect(base_url().'uifisi','refresh');
		}else{
			$this->session->set_flashdata('error','El usuario o la contraseña son incorrectos.');
			redirect(base_url(),'refresh');

		}

	}
	public function buscar_menu()//
        {   
        	$this->load->database('default');
            $tipo_user=$_POST['tipo_user'];
            $consulta=$this->menu_model->menu_usu($tipo_user);
            echo json_encode( $consulta->result_array());
        } 

	public function cerrarsession(){
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}

}