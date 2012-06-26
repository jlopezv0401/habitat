<?php
class Area extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('area_model');
    }


    public function index(){
        $boton = $this->input->post('enviar');
        $data['titulo'] = 'Areas Disponibles';

        if ($boton == 'agregar'){

            $this->load->view('includes/header', $data);
            $this->load->view('area/add', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'ver'){
            $this->load->model('area_model');
            $data['carpas'] = $this->area_model->read_area();
            $data['titulo'] = 'Dinamicas Disponibles';

            $this->load->view('includes/header', $data);
            $this->load->view('area/index', $data);
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
        $data['titulo'] = 'Nueva Area';

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
            $data['titulo'] = 'Areas Disponibles';

            $this->load->view('includes/header', $data);
            $this->load->view('area/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function edit(){
        $data['titulo'] = 'Editar Area';
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
            $data['titulo'] = 'Editar Area';

            $this->load->view('includes/header', $data);
            $this->load->view('area/index', $data);
            $this->load->view('includes/footer', $data);
        }

    }
}
