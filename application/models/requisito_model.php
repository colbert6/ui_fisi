<?php
	class requisito_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function select_req_pro($pro){
            $sql="SELECT r.*, 
                    ( SELECT rp.estado FROM requisito_proyecto as rp WHERE r.requi_id=rp.requi_id and pro_id=$pro) 
                  FROM requisitos as r ";
            $query=$this->db->query($sql);
            return $query;
        }

        function select_requisitos($tipo_proyecto){ //En base al tipo de Proyecto
        	$this->db->where("tipro_id",$tipo_proyecto);  
            $query = $this->db->get("requisitos");
        	return $query; 
        }

        
	}
?>

