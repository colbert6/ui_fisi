<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class docente extends CI_Controller
    {   
        function __construct(){
            parent::__construct();        
        }
        
        public function index()
        {   
            $this->load->database('default');
            $this->load->model('docente_model');

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('docente/index.php');
            $this->load->view('layout/foother.php');            
        }

        

    }
 ?>
