<?php
class Metrica extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('metrica_model');
    }

    public function index(){
        $boton = $this->input->post('enviar');
        $data['titulo'] = 'Métricas Disponibles';

        if ($boton == 'agregar'){
            $data['titulo'] = 'Nueva Métrica';
            $this->load->view('includes/header', $data);
            $this->load->view('metrica/add', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'ver'){
            $this->load->model('intervalo_model');
            $data['intervalos'] = $this->intervalo_model->read_intervalo();
            $data['titulo'] = 'Intervalo Disponibles';

            $this->load->view('includes/header', $data);
            $this->load->view('intervalo/index', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'editar'){
            $data['titulo'] = 'Editar Métrica';
            $data['metricas'] = $this->metrica_model->read_metrica_esp();

            $this->load->view('includes/header', $data);
            $this->load->view('metrica/edit', $data);
            $this->load->view('includes/footer', $data);
        }
        elseif ($boton == 'borrar'){
            $data['titulo'] = 'Metricas';

            if ($this->input->post('id_metrica')){
                $this->metrica_model->del_metrica();
                $data['metricas'] = $this->metrica_model->read_metrica();

                $this->load->view('includes/header', $data);
                $this->load->view('metrica/index', $data);
                $this->load->view('includes/footer', $data);
            }
        }
        else{
            $data['metricas'] = $this->metrica_model->read_metrica();

            $this->load->view('includes/header', $data);
            $this->load->view('metrica/index', $data);
            $this->load->view('includes/footer', $data);
        }
    }

    public function add(){
        $data['titulo'] = 'Nueva Métrica';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('valor_medir','Valor a medir','required');
        $this->form_validation->set_rules('rango_inicio','Rango Inicial','required|numeric');
        $this->form_validation->set_rules('rango_fin','Rango Final','required|numeric');
        $this->form_validation->set_rules('no_intervalo','Intervalo','required|numeric');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('metrica/add', $data);
            $this->load->view('includes/footer', $data);
        }
        else {

            $this->metrica_model->create_metrica();
            $data['metricas'] = $this->metrica_model->read_metrica();
            $data['titulo'] = 'Métricas Disponibles';

            redirect('metrica/index');
            $this->load->view('includes/header', $data);
            $this->load->view('metrica/index', $data);
            $this->load->view('includes/footer', $data);

        }
    }

    public function edit(){
        $data['titulo'] = 'Editar Métrica';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[50]|alpha_name');
        $this->form_validation->set_rules('valor_medir','Valor a medir','required');
        $this->form_validation->set_rules('rango_inicio','Rango Inicial','required|numeric');
        $this->form_validation->set_rules('rango_fin','Rango Final','required|numeric');
        $this->form_validation->set_rules('no_intervalo','Intervalo','required|numeric');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('metrica/edit', $data);
            $this->load->view('includes/footer', $data);
        }

        else {
            $this->metrica_model->update_metrica();
            $data['metricas'] = $this->metrica_model->read_metrica();
            $data['titulo'] = 'Editar Métrica';

            redirect('metrica/index');
            $this->load->view('includes/header', $data);
            $this->load->view('metrica/index', $data);
            $this->load->view('includes/footer', $data);
        }

    }
}
