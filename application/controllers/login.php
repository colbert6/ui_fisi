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

		$tipo = $_POST['opciones'];

		if ($tipo == "docente") {
			$usuario = $this->login_model->logueardocente($this->input->post("nombre"),$this->input->post("contra"));

			if(count($usuario) == 1){			
				if(true){		
					redirect(base_url().'uifisi','refresh');
				}
			}
			else{
				echo "<center> <span aria-hidden='true'></span> <b> El Docente no existe </b> </center>";
				redirect(base_url(),'refresh');
			}
		}

		if ($tipo == "estudiante") {

			$alumno = $this->login_model->loguearalumno($this->input->post("nombre"),$this->input->post("contra"));

			if(count($alumno) == 1){			
				if(true){		
					redirect(base_url().'uifisi','refresh');
				}
			}
			else{
				echo "<center> <span class='modal hide' aria-hidden='true'></span> <b> El Estudiante no existe </b> </center>";
				redirect(base_url(),'refresh');
			}
		}
	}

	public function cerrarsession(){
		redirect(base_url(),'refresh');
	}
}