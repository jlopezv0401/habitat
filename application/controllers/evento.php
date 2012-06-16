<?php
class Evento extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('evento_model');
    }
    
    public function index(){
        $data['eventos'] = $this->evento_model->read_evento();
        $data['titulo'] = 'Eventos Disponibles';
        
        $this->load->view('includes/header', $data);
        $this->load->view('evento/uno', $data);
        $this->load->view('includes/footer', $data);
    }
    
    public function show_evento(){
        $data['eventos'] = $this->evento_model->read_evento();
        $data['titulo'] = 'Eventos Disponibles';
        
        $this->load->view('includes/header', $data);
        $this->load->view('evento/show', $data);
        $this->load->view('includes/footer', $data);
    }
    
    public function add_evento(){
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
            $this->load->view('evento/uno');
        }

    }

    public function edit_evento(){

    }

    public function remove_event(){

    }
}