<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class comision_proyecto extends CI_Controller
{   
    function __construct(){
        parent::__construct();   
    }
        
    public function index(){  
        $this->load->database('default');
        $this->load->model('comision_proyecto_model'); 

        $dato_foother= array ('add_table'=> 'si');


         $query1 = $this->db->query("select count(ce.doc_id) as total , d.doc_nombre
                                    from comision_evaluadora as ce 
                                    inner join docente as d on d.doc_id = ce.doc_id 
                                    group by ce.doc_id , d.doc_nombre order by ce.doc_id");

         $query2 = $this->db->query("select count(p.linin_id) as total ,li.linin_descripcion
                        from proyecto as p 
                        inner join linea_investigacion as li on li.linin_id = p.linin_id 
                        group by p.linin_id , li.linin_descripcion 
                        order by p.linin_id");

         $query3 = $this->db->query("select count(tipro_id) as total, pro_semestre
                                    from proyecto
                                    where tipro_id=1
                                    group by pro_semestre order by pro_semestre");

         $query4 = $this->db->query("select count(tipro_id) as total, pro_semestre as semestre
                                    from proyecto
                                    where tipro_id=2
                                    group by pro_semestre order by pro_semestre");

        $DocentesChart = $query1->result_array();
        $LinInvesChart = $query2->result_array();
        $ProyectoTesis = $query3->result_array();
        $Tesis = $query4->result_array();

        $Proyectos = $this->comision_proyecto_model->MostrarProyectos();
        $ComisionProyecto = $this->comision_proyecto_model->MostrarComisionProyectos();
        $Docentes = $this->comision_proyecto_model->MostrarDocentes();
        $Cargos = $this->comision_proyecto_model->MostrarCargos();
            
        $this->load->view('layout/header.php');
        $this->load->view('layout/menu.php'); 
        $this->load->view('comision_proyecto/index.php',compact("Proyectos","DocentesChart","LinInvesChart","ProyectoTesis","Tesis","Docentes","ComisionProyecto","Cargos"));
        $this->load->view('layout/foother.php',$dato_foother);           
    }

    public function grabardetallecomision(){
        $this->load->database('default');
        $this->load->model('comision_proyecto_model');
        $this->comision_proyecto_model->GrabarDetalle();
        echo json_encode(array("msg"=>"ok"));
    }

    public function ProyectoAsignado(){
        $this->load->database('default');
        $this->load->model('comision_proyecto_model');

        $Proy = $this->comision_proyecto_model->ValidarProyecto($this->input->get("codproyecto"));
        
        if ($Proy == True){
            echo json_decode("1");
        }else{
            echo json_decode("0");
        }    
    }

    public function CargandoProyectosAsignados(){
        $this->load->database('default');
        $this->load->model('comision_proyecto_model');

        $Proyecto= $this->comision_proyecto_model->MostrarProyectosAsignados($this->input->post("cargar"));
            
        echo json_encode($Proyecto); 
    }

    public function CargandoProyectos(){
        $this->load->database('default');
        $this->load->model('comision_proyecto_model');

        $Proyecto= $this->comision_proyecto_model->MostrarProyecto($this->input->post("cargar"));

        echo json_encode($Proyecto); 
    }

    public function CargarPresidente(){
        $this->load->database('default');
        $this->load->model('comision_proyecto_model');

        $Presidente= $this->comision_proyecto_model->MostrarPresidente($this->input->post("cargar"));
        echo json_encode($Proyecto);
    }

    public function Eliminar(){
        $this->load->database('default');
        $this->load->model('comision_proyecto_model');
        
        $client= $this->comision_proyecto_model->ValidarCliente($this->input->post("eliminar"));
    
        if ($client == null) {
            $NuevoCliente= $this->comision_proyecto_model->Eliminar($this->input->post("eliminar"));
            echo "<center> <span class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span> <b> Cliente Eliminado Correctamente </b> </center>";
        }else{
            echo "<center> <span class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span> <b> No Puede Eliminar Este Cliente </b> </center>";
        }   
        
    }

    //GRAFICO PARA MOSTAR PROYECTOS ASIGNADOS A CADA DOCENTE
    public function GraficoProDocentes(){
        $this->load->database('default');

        $query = $this->db->query("select count(ce.doc_id) , d.doc_nombre
from comision_evaluadora as ce 
inner join docente as d on d.doc_id = ce.doc_id 
group by ce.doc_id , d.doc_nombre order by ce.doc_id");

        $narray = array();
        $proyectos = array();
        $Docentes = $query->result_array();

        foreach ($Docentes as $key => $value) {
            $narray[] = $value["doc_id"];
        }

        foreach ($proyectos as $key => $value) {
            
        }

        $envio = array();

        $envio["docente"] = $narray;
        $envio["cantidad"] = $proyectos;

        echo json_encode($envio);
    }

}
?>