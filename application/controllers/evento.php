<?php
class Evento extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('evento_model');
    }
    
<<<<<<< HEAD
    public function index(){
        $data['eventos'] = $this->evento_model->read_evento();
=======
   public function index(){
        $this->load->helper('url');
        $data['eventos'] = $this->evento_model->show_evento();
>>>>>>> f26fcce37ce2538279467184e1f5f0177ecbc92b
        $data['titulo'] = 'Eventos Disponibles';
        
        $this->load->view('includes/header', $data);
        $this->load->view('evento/uno', $data);
        $this->load->view('includes/footer', $data);
    }
    
    public function show_evento(){
<<<<<<< HEAD
        $data['eventos'] = $this->evento_model->read_evento();
=======
        $this->load->helper('url');
        $data['eventos'] = $this->evento_model->show_evento();
>>>>>>> f26fcce37ce2538279467184e1f5f0177ecbc92b
        $data['titulo'] = 'Eventos Disponibles';
        
        $this->load->view('includes/header', $data);
        $this->load->view('evento/show', $data);
        $this->load->view('includes/footer', $data);
    }
    
    public function add_evento(){
<<<<<<< HEAD
=======
        $this->load->helper('url');
>>>>>>> f26fcce37ce2538279467184e1f5f0177ecbc92b
        $data['titulo'] = 'Nuevo Evento';
        
        $this->load->helper('form');
        $this->load->library('form_validation');
    
<<<<<<< HEAD
        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
=======
        $this->form_validation->set_rules('nombre','Nombre','required');
>>>>>>> f26fcce37ce2538279467184e1f5f0177ecbc92b
        $this->form_validation->set_rules('ubicacion','Ubicacion','required');
        $this->form_validation->set_rules('fecha_inicio','Fecha de Inicio','required');
        $this->form_validation->set_rules('fecha_fin','Fecha de fin','required');
        
        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('evento/add', $data);
            $this->load->view('includes/footer', $data);
        }
        else {
<<<<<<< HEAD
            $this->evento_model->create_evento();
            $this->load->view('evento/uno');
        }

    }

    public function edit_evento(){

    }

    public function remove_event(){

=======
            $this->evento_model->add_evento();
            $this->load->view('evento/uno');
        }
>>>>>>> f26fcce37ce2538279467184e1f5f0177ecbc92b
    }
}