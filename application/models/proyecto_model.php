<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Proyecto_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database('default');              
        }

        function select(){
            //$this->db->where("estado",1);  
            $query=$this->db->get("proyecto");      
            return $query;            
        }

        function select_id($pro_id){
            $this->db->where("pro_id",$pro_id);  
            $query=$this->db->get("proyecto");      
            return $query;            
        }

        function select_asesor($pro_id){
            $sql="SELECT coalesce(doc.doc_nombre||' '||doc.doc_apellido_paterno) as nombre
                    FROM    asesor as ase INNER JOIN docente as doc
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
        
        function editar_nombre($data){
            $datos=array('pro_nombre' => $data['pro_nombre'] );
            $this->db->where("pro_id",$data['pro_id']);
            if($this->db->update('proyecto',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
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
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function editar_parte($data){
            $datos=array('par_contenido' => $data['par_contenido'] );
            $this->db->where("pro_id",$data['pro_id']);
            $this->db->where("par_id",$data['par_id']);
            if($this->db->update('parte',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>