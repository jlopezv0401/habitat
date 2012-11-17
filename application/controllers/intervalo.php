<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intervalo extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }

    public function index()
    {
      
        $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_subject('Intervalo');
            $cadena = $_SERVER['REQUEST_URI'];
            $lista = explode('/', $cadena);
            $cuenta = count($lista);
            $crud->where('Intervalo.id_metrica',$lista[$cuenta-1]);
            $crud->set_table('Intervalo');

            $crud->columns('intervalo','descripcion');
            $crud->fields('intervalo','descripcion');

            $crud->unset_delete();
            $crud->unset_edit_fields('id_metrica');
            $crud->unset_add();
            $crud->unset_export();
            $crud->unset_print();
            //$crud->unset_back_to_list();


            $crud->set_rules('intervalo','Intervalo','max_length[100]');       

            $output = $crud->render();

            $this->load->view('includes/header');
            $this->load->view('intervalo/index', $output);
            $this->load->view('includes/footer');
            
    }

}

?>