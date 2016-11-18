<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class login extends CI_Controller {

	public function index()
	{
		$this->load->database('default');
		$this->load->view('login/index.php');
	}

	public function ingresar()
	{
		$this->load->database('default');
		$this->load->model('login_model');
		#print_r($_POST); exit;
		$usuario = $this->login_model->logueardocente($this->input->post("email"),$this->input->post("contra"));

		if(count($usuario) == 1){
			if(true){
				$_SESSION['email']=$usuario[0]['doc_correo'];
				$_SESSION['usuario']=$usuario[0]['doc_nombre'].' '.$usuario[0]['doc_apellido_paterno'].' '.$usuario[0]['doc_apellido_materno'];
				$_SESSION['codusuario']=$usuario[0]['doc_id'];
	            $_SESSION['codtipousuario'] = $usuario[0]['tipusu_id'];
				redirect(base_url().'uifisi','refresh');
			}
		}
		else
		{	$usuario = $this->login_model->loguearalumno($this->input->post("email"),$this->input->post("contra"));

			if(count($usuario) == 1){
				if(true){
					$_SESSION['email']=$usuario[0]['alu_correo'];
					$_SESSION['usuario']=$usuario[0]['alu_nombre'].' '.$usuario[0]['alu_apellido_paterno'].' '.$usuario[0]['alu_apellido_materno'];
					$_SESSION['codusuario']=$usuario[0]['alu_id'];
		            $_SESSION['codtipousuario'] = $usuario[0]['tipusu_id'];
					redirect(base_url().'uifisi','refresh');
				}
			}
			else{
				echo "<center> <span class='modal hide' aria-hidden='true'></span> <b> El Usuario no existe </b> </center>";
				redirect(base_url(),'refresh');
			}

		}
	}

	public function cerrarsession(){
		session_destroy();
		redirect(base_url(),'refresh');
	}
}