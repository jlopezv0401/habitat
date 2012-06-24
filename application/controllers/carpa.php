<?php
class Carpa extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('carpa_model');
    }


    public function index(){
        $boton = $this->input->post('enviar');
        $data['titulo'] = 'Carpas Disponibles';

        if ($boton == 'agregar'){
            $this->load->view('includes/header', $data);
            $this->load->view('carpa/add', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'ver'){
            $data['carpas'] = $this->carpa_model->read_carpa();
            $data['titulo'] = 'Carpas Disponibles';

            $this->load->view('includes/header', $data);
            $this->load->view('carpa/index', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'editar'){
            $data['carpas'] = $this->carpa_model->read_carpa_esp();

            $this->load->view('includes/header', $data);
            $this->load->view('carpa/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'borrar'){
            $data['titulo'] = 'Carpas';

            if ($this->input->post('identifica')){

                $this->carpa_model->del_carpa();
                $data['carpas'] = $this->carpa_model->read_carpa();

                $this->load->view('includes/header', $data);
                $this->load->view('carpa/index', $data);
                $this->load->view('includes/footer', $data);
            }
        }
        else{
            $data['carpas'] = $this->carpa_model->read_carpa();

            $this->load->view('includes/header', $data);
            $this->load->view('carpa/index', $data);
            $this->load->view('includes/footer', $data);

        }
    }

    public function add(){
        $data['titulo'] = 'Nuevo Carpa';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('ubicacion','Ubicacion','required');
        $this->form_validation->set_rules('fecha_inicio','Fecha de Inicio','required');
        $this->form_validation->set_rules('fecha_fin','Fecha de fin','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('carpa/add', $data);
            $this->load->view('includes/footer', $data);
        }
        else {

            $this->carpa_model->create_carpa();
            $data['carpas'] = $this->carpa_model->read_carpa();
            $data['titulo'] = 'Carpas Disponibles';

            $this->load->view('includes/header', $data);
            $this->load->view('carpa/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function edit(){
        $data['titulo'] = 'Editar Carpa';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('ubicacion','Ubicacion','required');
        $this->form_validation->set_rules('fecha_inicio','Fecha de Inicio','required');
        $this->form_validation->set_rules('fecha_fin','Fecha de fin','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('carpa/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        else {

            $this->carpa_model->update_carpa();
            $data['carpas'] = $this->carpa_model->read_carpa();

            $this->load->view('includes/header', $data);
            $this->load->view('carpa/index', $data);
            $this->load->view('includes/footer', $data);
        }

    }

}