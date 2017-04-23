<?php
	class fase_comision_model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database('default');
		}

		function MostrarFaseComision(){
            $sql="SELECT * FROM fase_comision";
            $query=$this->db->query($sql);
            return $query;
        }

	}
?>