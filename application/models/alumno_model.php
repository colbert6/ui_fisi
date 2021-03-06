<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Alumno_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database('default');              
        }

        function mostrar_tabla(){
            $sql="SELECT a.alu_id,a.alu_codigo,a.alu_dni,a.alu_sexo,a.alu_fecha_nacimiento,a.alu_correo,a.alu_movil,a.alu_estado_civil,
                        coalesce(a.alu_nombre||' '||a.alu_apellido_paterno||' '||a.alu_apellido_materno)as nombre,e.esc_descripcion,
                        a.ubi_id,coalesce(u.ubi_departamento||' - '||u.ubi_provincia||' - '||u.ubi_distrito)as ubigeo       
                FROM alumno AS a INNER JOIN escuela AS e ON e.esc_id = a.esc_id
                                INNER JOIN ubigeo AS u ON u.ubi_id = a.ubi_id";
            $query=$this->db->query($sql);
            return $query;
        }


    }
?>