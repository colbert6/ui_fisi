<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class uifisi extends CI_Controller {

	public function __construct() {
      parent::__construct();
   	}
	public function index()
	{	

		$this->load->view('layout/header.php');
		//$this->load->view('layout/css.php');
		$this->load->view('layout/menu.php');
		$this->load->view('UIfisi/index.php');
		$this->load->view('layout/foother.php');
	}
}