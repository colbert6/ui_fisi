<?php
	class tipo_asesor_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function MostrarTipoAsesor(){
            $sql="SELECT * FROM tipo_asesor";
            $query=$this->db->query($sql);
            return $query;
        }

		function Nuevo(){
            $this->db->select_max('tipase_id');
            $query = $this->db->get('tipo_asesor');
            return $query->result();
        }

        function GuardarTipAse($cod,$descrip){
            $data = array(
               'tipase_id' => $cod,
               'tipase_descripcion' => $descrip
            );
            $this->db->insert('tipo_asesor', $data);
        }
	}
?>