<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class docente_model extends CI_Model{
		function __construct(){
			parent::__construct();
		    $this->load->database('default');            
		}

		function select(){             
            $query=$this->db->get("docente");      
            return $query;            
        }

        function mostrar_tabla(){
            $sql="SELECT  d.doc_id,coalesce(d.doc_nombre||' '||d.doc_apellido_paterno||' '||d.doc_apellido_materno) as nombre, ga.grac_descripcion, cd.catdoc_descripcion, de.dep_descripcion,d.doc_correo, dd.ded_descripcion, d.doc_dni,d.doc_telefono,d.doc_direccion,d.doc_sexo,d.doc_fecha_nacimiento,d.doc_fecha_ingreso,d.doc_movil,d.doc_estado_civil,
                        d.ubi_id,coalesce(u.ubi_departamento||' - '||u.ubi_provincia||' - '||u.ubi_distrito) as ubigeo       
                FROM docente AS d 
                INNER JOIN grado_academico AS ga ON ga.grac_id = d.grac_id
                INNER JOIN dedicacion_docente as dd ON dd.ded_id = d.ded_id
                INNER JOIN departamento AS de ON de.dep_id = d.dep_id
                INNER JOIN categoria_docente AS cd ON cd.catdoc_id = d.catdoc_id         
                INNER JOIN ubigeo AS u ON u.ubi_id = d.ubi_id";
            $query=$this->db->query($sql);
            return $query;
        }

	}
?>