<?php
class Intervalo extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('intervalo_model');
    }

    public function index(){
        $boton = $this->input->post('enviar');
        $data['titulo'] = 'Intervalos Disponibles';

        if ($boton == 'agregar'){
            $this->load->view('includes/header', $data);
            $this->load->view('intervalo/add', $data);
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
            $data['intervalos'] = $this->intervalo_model->read_intervalo_esp();

            $this->load->view('includes/header', $data);
            $this->load->view('intervalo/edit', $data);
            $this->load->view('includes/footer', $data);
        }

        elseif ($boton == 'borrar'){
            $data['titulo'] = 'Intervalos';

            if ($this->input->post('id_intervalo')){

                $this->intervalo_model->del_intervalo();
                $data['intervalos'] = $this->intervalo_model->read_intervalo();

                $this->load->view('includes/header', $data);
                $this->load->view('intervalo/index', $data);
                $this->load->view('includes/footer', $data);
            }
        }
        else{
            $data['intervalos'] = $this->intervalo_model->read_intervalo();

            $this->load->view('includes/header', $data);
            $this->load->view('intervalo/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function add(){
        $data['titulo'] = 'Nuevo Intervalo';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('ubicacion','Ubicacion','required');
        $this->form_validation->set_rules('fecha_inicio','Fecha de Inicio','required');
        $this->form_validation->set_rules('fecha_fin','Fecha de fin','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('intervalo/add', $data);
            $this->load->view('includes/footer', $data);
        }
        else {

            $this->intervalo_model->create_intervalo();
            $data['intervalos'] = $this->intervalo_model->read_intervalo();
            $data['titulo'] = 'Intervalos Disponibles';

            redirect('intervalo/index');
            $this->load->view('includes/header', $data);
            $this->load->view('intervalo/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function edit(){
        $data['titulo'] = 'Editar Intervalo';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('intervalo','Intervalo','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('descripcion','Descripcion','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('intervalo/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        else {
            $this->intervalo_model->update_intervalo();
            $data['intervalos'] = $this->intervalo_model->read_intervalo();
            $data['titulo'] = 'Editar Intervalo';

            //redirect('intervalo/index');
            $this->load->view('includes/header', $data);
            $this->load->view('intervalo/index', $data);
            $this->load->view('includes/footer', $data);
        }

    }
}
