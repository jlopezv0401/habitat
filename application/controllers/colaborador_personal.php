<?php

class Colaborador_personal extends CI_Controller
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
            $crud->set_subject('Datos personales');
            $crud->set_table('Colaborador_Personal');


            $crud->columns('nombre','apaterno','amaterno');
            $crud->fields('nombre','apaterno','amaterno','sexo','edad','direccion','telefono','correo');
            //$crud->set_field_upload('rutaFoto','assets/uploads/fotos');

            $crud->display_as('apaterno','Apellido Paterno');
            $crud->display_as('amaterno','Apellido Materno');
            //$crud->display_as('rutaFoto','Foto del usuario');

            $crud->unset_delete();
            $crud->unset_add_fields();
            $crud->unset_add();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_back_to_list();


            $crud->set_rules('nombre','Nombre','max_length[100]');
            $crud->set_rules('apaterno','Apellido Paterno','max_length[100]');
            $crud->set_rules('amaterno','Apellido Materno','max_length[100]');        

            $output = $crud->render();

            $this->load->view('includes/header');
            $this->load->view('colaborador_personal/index', $output);
            $this->load->view('includes/footer');
            
	}

}

?>