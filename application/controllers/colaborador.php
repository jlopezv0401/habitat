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

            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/add', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'ver'){
            $data['titulo'] = 'Asignar Colaborador a Dinámica';
            $data['colaboradores'] = $this->colaborador_model->read_colaborador_esp();
            $data['dinamicas'] = $this->colaborador_model->read_dinamica();

            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/assign', $data);
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


//    id_dinamica INT,
//    nombre VARCHAR(30) NOT NULL,
//    apaterno VARCHAR(25) NOT NULL,
//    amaterno VARCHAR (25) NOT NULL,
//    sexo ENUM('H','M') NOT NULL,
//    estatus BIT NOT NULL,
//    edad CHAR(2),
//    direccion TEXT,
//    telefono VARCHAR(12) NOT NULL,
//    correo VARCHAR(50) NOT NULL,
//    PRIMARY KEY(id),
//    FOREIGN KEY(id_dinamica) REFERENCES Dinamica(id)

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[30]|alpha_name');
        $this->form_validation->set_rules('apaterno','Apellido Paterno','required|max_length[25]|alpha_name');
        $this->form_validation->set_rules('amaterno','Apellido Materno','required|max_length[25]|alpha_name');
        $this->form_validation->set_rules('sexo','Sexo','required');
        $this->form_validation->set_rules('edad','Edad','required|max_length[2]|numeric');
        $this->form_validation->set_rules('direccion','Dirección','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('telefono','Teléfono','required|max_length[12]|numeric');
        $this->form_validation->set_rules('correo','Correo','required|valid_email');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/add', $data);
            $this->load->view('includes/footer', $data);
        }
        else {

            $this->colaborador_model->create_colaborador();
            $data['colaboradores'] = $this->colaborador_model->read_colaborador();
            $data['titulo'] = 'Colaboradores Disponibles';

            redirect('colaborador/index');
            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function edit(){
        $data['titulo'] = 'Editar Colaborador';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[30]|alpha_name');
        $this->form_validation->set_rules('apaterno','Apellido Paterno','required|max_length[25]|alpha_name');
        $this->form_validation->set_rules('amaterno','Apellido Materno','required|max_length[25]|alpha_name');
        $this->form_validation->set_rules('sexo','Sexo','required');
        $this->form_validation->set_rules('edad','Edad','required|max_length[2]|numeric');
        $this->form_validation->set_rules('direccion','Dirección','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('telefono','Teléfono','required|max_length[12]|numeric');
        $this->form_validation->set_rules('correo','Correo','required|valid_email');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        else {
            $this->colaborador_model->update_colaborador();
            $data['colaboradores'] = $this->colaborador_model->read_colaborador();
            $data['titulo'] = 'Colaboradores Disponibles';

            redirect('colaborador/index');
            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function assign(){
        $data['titulo'] = 'Asignar Colaborador a Dinámica';
        $this->load->library('form_validation');

        //$this->form_validation->set_rules('nombre','Nombre','required|max_length[30]|alphoa_name');
        //$this->form_validation->set_rules('id_dinamica','Dinamica','required');
        /*
        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/assign', $data);
            $this->load->view('includes/footer', $data);
        }
        else { */
        if ($this->input->post('id_dinamica')!=NULL) {
            $this->colaborador_model->update_colaborador_dinamica();
            $data['colaboradores'] = $this->colaborador_model->read_colaborador();
            $data['titulo'] = 'Colaboradores Disponibles';

            redirect('colaborador/index');
            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/index', $data);
            $this->load->view('includes/footer', $data);
        }
        else
        {
            $this->colaborador_model->update_colaborador_dinamica_vacio();
            $data['colaboradores'] = $this->colaborador_model->read_colaborador();
            $data['titulo'] = 'Colaboradores Disponibles';

            redirect('colaborador/index');
            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/index', $data);
            $this->load->view('includes/footer', $data);

        }
    }
}
