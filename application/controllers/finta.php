<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class finta extends CI_Controller
    {

        function __construct(){
            parent::__construct();
            $this->load->database('default');
            $this->load->model('nombre_parte_model');
            $this->load->model('finta_model');
        }

        public function index()
        {
            /*echo "<pre>";
            print_r($this->getData());exit;*/
            $dato_foother= array ( 'add_table'=> 'si');

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('finta/index.php');
            $this->load->view('layout/foother.php',$dato_foother);
        }

        public function registrar_finta()
        {
            $dato_foother= array ( 'add_table'=> 'no');
            //$data= array ( 'finta'=> $this->finta_model->select()->result_array());
            //echo"<pre>";print_r($data);exit();

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('finta/registrar.php');
            $this->load->view('layout/foother.php',$dato_foother);
        }

        public function elaborar_word($pro_id=1)
        {
            $this->load->library('PHPWord');

            $PHPWord = new PHPWord();
            $section = $PHPWord->createSection();

            //estilos
            $styleFont1 = array('bold'=>true, 'size'=>18, 'name'=>'Arial');
            $styleFont2 = array('bold'=>true, 'size'=>14, 'name'=>'Arial');
            $styleFont3 = array('bold'=>true, 'size'=>10, 'name'=>'Arial');
            $styleFont4 = array('bold'=>false, 'size'=>16, 'name'=>'Arial');
            $styleFont5 = array('bold'=>true, 'size'=>16, 'name'=>'Arial');
            $styleFont6 = array('bold'=>false, 'size'=>14, 'name'=>'Arial');
            $styleFont7 = array('bold'=>true, 'size'=>12, 'name'=>'Arial');
            $styleFont8 = array('bold'=>false, 'size'=>12, 'name'=>'Arial');


            $styleParagraph = array('align'=>'center', 'spaceAfter'=>100);

            $section->addText(
                      htmlspecialchars(
                        'UNIVERSIDAD NACIONAL DE SAN MARTIN-T'
                      ),
                      $styleFont1, $styleParagraph
                    );
            $section->addTextBreak(1);
            $section->addText(
                      utf8_decode('FACULTAD DE INGENIERÍA DE SISTEMAS E INFORMÁTICA'),
                      $styleFont2, $styleParagraph
                    );

            $section->addTextBreak(1);

            $section->addText(
                      utf8_decode('ESCUELA ACADÉMICO PROFESIONAL DE INGENIERÍA DE SISTEMAS E INFORMÁTICA'),
                      $styleFont3, $styleParagraph
                    );
            $section->addImage('logo_unsm.jpg',array('width'=>230, 'height'=>210, 'align'=>'center'));


            $section->addTextBreak(1);

            $section->addText(
                      utf8_decode('PROYECTO DE TESIS '),
                      $styleFont1, $styleParagraph
                    );

            $proyecto = $this->db->get_where("proyecto",array("pro_id"=>$pro_id,"estado"=>"1"))->row();

            $section->addText(
                      utf8_decode($proyecto->pro_nombre),
                      $styleFont4, $styleParagraph
                    );
            $section->addTextBreak(2);

            $section->addText(
                      utf8_decode('Para optar el Título de:
                       '),
                      $styleFont1, $styleParagraph
                    );
            $section->addText(
                      utf8_decode('Ingeniero de Sistemas
                       '),
                      $styleFont1, $styleParagraph
                    );

            $section->addTextBreak(1);

            $section->addText(
                      utf8_decode('Presentado por el Estudiante'),
                      $styleFont5, $styleParagraph
                    );
            $alumno = $this->db->get_where("alumno",array("alu_id"=>$proyecto->alu_id,"alu_estado"=>"1"))->row();
            $alumno_name = (count($alumno)>0) ? $alumno->alu_nombre." ".$alumno->alu_apellido_paterno." ".$alumno->alu_apellido_materno : "No hay alumno";
            $section->addText(
                      utf8_decode($alumno_name),
                      $styleFont6, $styleParagraph
                    );
            $section->addTextBreak(1);

            $section->addText(
                      utf8_decode('Asesor:'),
                      $styleFont2, $styleParagraph
                    );

            $asesor = $this->db->query("select * from proyecto as p
                inner join asesor as a on(p.pro_id=a.pro_id)
                inner join docente as d on(d.doc_id=a.doc_id)
                where p.pro_id=".$proyecto->pro_id)->row();

            $asesor_name = (count($asesor)>0) ? $asesor->doc_nombre." ".$asesor->doc_apellido_paterno." ".$asesor->doc_apellido_materno : "No hay asesor";

            $section->addText(
                      utf8_decode($asesor_name),
                      $styleFont6, $styleParagraph
                    );

            $section->addTextBreak(2);
            $section->addText(
                      utf8_decode("Tarapoto - Perú"),
                      $styleFont5, $styleParagraph
                    );
            $section->addText(
                      utf8_decode("2016"),
                      $styleFont5, $styleParagraph
                    );

            $section->addTextBreak(1);
            $data = $this->getData();
            foreach ($data as $title) {
                $section->addText(
                      utf8_decode($title["nompar_descripcion"]),
                      $styleFont5
                    );

                foreach ($title["subs"] as $sub) {
                    $section->addText(
                          utf8_decode($sub["nompar_descripcion"]),
                          $styleFont7
                        );
                    $content_sub = $this->get_parte($sub["nompar_id"]);

                    if(count($content_sub)>0) {
                        $par_sub = strip_tags($content_sub->par_contenido);
                        $par_sub = str_replace("&nbsp;","", $par_sub );
                        //$par_sub = str_replace("·","<br>\n\n\n\n\n\n\n\n\n\n ·", $par_sub );

                        $section->addText(
                          utf8_decode($par_sub),
                          $styleFont8
                        );
                    }
                    $section->addTextBreak(1);
                    if(isset($sub["sub_subs"]) && count($sub["sub_subs"])>0) {

                        foreach ($sub["sub_subs"] as $sub_sub) {
                            $section->addText(
                                  utf8_decode($sub_sub["nompar_descripcion"]),
                                  $styleFont8
                                );
                            $content_subsub = $this->get_parte($sub_sub["nompar_id"]);

                            if(count($content_subsub)>0) {
                                $par_subsub = strip_tags($content_subsub->par_contenido);
                                $par_subsub = str_replace("&nbsp;","", $par_subsub );
                                //$par_subsub = str_replace("·","<br>\n\n\n\n\n\n\n\n\n\n ·", $par_subsub );
                                $section->addText(
                                  utf8_decode($par_subsub),
                                  $styleFont8
                                );
                            }
                            $section->addTextBreak(1);
                        }
                    }
                }
            }


            // Save File
            $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');

            $_proyecto = trim($proyecto->pro_nombre);
            $_proyecto = str_replace(" ", "_", $_proyecto);
            $_proyecto = str_replace('"', " ", $_proyecto);
            $objWriter->save('./words/'.$_proyecto.'.docx');

            chmod('./words/'.$_proyecto.'.docx', 0777);

            header("Content-Disposition: attachment; filename='".$_proyecto.".docx'");
            echo file_get_contents('./words/'.$_proyecto.'.docx');

        }

     /*   public function download_word($proyecto) {

            $proyecto = str_replace("%20", "", $proyecto);
            $file = $proyecto.'.docx';

            $filename = $proyecto.'.docx';
            if(file_exists($file)) {
                header("Content-type: application/octet-stream");
                header("Content-Type: application/force-download");
                header("Content-Disposition: attachment; filename=$filename");
                header("Content-Transfer-Encoding: binary");
                header ("Content-Length: ".filesize($file));
                readfile($file);
            } else {
                echo "no existe el archivo";
            }

        }*/

        public function getData() {
            $array = $this->db->query("select * from nombre_parte WHERE parent_nompar_id is null")->result_array();

            foreach ($array as $key_title => $title) {
                $subs = $this->db->get_where("nombre_parte",array("parent_nompar_id"=>$title["nompar_id"]))->result_array();

                $array[$key_title]["subs"] = $subs;


            }

            foreach ($array as $key_title => $title) {
                foreach ($title["subs"] as $key_sub => $sub) {
                    $sub_subs = $this->db->get_where("nombre_parte",array("parent_nompar_id"=>$sub["nompar_id"]))->result_array();

                    if(count($sub_subs)>0) {
                        $array[$key_title]["subs"][$key_sub]["sub_subs"] = $sub_subs;
                    }

                }

            }
            return $array;
        }

        public function get_parte($id) {
            return $this->db->get_where("parte",array("nompar_id"=>$id))->row();
        }

        public function revisar_finta($pro_id=1)
        {
            //Validar que el finta sea del usuario
            $dato_foother= array ( 'js'=>array ('revisar') );
            $data= array ('seccion'=> $this->nombre_parte_model->select_seccion()->result_array(),
                          'parte'=> $this->nombre_parte_model->select_parte()->result_array(),
                          'pro_id'=>$pro_id );
            //echo"<pre>";print_r($data);exit();

            $this->load->view('layout/header.php');
            $this->load->view('layout/menu.php');
            $this->load->view('finta/formato.php',$data);
            $this->load->view('layout/foother.php',$dato_foother);
        }

        public function finta_word()//Criterio en general
        {
            $data= array ('seccion'=> $this->nombre_parte_model->select_seccion()->result_array(),
                          'parte'=> $this->nombre_parte_model->select_parte()->result_array() );
            $this->load->view('finta/finta_word.php',$data);
            //sleep(10);
            // $this->load->view('finta/header_word.php',$data);
        }

        public function guardar()
        {
            if($_POST['id_campo']=='pro_nombre'){//editar el nombre del finta
                $data= array ( 'pro_id'=> $this->input->post('pro_id'),
                                'pro_nombre'=> $this->input->post('valor'));
                $guardar=$this->finta_model->editar_nombre($data);
            }
            if($_POST['id_campo']=='asesor'){//Registrar Asesor
                $data= array ( 'pro_id'=> $this->input->post('pro_id'),
                                'doc_id'=> $this->input->post('valor'));
                $guardar=$this->finta_model->insertar_asesor($data);
            }
            if($_POST['id_campo']!='asesor' and $_POST['id_campo']!='pro_nombre'){//Registrar Asesor
                if($_POST['par_id']==0){
                    $data= array ( 'pro_id'=> $this->input->post('pro_id'),
                                    'nompar_id'=> $this->input->post('id_campo'),
                                    'par_contenido'=> $this->input->post('valor'));
                    $guardar=$this->finta_model->insertar_parte($data);

                }else if($_POST['par_id']!=0){
                    $data= array ( 'pro_id'=> $this->input->post('pro_id'),
                                    'par_id'=> $this->input->post('par_id'),
                                    'par_contenido'=> $this->input->post('valor'));
                    $guardar=$this->finta_model->editar_parte($data);
                }
            }
            echo json_encode($guardar);

        }

        public function guardar_evaluacion()
        {
            $data= array ( 'pro_id'=> $this->input->post('pro_id'),
                                'doc_id'=> $this->input->post('doc_id'),
                                'crit_id'=> $this->input->post('crit_id'),
                                'par_id'=> $this->input->post('par_id'),
                                'obs'=> $this->input->post('obs'),
                                'nota'=> $this->input->post('nota'));
            if($_POST['insert']==1){//editar el nombre del finta
                $guardar=$this->finta_model->editar_evaluacion($data);
            }else{
                $guardar=$this->finta_model->insertar_evaluacion($data);
            }


            echo json_encode($guardar);

        }

        public function cargar_fintas_alumno($alu_id)//Poyecto especifico
        {
            $consulta=$this->finta_model->select_finta_alumno($alu_id);

            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());

            echo json_encode($result);
        }

        public function buscar_finta()//Poyecto especifico
        {
            $pro_id=$_POST['pro_id'];
            $consulta=$this->finta_model->select_id($pro_id);
            //echo "<pre>";            print_r($consulta);exit();
            echo json_encode( $consulta->result());
        }

        public function buscar_asesor()//Poyecto especifico
        {
            $pro_id=$_POST['pro_id'];
            $consulta=$this->finta_model->select_asesor($pro_id);
            //echo "<pre>";            print_r($consulta);exit();
            echo json_encode( $consulta->result());
        }

        public function buscar_parte()//Poyecto especifico
        {
            $pro_id=$_POST['pro_id'];
            $consulta=$this->finta_model->select_parte($pro_id);
            //echo "<pre>";            print_r($consulta);exit();
            echo json_encode( $consulta->result());
        }

        public function buscar_nombre_parte_criterio()//Criterio en general
        {
            $data= array ( 'nompar_id'=> $this->input->post('nompar_id'));
            $consulta=$this->nombre_parte_model->select_criterio($data);
            //echo "<pre>";            print_r($consulta);exit();
            echo json_encode( $consulta->result());
        }

        public function buscar_evaluacion()//Criterio en general
        {
            $data= array ( 'nompar'=> $this->input->post('nompar'),
                            'pro'=> $this->input->post('pro'),
                            'doc'=> $this->input->post('doc'),
                            'part'=> $this->input->post('part'));
            $consulta=$this->finta_model->select_evaluacion($data);
            //echo "<pre>";            print_r($consulta->result());exit();
            echo json_encode( $consulta->result());
        }



    }
 ?>

