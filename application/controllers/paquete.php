<?php
class Paquete extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('paquete_model');
    }

    public function index(){
        $boton = $this->input->post('enviar');
        $data['titulo'] = 'Paquetes Disponibles';
        if ($boton == 'agregar'){
            $data['titulo'] = 'Nuevo Paquete';
            $this->load->model('material_model');
            $data['materiales'] = $this->material_model->read_material();
            $this->load->view('includes/header', $data);
            $this->load->view('paquete/add', $data);
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
            $data['titulo'] = 'Editar Paquete';
            $data['paquetes'] = $this->paquete_model->read_paquete_esp();

            $this->load->view('includes/header', $data);
            $this->load->view('paquete/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'borrar'){
            $data['titulo'] = 'Paquetes';

            if ($this->input->post('id_paquete')){

                $this->paquete_model->del_paquete();
                $data['paquetes'] = $this->paquete_model->read_paquete();


                $this->load->view('includes/header', $data);
                $this->load->view('paquete/index', $data);
                $this->load->view('includes/footer', $data);
            }
        }
        else{
            $data['paquetes'] = $this->paquete_model->read_paquete();

            $this->load->view('includes/header', $data);
            $this->load->view('paquete/index', $data);
            $this->load->view('includes/footer', $data);

            //$data['main_content']='paquete/index';
            //$this->load->view('layout/template2',$data);
        }
    }

    public function add(){
        $data['titulo'] = 'Nuevo Paquete';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('cantidad','Cantidad','required|numeric');
        $this->form_validation->set_rules('descripcion','Descripcion','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->model('material_model');
            $data['materiales'] = $this->material_model->read_material();
            $this->load->view('includes/header', $data);
            $this->load->view('paquete/add', $data);
            $this->load->view('includes/footer', $data);
        }
        else {

            $this->paquete_model->create_paquete();
            $data['paquetes'] = $this->paquete_model->read_paquete();
            $data['titulo'] = 'Paquetes Disponibles';

            redirect('paquete/index');
            $this->load->view('includes/header', $data);
            $this->load->view('paquete/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function edit(){
        $data['titulo'] = 'Editar Paquete';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('cantidad','Cantidad','required|numeric');
        $this->form_validation->set_rules('descripcion','Descripcion','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('paquete/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        else {
            $this->paquete_model->update_paquete();
            $data['paquetes'] = $this->paquete_model->read_paquete();
            $data['titulo'] = 'Editar Paquete';

            redirect('paquete/index');
            $this->load->view('includes/header', $data);
            $this->load->view('paquete/index', $data);
            $this->load->view('includes/footer', $data);
        }

    }
}
