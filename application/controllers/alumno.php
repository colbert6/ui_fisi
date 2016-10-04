<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class alumno extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();        
        }
        
        public function index()
        {   
            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('alumno/index.php');
            $this->load->view('layout/foother.php');            
        }

        

    }
 ?>

