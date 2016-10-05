<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Alumno_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database('default');    
        }

        function select(){
            //$this->db->where("estado",1);  
            $query=$this->db->get("alumno");      
            return $query;            
        }

        function mostrar_tabla(){
            $sql="SELECT a.alu_id,a.alu_codigo,a.alu_dni,a.alu_sexo,a.alu_fecha_nacimiento,a.alu_correo,a.alu_movil,a.alu_estado_civil,
                        coalesce(a.alu_nombre||' '||a.alu_apellido_paterno||' '||a.alu_apellido_materno)as nombre,
                        e.esc_descripcion,a.ubi_id    
                FROM alumno AS a INNER JOIN escuela AS e
                ON e.esc_id = a.esc_id";
            $query=$this->db->query($sql);
            return $query;
        }

        function select_orden(){
            $this->db->where("estado",1);  
            $this->db->order_by("descripcion", "asc");
            $query=$this->db->get("marca");      
            return $query;            
        }

        function crear($data){
            $datos=array('descripcion' => $data['descripcion'],
                        'abreviatura' => $data['abreviatura'] );
            if($this->db->insert('marca',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array('descripcion' => $data['descripcion'],
                        'abreviatura' => $data['abreviatura'] );
            $this->db->where("id_marca",$data['id']);
            if($this->db->update('marca',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('estado' => 0 );
            $this->db->where("id_marca",$id);
            if($this->db->update('marca',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>