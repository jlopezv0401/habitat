<?php
class Colaborador extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('colaborador_model');
    }

    public function index(){
        $boton = $this->input->post('enviar');
        $data['titulo'] = 'Colaboradores Disponibles';

        if ($boton == 'agregar'){
            $data['titulo'] = 'Nuevo Colaborador';
            $data['dinamicas'] = $this->colaborador_model->read_dinamica();
            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/add', $data);
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
            $data['titulo'] = 'Editar Colaborador';
            $data['colaboradores'] = $this->colaborador_model->read_colaborador_esp();

            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'borrar'){
            $data['titulo'] = 'Colaboradores';

            if ($this->input->post('id_colaborador')){

                $this->colaborador_model->del_colaborador();
                $data['colaboradores'] = $this->colaborador_model->read_colaborador();


                $this->load->view('includes/header', $data);
                $this->load->view('colaborador/index', $data);
                $this->load->view('includes/footer', $data);
            }
        }
        else{
            $data['colaboradores'] = $this->colaborador_model->read_colaborador();

            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/index', $data);
            $this->load->view('includes/footer', $data);

            //$data['main_content']='colaborador/index';
            //$this->load->view('layout/template2',$data);
        }
    }

    public function add(){
        $data['titulo'] = 'Nuevo Colaborador';

        $this->load->helper('form');
        $this->load->library('form_validation');

//id INT NOT NULL AUTO_INCREMENT,
//nombre VARCHAR(20) NOT NULL,
//apaterno VARCHAR(15) NOT NULL,
//amaterno VARCHAR (15) NOT NULL,
//sexo ENUM('M','F') NOT NULL,
//estatus BIT NOT NULL,
//edad CHAR(2),
//direccion TEXT,
//telefono VARCHAR(12),
//correo VARCHAR(50),

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('apaterno','Apellido Paterno','required');
        $this->form_validation->set_rules('amaterno','Apellido Materno','required');
        $this->form_validation->set_rules('sexo','Sexo','required');
        $this->form_validation->set_rules('estatus','Estado','required');
        $this->form_validation->set_rules('edad','Edad','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('direccion','Dirección','required');
        $this->form_validation->set_rules('telefono','Teléfono','required');
        $this->form_validation->set_rules('correo','Correo','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/add', $data);
            $this->load->view('includes/footer', $data);
        }
        else {

            $this->colaborador_model->create_colaborador();
            $data['colaboradores'] = $this->colaborador_model->read_colaborador();
            $data['titulo'] = 'Agregar Colaboradores';

            //redirect('colaborador/index');
            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function edit(){
        $data['titulo'] = 'Editar Colaborador';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('ubicacion','Ubicacion','required');
        $this->form_validation->set_rules('fecha_inicio','Fecha de Inicio','required');
        $this->form_validation->set_rules('fecha_fin','Fecha de fin','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        else {
            $this->colaborador_model->update_colaborador();
            $data['colaboradores'] = $this->colaborador_model->read_colaborador();
            $data['titulo'] = 'Editar Colaborador';

            redirect('colaborador/index');
            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/index', $data);
            $this->load->view('includes/footer', $data);
        }

    }
}
