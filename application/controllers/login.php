<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

		//$usuario= $this->login_model->loguear($this->input->post("nombre"),$this->input->post("contra"));

		//if(count($usuario) == 1){			
		if(true){		
			redirect(base_url().'uifisi','refresh');
		}else{
			redirect(base_url(),'refresh');
		}
	}

	public function cerrarsession(){
		redirect(base_url(),'refresh');
	}
}