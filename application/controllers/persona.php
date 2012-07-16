<?php
class Persona extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('persona_model');
    }


    public function index(){
        $boton = $this->input->post('enviar');
        $data['titulo'] = 'Personas Disponibles';

        if ($boton == 'agregar'){
            $data['titulo'] = 'Nueva Persona';
            $this->load->view('includes/header', $data);
            $this->load->view('persona/add', $data);
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
            $data['titulo'] = 'Editar Persona';
            $data['personas'] = $this->persona_model->read_persona_esp();

            $this->load->view('includes/header', $data);
            $this->load->view('persona/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'borrar'){
            $data['titulo'] = 'Personas';

            if ($this->input->post('id_persona')){

                $this->persona_model->del_persona();
                $data['personas'] = $this->persona_model->read_persona();


                $this->load->view('includes/header', $data);
                $this->load->view('persona/index', $data);
                $this->load->view('includes/footer', $data);
            }
        }
        else{
            $data['personas'] = $this->persona_model->read_persona();

            $this->load->view('includes/header', $data);
            $this->load->view('persona/index', $data);
            $this->load->view('includes/footer', $data);

            //$data['main_content']='persona/index';
            //$this->load->view('layout/template2',$data);
        }
    }

    public function add(){
        $data['titulo'] = 'Nueva Persona';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('ubicacion','Ubicacion','required');
        $this->form_validation->set_rules('fecha_inicio','Fecha de Inicio','required');
        $this->form_validation->set_rules('fecha_fin','Fecha de fin','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('persona/add', $data);
            $this->load->view('includes/footer', $data);
        }
        else {

            $this->persona_model->create_persona();
            $data['personas'] = $this->persona_model->read_persona();
            $data['titulo'] = 'Agregar Personas';

            //redirect('persona/index');
            $this->load->view('includes/header', $data);
            $this->load->view('persona/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function edit(){
        $data['titulo'] = 'Editar Persona';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('ubicacion','Ubicacion','required');
        $this->form_validation->set_rules('fecha_inicio','Fecha de Inicio','required');
        $this->form_validation->set_rules('fecha_fin','Fecha de fin','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('persona/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        else {
            $this->persona_model->update_persona();
            $data['personas'] = $this->persona_model->read_persona();
            $data['titulo'] = 'Editar Persona';

            redirect('persona/index');
            $this->load->view('includes/header', $data);
            $this->load->view('persona/index', $data);
            $this->load->view('includes/footer', $data);
        }

    }
}
