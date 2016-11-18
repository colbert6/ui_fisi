<?php
	class fase_comision_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function MostrarFaseComision(){
            $sql="SELECT * FROM fase_comision";
            $query=$this->db->query($sql);
            return $query;
        }

        function Nuevo(){
			$this->db->select_max('fascom_id');
			$query = $this->db->get('fase_comision');
			return $query->result();
		}

		function InsertarFasCom($cod,$descrip,$plaz){
			$data = array(
               'fascom_id' => $cod,
               'fascom_descripcion' => $descrip,
               'fascom_plazo' => $plaz
            );
			$this->db->insert('fase_comision', $data);
		}
	}
?>