<?php
	class dedicacion_docente_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function MostrarDedicacionDocente(){
            $sql="SELECT * FROM dedicacion_docente";
            $query=$this->db->query($sql);
            return $query;
        }

		function Nuevo(){
            $this->db->select_max('ded_id');
            $query = $this->db->get('dedicacion_docente');
            return $query->result();
        }

        function GuardarDeDoc($cod,$descrip){
            $data = array(
               'ded_id' => $cod,
               'ded_descripcion' => $descrip
            );
            $this->db->insert('dedicacion_docente', $data);
        }
	}
?>