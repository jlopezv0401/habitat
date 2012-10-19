<?php 
class Gestion extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');     
        $this->load->library('grocery_CRUD');
    }

    public function evento(){

        // if (!$this->session->userdata('validated') || $this->session->userdata('tipoUsuarioId') != 2) {
        //     redirect('login');
        // } else {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('evento');
            $crud->set_table('Evento');
            $crud->columns('nombre','ubicacion','fecha_inicio','fecha_fin');

            $crud->add_action('Carpas','','gestion/carpa','',array($this,'funcion_evento'));

            $crud->fields('nombre','ubicacion','fecha_inicio','fecha_fin');  
            
            $output = $crud->render();
            
            $this->load->view('includes/header');
            $this->load->view('evento/index', $output);
            $this->load->view('includes/footer');
        // }
    }

    function funcion_evento($primary_key , $row){
        return site_url('gestion/carpa').'?evento='.$primary_key;
    }

    public function carpa(){
        // if (!$this->session->userdata('validated') || $this->session->userdata('tipoUsuarioId') != 2) {
        //     redirect('login');
        // } else {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('carpa');
            $crud->set_table('Carpa');
            $crud->columns('id_evento', 'nombre');

            $crud->add_action('Programas','', 'gestion/programa', '');
            $crud->callback_before_insert(array($this,'fill_evento'));   

            $crud->fields('nombre');            
            
            $output = $crud->render();
            
            $this->load->view('includes/header');
            $this->load->view('carpa/index', $output);
            $this->load->view('includes/footer');
        // }
    }

    function fill_evento($post_array){
        $post_array['id_evento'] = $_GET['evento'];
        return $post_array;
    }
}	