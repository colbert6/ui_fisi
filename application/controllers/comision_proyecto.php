<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class comision_proyecto extends CI_Controller
{   
    private $fac_id;

    function __construct(){
        parent::__construct(); 
        $this->load->database('default');
        $this->load->model('comision_proyecto_model');
        $this->load->model('proyecto_model');  
        $this->fac_id=$this->session->userdata('fac_id');

    }

    public function index()
    {
        $Proyectos = $this->comision_proyecto_model->MostrarProyectos();
        $ComisionProyecto = $this->comision_proyecto_model->MostrarComisionProyectos();
        $Docentes = $this->comision_proyecto_model->MostrarDocentes();
        $Cargos = $this->comision_proyecto_model->MostrarCargos();

        $this->load->view('comision_proyecto/index.php',compact("Proyectos","Docentes","ComisionProyecto","Cargos"));         
    }


    public function cargar_proyectos()//Poyectos en general
    {   


        $consulta=$this->proyecto_model->select_proyectos_facultad( $this->fac_id);        
        $result= array("draw"=>1,
            "recordsTotal"=>$consulta->num_rows(),
             "recordsFiltered"=>$consulta->num_rows(),
             "data"=>$consulta->result());            
        echo json_encode($result);
    }
    /*----------------*/    
    public function index22(){  
        
$this->load->database('default');
        $this->load->model('comision_proyecto_model'); 
         $query1 = $this->db->query("select count(ce.doc_id) as total, coalesce(d.doc_nombre||' '||d.doc_apellido_paterno) as nombre
                                    from comision_evaluadora as ce 
                                    inner join docente as d on d.doc_id = ce.doc_id 
                                    group by ce.doc_id , d.doc_nombre,d.doc_apellido_paterno order by ce.doc_id");

         $query2 = $this->db->query("select count(p.linin_id) as total ,li.linin_descripcion
                        from proyecto as p 
                        inner join linea_investigacion as li on li.linin_id = p.linin_id 
                        group by p.linin_id , li.linin_descripcion 
                        order by p.linin_id");

         $query3 = $this->db->query("select count(tipro_id) as total, sem_id
                                    from proyecto
                                    where tipro_id=1
                                    group by sem_id order by sem_id");

         $query4 = $this->db->query("select count(tipro_id) as total, sem_id as semestre
                                    from proyecto
                                    where tipro_id=3
                                    group by sem_id order by sem_id");

        $DocentesChart = $query1->result_array();
        $LinInvesChart = $query2->result_array(); 
        $ProyectoTesis = $query3->result_array();
        $Tesis = $query4->result_array();
        $Grafico = $query1->result_array();

        $Proyectos = $this->comision_proyecto_model->MostrarProyectos();
        $ComisionProyecto = $this->comision_proyecto_model->MostrarComisionProyectos();
        $Docentes = $this->comision_proyecto_model->MostrarDocentes();
        $Cargos = $this->comision_proyecto_model->MostrarCargos();
        
        $this->load->view('comision_proyecto/index-copia.php',compact("Proyectos","DocentesChart","LinInvesChart","ProyectoTesis","Tesis","Grafico","Docentes","ComisionProyecto","Cargos"));
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

}
?>
