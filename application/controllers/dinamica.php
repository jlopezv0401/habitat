<?php
class Dinamica extends CI_Controller {

    // id_area INT NOT NULL,
    // id_metrica INT NOT NULL,
    // nombre VARCHAR(50) NOT NULL,
    // hora_inicio TIME NOT NULL,
    // hora_fin TIME NOT NULL,
    // descripcion TEXT,

    public function __construct(){
        parent::__construct();
        $this->load->model('dinamica_model');
    }

    public function index(){
        $boton = $this->input->post('enviar');
        $data['titulo'] = 'Dinámicas Disponibles';

        if ($boton == 'agregar'){
            $data['titulo'] = 'Nueva Dinámica';
            $data['metricas'] = $this->dinamica_model->read_metrica();

            $this->load->view('includes/header', $data);
            $this->load->view('dinamica/add', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'colaborador'){
            $this->load->model('colaborador_model');
            $data['colaboradores'] = $this->colaborador_model->read_colaborador();
            $data['titulo'] = 'Colaboradores Disponibles';

            $this->load->view('includes/header', $data);
            $this->load->view('colaborador/index', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'paquete'){
            $this->load->model('paquete_model');
            $data['paquetes'] = $this->paquete_model->read_paquete();
            $data['titulo'] = 'Paquetes Disponibles';

            $this->load->view('includes/header', $data);
            $this->load->view('paquete/index', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'editar'){
            $data['titulo'] = 'Editar Dinámica';
            $data['dinamicas'] = $this->dinamica_model->read_dinamica_esp();

            $this->load->view('includes/header', $data);
            $this->load->view('dinamica/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'borrar'){
            $data['titulo'] = 'dinamicas';

            if ($this->input->post('id_dinamica')){

                $this->dinamica_model->del_dinamica();
                $data['dinamicas'] = $this->dinamica_model->read_dinamica();

                $this->load->view('includes/header', $data);
                $this->load->view('dinamica/index', $data);
                $this->load->view('includes/footer', $data);
            }
        }
        else{
            $data['dinamicas'] = $this->dinamica_model->read_dinamica();

            $this->load->view('includes/header', $data);
            $this->load->view('dinamica/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function add(){
        $data['titulo'] = 'Nueva Dinámica';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('hora_inicio','Hora Inicio','required');
        $this->form_validation->set_rules('hora_fin','Hora Fin','required');
        $this->form_validation->set_rules('descripcion','Descripción','required');
        $this->form_validation->set_rules('id_metrica','Métrica','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('dinamica/add', $data);
            $this->load->view('includes/footer', $data);
        }
        else {
            $this->dinamica_model->create_dinamica();
            $data['dinamicas'] = $this->dinamica_model->read_dinamica();
            $data['titulo'] = 'Dinámicas Disponibles';

            //redirect('dinamica/index');
            $this->load->view('includes/header', $data);
            $this->load->view('dinamica/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function edit(){
        $data['titulo'] = 'Editar Dinámica';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('descripcion','Descripción','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('dinamica/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        else {
            $this->dinamica_model->update_dinamica();
            $data['dinamicas'] = $this->dinamica_model->read_dinamica();
            $data['titulo'] = 'Editar Dinámica';

            //  redirect('dinamica/index');
            $this->load->view('includes/header', $data);
            $this->load->view('dinamica/index', $data);
            $this->load->view('includes/footer', $data);
        }

    }
}
