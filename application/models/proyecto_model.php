<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Proyecto_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database('default');              
        }

        function select_proyectos(){
             $sql="SELECT P.*,coalesce(a.alu_nombre||' '||a.alu_apellido_paterno) as alu_nombres,e.*,tp.tipro_descripcion,l.linin_descripcion
       FROM tipo_proyecto as tp INNER JOIN proyecto as p ON tp.tipro_id=p.tipro_id INNER JOIN alumno as a ON p.alu_id=a.alu_id 
       INNER JOIN escuela as e ON e.esc_id=a.esc_id INNER JOIN linea_investigacion as l ON l.linin_id=p.linin_id ";
            $query=$this->db->query($sql);  
            return $query;         
        }

        function select_proyecto_alumno($id){
            $this->db->where("alu_id",$id);  
            $query=$this->db->get("proyecto");      
            return $query;            
        }

        function select_proyecto_asesor($id){
            $sql="SELECT p.*
                  FROM proyecto p, asesor a
                  WHERE a.pro_id=p.pro_id and a.doc_id=$id";
            $query=$this->db->query($sql);  
            return $query;            
        }

        function select_proyecto_evaluador($id){
            $sql="SELECT p.*
                  FROM proyecto p, comision_evaluadora ce
                  WHERE ce.pro_id=p.pro_id and ce.doc_id=$id";
            $query=$this->db->query($sql);  
            return $query;            
        }

        function select_id($pro_id){
            $sql="SELECT p.*,coalesce(a.alu_nombre||' '||a.alu_apellido_paterno||' '||a.alu_apellido_materno) as alu_nombres,e.*,tp.tipro_descripcion,l.linin_descripcion,f.*,extract(year from pro_fecha_registro) as fecha
           FROM tipo_proyecto as tp INNER JOIN proyecto as p ON tp.tipro_id=p.tipro_id INNER JOIN alumno as a ON p.alu_id=a.alu_id 
           INNER JOIN escuela as e ON e.esc_id=a.esc_id INNER JOIN linea_investigacion as l ON l.linin_id=p.linin_id INNER JOIN facultad as f ON f.fac_id=e.fac_id 
           WHERE p.pro_id=$pro_id";
            $query=$this->db->query($sql);  
            return $query;  
        }

        function select_asesor($pro_id){
            $sql="SELECT coalesce(doc.doc_nombre||' '||doc.doc_apellido_paterno) as nombre , ase.ase_confirmado, ase.ase_designado
                    FROM  asesor as ase INNER JOIN docente as doc
                        ON ase.doc_id=doc.doc_id 
                    WHERE ase.pro_id=$pro_id";
            $query=$this->db->query($sql);  
            return $query;            
        }

        function select_parte($pro_id){
            $sql="SELECT par_id,nompar_id,par_contenido 
                    FROM parte 
                    WHERE pro_id=$pro_id";
            $query=$this->db->query($sql);  
            return $query;            
        }

        function select_parte_id($pro_id,$nompar_id){
            $sql="SELECT par_id,nompar_id,par_contenido 
                    FROM parte 
                    WHERE pro_id=$pro_id and nompar_id=$nompar_id";
            $query=$this->db->query($sql);  
            return $query;            
        }

        function select_evaluacion($data){
            $pro=$data['pro'];
            $doc=$data['doc'];
            $part=$data['part'];
            $nompar=$data['nompar'];

            $sql="SELECT c.* ,
                (SELECT e.eva_puntaje 
                    FROM evaluacion e 
                    WHERE c.crit_id=e.crit_id and e.pro_id=$pro and e.doc_id=$doc and e.par_id=$part),
                (SELECT e.eva_observacion 
                    FROM evaluacion e 
                    WHERE c.crit_id=e.crit_id and e.pro_id=$pro and e.doc_id=$doc and e.par_id=$part)
                FROM criterio c
                WHERE c.nompar_id=$nompar 
                ORDER BY c.cri_rango_min desc";
            $query=$this->db->query($sql);  
            return $query;            
        }
        
        function editar_nombre($data){
            $datos=array('pro_nombre' => $data['pro_nombre'] );
            $this->db->where("pro_id",$data['pro_id']);
            if($this->db->update('proyecto',$datos)){
                 $query='M';
            }else{
                 $query='Error';
            }
            return $query;
        }

        function insertar_asesor($data){
            $datos=array('pro_id' => $data['pro_id'],
                         "doc_id" =>$data['doc_id'],
                         "tipase_id" =>1,
                         "ase_fecha_designacion" =>date("d-m-Y"));
            if($this->db->insert('asesor',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }     

        function insertar_parte($data){
            $datos=array('pro_id' => $data['pro_id'],
                         "nompar_id" =>$data['nompar_id'],
                         "par_contenido" =>$data['par_contenido']);
            if($this->db->insert('parte',$datos)){
                 $query="I";
            }else{
                 $query="Error";
            }
            return $query;
        }

        function editar_parte($data){
            $datos=array('par_contenido' => $data['par_contenido'] );
            $this->db->where("pro_id",$data['pro_id']);
            $this->db->where("nompar_id",$data['nompar_id']);
            if($this->db->update('parte',$datos)){
                 $query="M";
            }else{
                 $query="Error";
            }
            return $query;
        }

        function insertar_evaluacion($data){
            $datos=array('pro_id' => $data['pro_id'],
                        'par_id' => $data['par_id'],
                        'doc_id' => $data['doc_id'],
                        'crit_id' => $data['crit_id'],
                        'eva_puntaje' => $data['nota'],
                        'eva_observacion' => $data['obs'],
                        'eva_fecha_evaluacion' => date("d-m-Y"));
            if($this->db->insert('evaluacion',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function editar_evaluacion($data){
            
            $datos=array('crit_id' => $data['crit_id'],
                        'eva_puntaje' => $data['nota'],
                        'eva_observacion' => $data['obs'],
                        'eva_fecha_evaluacion' => date("d-m-Y") );
            $this->db->where("pro_id",$data['pro_id']);
            $this->db->where("doc_id",$data['doc_id']);
            $this->db->where("par_id",$data['par_id']);
            if($this->db->update('evaluacion',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }


    }
?>