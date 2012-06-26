<?php
class Programa extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('programa_model');
    }


    public function index(){
        $boton = $this->input->post('enviar');
        $data['titulo'] = 'Programas Disponibles';

        if ($boton == 'agregar'){

            $this->load->view('includes/header', $data);
            $this->load->view('programa/add', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'ver'){
            $this->load->model('programa_model');
            $data['carpas'] = $this->area_model->read_area();
            $data['titulo'] = 'Areas Disponibles';

            $this->load->view('includes/header', $data);
            $this->load->view('area/index', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'editar'){
            $data['programas'] = $this->programa_model->read_programa_esp();

            $this->load->view('includes/header', $data);
            $this->load->view('programa/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'borrar'){
            $data['titulo'] = 'programas';

            if ($this->input->post('id_programa')){

                $this->programa_model->del_programa();
                $data['programas'] = $this->programa_model->read_programa();

                $this->load->view('includes/header', $data);
                $this->load->view('programa/index', $data);
                $this->load->view('includes/footer', $data);
            }
        }
        else{
            $data['programas'] = $this->programa_model->read_programa();

            $this->load->view('includes/header', $data);
            $this->load->view('programa/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function add(){
        $data['titulo'] = 'Nuevo Programa';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('descripcion','Descripcion','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('programa/add', $data);
            $this->load->view('includes/footer', $data);
        }
        else {

            $this->programa_model->create_programa();
            $data['programas'] = $this->programa_model->read_programa();
            $data['titulo'] = 'Programas Disponibles';

            $this->load->view('includes/header', $data);
            $this->load->view('programa/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function edit(){
        $data['titulo'] = 'Editar Programa';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('descripcion','Descripcion','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('programa/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        else {
            $this->programa_model->update_programa();
            $data['programas'] = $this->programa_model->read_programa();
            $data['titulo'] = 'Editar Programa';

            $this->load->view('includes/header', $data);
            $this->load->view('programa/index', $data);
            $this->load->view('includes/footer', $data);
        }

    }
}
