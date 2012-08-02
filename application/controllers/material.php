<?php
class Material extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('material_model');
    }


    public function index(){
        $boton = $this->input->post('enviar');
        $data['titulo'] = 'Materiales Disponibles';
        if ($boton == 'agregar'){
            $data['titulo'] = 'Nuevo Material';
            $this->load->view('includes/header', $data);
            $this->load->view('material/add', $data);
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
            $data['titulo'] = 'Editar Material';
            $data['materiales'] = $this->material_model->read_material_esp();

            $this->load->view('includes/header', $data);
            $this->load->view('material/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'borrar'){
            $data['titulo'] = 'Materials';

            if ($this->input->post('id_material')){

                $this->material_model->del_material();
                $data['materiales'] = $this->material_model->read_material();


                $this->load->view('includes/header', $data);
                $this->load->view('material/index', $data);
                $this->load->view('includes/footer', $data);
            }
        }
        else{
            $data['materiales'] = $this->material_model->read_material();

            $this->load->view('includes/header', $data);
            $this->load->view('material/index', $data);
            $this->load->view('includes/footer', $data);

            //$data['main_content']='material/index';
            //$this->load->view('layout/template2',$data);
        }
    }

    public function add(){
        $data['titulo'] = 'Nuevo Material';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('cantidad','Cantidad','required|numeric');
        $this->form_validation->set_rules('descripcion','Descripcion','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('material/add', $data);
            $this->load->view('includes/footer', $data);
        }
        else {

            $this->material_model->create_material();
            $data['materiales'] = $this->material_model->read_material();
            $data['titulo'] = 'Materiales Disponibles';

            redirect('material/index');
            $this->load->view('includes/header', $data);
            $this->load->view('material/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function edit(){
        $data['titulo'] = 'Editar Material';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('cantidad','Cantidad','required|numeric');
        $this->form_validation->set_rules('descripcion','Descripcion','required');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('material/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        else {
            $this->material_model->update_material();
            $data['materiales'] = $this->material_model->read_material();
            $data['titulo'] = 'Editar Material';

            redirect('material/index');
            $this->load->view('includes/header', $data);
            $this->load->view('material/index', $data);
            $this->load->view('includes/footer', $data);
        }

    }
}
