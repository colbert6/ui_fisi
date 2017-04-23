<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class rich_text extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();    
        }
        
        public function editor_text()
        {              

            //$_POST['text']
            $data = array ( 'text' => 'hola');
            $this->load->view('rich_text/editor_text.php');           
        }
       
    }
?>

