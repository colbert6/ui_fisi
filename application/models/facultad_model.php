<?php
    class facultad_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        function select(){
            $query=$this->db->get("facultad");      
            return $query;            
        }

        function MostrarFacultad(){
            $sql="SELECT * FROM facultad";
            $query=$this->db->query($sql);
            return $query;
        }

        function Nuevo(){
			$this->db->select_max('fac_id');
			$query = $this->db->get('facultad');
			return $query->result();
		} 

        function Guardar($cod,$descrip,$sira,$abrev,$logo){
            $data = array(
               'fac_id' => $cod,
               'fac_descripcion' => $descrip,
               'fac_codigo_sira' => $sira,
               'fac_abreviatura' => $abrev,
               'fac_logo' => $logo,
               'fac_estado' => 1
            );
            $this->db->insert('facultad', $data);
        }
    }
?>