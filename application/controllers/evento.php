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
        $this->load->view('evento/show', $data);
        $this->load->view('includes/footer', $data);
    }
    

    public function show(){
        $this->load->helper('form');
        $boton = $this->input->post('submit');
        $data['titulo'] = 'Eventos Disponibles';

        if ($boton == 'ver'){
            $this->load->view('includes/header', $data);
            $this->load->view('evento/uno', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'editar'){
            $this->load->view('includes/header', $data);
            $this->load->view('evento/show', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'borrar'){
            $this->evento_model->del_evento();

            $data['eventos'] = $this->evento_model->read_evento();

            $this->load->view('includes/header', $data);
            $this->load->view('evento/show', $data);
            $this->load->view('includes/footer', $data);
        }
        else{
            $data['eventos'] = $this->evento_model->read_evento();

            $this->load->view('includes/header', $data);
            $this->load->view('evento/show', $data);
            $this->load->view('includes/footer', $data);
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
            
            $this->load->view('includes/header', $data);
            $this->load->view('evento/show', $data);
            $this->load->view('includes/footer', $data);
    }

    public function edit(){

    }

    public function remove(){
        $this->evento_model->add_evento();
        $data['eventos'] = $this->evento_model->read_evento();
        $data['titulo'] = 'Eventos Disponibles';
        
        $this->load->view('includes/header', $data);
        $this->load->view('evento/show', $data);
        $this->load->view('includes/footer', $data);
        
    }

}
