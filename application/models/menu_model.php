<?php
	class Menu_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function menu_usu($tipo_user){
			$sql="SELECT m.*,p.per_permiso
					FROM menu as m INNER JOIN permiso as p ON m.menu_id=p.menu_id
					WHERE p.tipusu_id=$tipo_user and p.per_permiso=1 
					ORDER BY menu_orden asc ";
			$query=$this->db->query($sql);  
            return $query;    
		}
	}
?>