<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Participante extends CI_Controller
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
            $crud->set_subject('Participantes');

            if ($this->input->get('id_evento')){
                $this->session->set_userdata('id_evento',$this->input->get('id_evento'));
            }   
            $id_area = $this->session->userdata('id_evento');
            $crud->where('Participante.id_evento',$id_area);

            $crud->set_table('Participante');
            $crud->unset_export();
            $crud->unset_print();

            $crud->columns('nombre','apaterno','amaterno');
            $crud->fields('id_evento','nombre','apaterno','amaterno','sexo','edad','telefono','correo');
   
            $crud->change_field_type('id_evento','invisible'); 
            $crud->add_action('Imprimir QR','', '', 'ui-icon-plus', array($this, 'print_qr_code'));          

            $crud->callback_before_insert(array($this,'set_evento_id'));        
            $crud->callback_after_insert(array($this,'print_qr_code')); 
            $output = $crud->render();

            $this->load->view('includes/header');
            $this->load->view('participante/index', $output);
            $this->load->view('includes/footer');
            
    }

    function set_evento_id($post_array){
        $post_array['id_evento'] = $this->session->userdata('id_evento');
        return $post_array;
    }

    function print_qr_code($post_array){
        $this->load->library('ciqrcode');

        $params['data'] = 'This is a text to encode become QR Code';
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH.'tes.png';
        $this->ciqrcode->generate($params);

        echo '<img src="'.base_url().'tes.png" />';
        return $post_array;
    }

}

?>