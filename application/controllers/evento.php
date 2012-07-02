<?php
class Evento extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('evento_model');
    }


    public function index(){
        $boton = $this->input->post('enviar');
        $data['titulo'] = 'Eventos Disponibles';

        if ($boton == 'agregar'){
            $this->load->view('includes/header', $data);
            $this->load->view('evento/add', $data);
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
            $data['eventos'] = $this->evento_model->read_evento_esp();

            $this->load->view('includes/header', $data);
            $this->load->view('evento/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'borrar'){
            $data['titulo'] = 'Eventos';

            if ($this->input->post('id_evento')){

                $this->evento_model->del_evento();
                $data['eventos'] = $this->evento_model->read_evento();

				
                $this->load->view('includes/header', $data);
                $this->load->view('evento/index', $data);
                $this->load->view('includes/footer', $data);
            }
        }
        else{
            $data['eventos'] = $this->evento_model->read_evento();

            $this->load->view('includes/header', $data);
            $this->load->view('evento/index', $data);
            $this->load->view('includes/footer', $data);
			
			//$data['main_content']='evento/index';
			//$this->load->view('layout/template2',$data);
        }
    }

    public function add(){
        $data['titulo'] = 'Nuevo Evento';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('ubicacion','Ubicacion','required');
        $this->form_validation->set_rules('fecha_inicio','Fecha de Inicio','required');
        $this->form_validation->set_rules('fecha_fin','Fecha de fin','required');
        
        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('evento/add', $data);
            $this->load->view('includes/footer', $data);
        }
        else {

            $this->evento_model->create_evento();
            $data['eventos'] = $this->evento_model->read_evento();
            $data['titulo'] = 'Eventos Disponibles';

            redirect('evento/index');
            $this->load->view('includes/header', $data);
            $this->load->view('evento/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function edit(){
        $data['titulo'] = 'Editar Evento';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('ubicacion','Ubicacion','required');
        $this->form_validation->set_rules('fecha_inicio','Fecha de Inicio','required');
        $this->form_validation->set_rules('fecha_fin','Fecha de fin','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('evento/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        else {
            $this->evento_model->update_evento();
            $data['eventos'] = $this->evento_model->read_evento();
            $data['titulo'] = 'Editar Evento';

            redirect('evento/index');
            $this->load->view('includes/header', $data);
            $this->load->view('evento/index', $data);
            $this->load->view('includes/footer', $data);
        }
        
    }
}
