<?php
class Area extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('area_model');
    }


    public function index(){
        $boton = $this->input->post('enviar');
        $data['titulo'] = 'Áreas Disponibles';

        if ($boton == 'agregar'){

            $this->load->view('includes/header', $data);
            $this->load->view('area/add', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'ver'){
            $this->load->model('dinamica_model');
            $data['dinamicas'] = $this->dinamica_model->read_dinamica();
            $data['titulo'] = 'Dinámicas Disponibles';

            $this->load->view('includes/header', $data);
            $this->load->view('dinamica/index', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'editar'){
            $data['areas'] = $this->area_model->read_area_esp();

            $this->load->view('includes/header', $data);
            $this->load->view('area/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'borrar'){
            $data['titulo'] = 'areas';

            if ($this->input->post('id_area')){

                $this->area_model->del_area();
                $data['areas'] = $this->area_model->read_area();

                $this->load->view('includes/header', $data);
                $this->load->view('area/index', $data);
                $this->load->view('includes/footer', $data);
            }
        }
        else{
            $data['areas'] = $this->area_model->read_area();

            $this->load->view('includes/header', $data);
            $this->load->view('area/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function add(){
        $data['titulo'] = 'Nueva Área';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('descripcion','Descripcion','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('area/add', $data);
            $this->load->view('includes/footer', $data);
        }
        else {

            $this->area_model->create_area();
            $data['areas'] = $this->area_model->read_area();
            $data['titulo'] = 'Áreas Disponibles';

            redirect('area/index');
            $this->load->view('includes/header', $data);
            $this->load->view('area/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function edit(){
        $data['titulo'] = 'Editar Área';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('descripcion','Descripcion','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('area/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        else {
            $this->area_model->update_area();
            $data['areas'] = $this->area_model->read_area();
            $data['titulo'] = 'Editar Área';

            redirect('area/index');
            $this->load->view('includes/header', $data);
            $this->load->view('area/index', $data);
            $this->load->view('includes/footer', $data);
        }

    }
}
