<?php
include(APPPATH.'libraries/phpqrcode/qrlib.php');

class Participante extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('participante_model');
    }

    public function index(){
        $boton = $this->input->post('enviar');
        $data['titulo'] = 'Participantes Disponibles';
        if ($boton == 'agregar'){
            $data['titulo'] = 'Nuevo Participante';
            $this->load->view('includes/header', $data);
            $this->load->view('participante/add', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'ver'){
            $this->load->model('carpa_model');
            $data['carpas'] = $this->carpa_model->read_carpa();
            $data['titulo'] = 'Carpas Disponibles';

            $this->load->view('includes/header', $data);
            $this->load->view('carpa/index', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'editar'){
            $data['titulo'] = 'Editar Participante';
            $data['participantes'] = $this->participante_model->read_participante_esp();

            $this->load->view('includes/header', $data);
            $this->load->view('participante/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'borrar'){
            $data['titulo'] = 'Participantes';

            if ($this->input->post('id_participante')){

                $this->participante_model->del_participante();
                $data['participantes'] = $this->participante_model->read_participante();


                $this->load->view('includes/header', $data);
                $this->load->view('participante/index', $data);
                $this->load->view('includes/footer', $data);
            }
        }
        else{
            $data['participantes'] = $this->participante_model->read_participante();

            $this->load->view('includes/header', $data);
            $this->load->view('participante/index', $data);
            $this->load->view('includes/footer', $data);

            //$data['main_content']='participante/index';
            //$this->load->view('layout/template2',$data);
        }
    }

    public function add(){
        $data['titulo'] = 'Nuevo Participante';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[30]|alpha_name');
        $this->form_validation->set_rules('apaterno','Apellido Paterno','required|max_length[25]|alpha_name');
        $this->form_validation->set_rules('amaterno','Apellido Materno','required|max_length[25]|alpha_name');
        $this->form_validation->set_rules('sexo','Sexo','required');
        $this->form_validation->set_rules('edad','Edad','required|max_length[2]|numeric');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('participante/add', $data);
            $this->load->view('includes/footer', $data);
        }
        else {

            $this->participante_model->create_participante();
            $data['participantes'] = $this->participante_model->read_participante();
            $data['titulo'] = 'Participantes Disponibles';

            redirect('participante/index');
            $this->load->view('includes/header', $data);
            $this->load->view('participante/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function edit(){
        $data['titulo'] = 'Editar Participante';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[30]|alpha_name');
        $this->form_validation->set_rules('apaterno','Apellido Paterno','required|max_length[25]|alpha_name');
        $this->form_validation->set_rules('amaterno','Apellido Materno','required|max_length[25]|alpha_name');
        $this->form_validation->set_rules('sexo','Sexo','required');
        $this->form_validation->set_rules('edad','Edad','required|max_length[2]|numeric');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('participante/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        else {
            $this->participante_model->update_participante();
            $data['participantes'] = $this->participante_model->read_participante();
            $data['titulo'] = 'Editar Participante';

            redirect('participante/index');
            $this->load->view('includes/header', $data);
            $this->load->view('participante/index', $data);
            $this->load->view('includes/footer', $data);
        }

    }
}
