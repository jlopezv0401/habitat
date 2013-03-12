<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gestion extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');     
        $this->load->library('grocery_CRUD');
    }

//###############################################################################################################
//#############  GESTION DE EVENTOS HASTA DINAMICAS   ###########################################################
//###############################################################################################################
    public function evento(){

        // if (!$this->session->userdata('validated') || $this->session->userdata('tipoUsuarioId') != 2) {
        //     redirect('login');
        // } else {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('Evento');
            $crud->set_table('Evento');
            $crud->unset_print();
            $crud->unset_export();

            $crud->columns('nombre','ubicacion','fecha_inicio','fecha_fin');

            $crud->add_action('Participantes','','','',array($this,'funcion_participante'));
            $crud->add_action('Carpas','','','',array($this,'funcion_evento'));

            $crud->fields('nombre','ubicacion','fecha_inicio','fecha_fin');  
            
            $output = $crud->render();
            
            $this->load->view('includes/header');
            $this->load->view('evento/index', $output);
            $this->load->view('includes/footer');
        // }
    }

    function funcion_evento($primary_key , $row){
        return site_url('gestion/carpa') . '?id_evento=' . $primary_key;
    }

    function funcion_participante($primary_key , $row){
        return site_url('participante') . '?id_evento=' . $primary_key;
    }

    public function carpa(){
        // if (!$this->session->userdata('validated') || $this->session->userdata('tipoUsuarioId') != 2) {
        //     redirect('login');
        // } else {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('Carpa');

            // $cadena = $_SERVER['REQUEST_URI'];
            // $lista = explode('/', $cadena);
            // $cuenta = count($lista);
            if ($this->input->get('id_evento')){
                $this->session->set_userdata('id_evento',$this->input->get('id_evento'));
            }   
            $id_evento = $this->session->userdata('id_evento');
            $crud->where('Carpa.id_evento',$id_evento);
            $crud->set_table('Carpa');
            $crud->unset_print();
            $crud->unset_export();

            $crud->columns('id', 'nombre');

            $crud->fields('id_evento','nombre');     
            $crud->change_field_type('id_evento','invisible'); 

            $crud->add_action('Programas','', '', '', array($this,'funcion_carpa'));
            //$crud->set_relation('id_evento', 'Evento', 'nombre');
            $crud->callback_before_insert(array($this,'set_evento_id')); 
            
            $output = $crud->render();
            
            $this->load->view('includes/header');
            $this->load->view('carpa/index', $output);
            $this->load->view('includes/footer');
        // }
    }

    function set_evento_id($post_array){
        $post_array['id_evento'] = $this->session->userdata('id_evento');
        return $post_array;
    }

    function funcion_carpa($primary_key, $row){
        return site_url('gestion/programa') . '?id_carpa=' . $primary_key;
    }

    public function programa(){
        // if (!$this->session->userdata('validated') || $this->session->userdata('tipoUsuarioId') != 2) {
        //     redirect('login');
        // } else {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('Programa');

            if ($this->input->get('id_carpa')){
                $this->session->set_userdata('id_carpa',$this->input->get('id_carpa'));
            }   
            $id_carpa = $this->session->userdata('id_carpa');
            $crud->where('Programa.id_carpa',$id_carpa);

            $crud->set_table('Programa');
            $crud->unset_print();
            $crud->unset_export();

            $crud->columns('id', 'nombre', 'descripcion');

            $crud->add_action('Dinámica','', '', '', array($this, 'funcion_programa'));
            //$crud->set_relation('id_carpa', 'Carpa', 'nombre'); 

            $crud->fields('id_carpa','nombre', 'descripcion');
            $crud->change_field_type('id_carpa','invisible'); 

            $crud->callback_before_insert(array($this,'set_carpa_id'));  

            $output = $crud->render();
            
            $this->load->view('includes/header');
            $this->load->view('programa/index', $output);
            $this->load->view('includes/footer');
        // }
    }

    function set_carpa_id($post_array){
        $post_array['id_carpa'] = $this->session->userdata('id_carpa');
        return $post_array;
    }

    function funcion_programa($primary_key , $row){
        return site_url('gestion/dinamica') . '?id_programa=' . $primary_key;
    }

    // public function area(){
    //     // if (!$this->session->userdata('validated') || $this->session->userdata('tipoUsuarioId') != 2) {
    //     //     redirect('login');
    //     // } else {
    //         $crud = new grocery_CRUD();
    //         $crud->set_theme('datatables');
    //         $crud->set_subject('Área');

    //         if ($this->input->get('id_programa')){
    //             $this->session->set_userdata('id_programa',$this->input->get('id_programa'));
    //         }   
    //         $id_programa = $this->session->userdata('id_programa');
    //         $crud->where('Area.id_programa',$id_programa);

    //         $crud->set_table('Area');
    //         $crud->unset_print();
    //         $crud->unset_export();

    //         $crud->columns('id', 'nombre', 'descripcion');

    //         $crud->add_action('Dinámica','', '', '', array($this, 'funcion_area'));
    //         //$crud->set_relation('id_programa', 'Programa', 'nombre');
    //         $crud->fields('id_programa','nombre', 'descripcion');   
    //         $crud->change_field_type('id_programa','invisible'); 

    //         $crud->callback_before_insert(array($this,'set_programa_id'));   
            
    //         $output = $crud->render();
            
    //         $this->load->view('includes/header');
    //         $this->load->view('area/index', $output);
    //         $this->load->view('includes/footer');
    //     // }
    // }

    // function set_programa_id($post_array){
    //     $post_array['id_programa'] = $this->session->userdata('id_programa');
    //     return $post_array;
    // }

    // function funcion_area($primary_key , $row){
    //     return site_url('gestion/dinamica') . '?id_area=' . $primary_key;
    // }

    public function dinamica(){
        // if (!$this->session->userdata('validated') || $this->session->userdata('tipoUsuarioId') != 2) {
        //     redirect('login');
        // } else {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('Dinámica');

            if ($this->input->get('id_programa')){
                $this->session->set_userdata('id_programa',$this->input->get('id_programa'));
            }   
            $id_programa = $this->session->userdata('id_programa');
            $crud->where('Dinamica.id_programa',$id_programa);

            $crud->set_table('Dinamica');
            $crud->unset_print();
            $crud->unset_export();

            $crud->columns('id', 'nombre', 'descripcion');

            $crud->set_relation('id_programa', 'Programa', 'nombre');
            $crud->set_relation('id_metrica', 'Metrica', 'nombre');
            $crud->set_relation_n_n('colaboradores', 'Dinamica_Colaborador', 'Colaborador', 'id_dinamica', 'id_colaborador', 'usuario', 'lista');
            $crud->set_relation_n_n('paquetes', 'Dinamica_Paquete', 'Paquete', 'id_dinamica', 'id_paquete', 'Nombre', 'lista');

            $crud->fields('id_programa', 'nombre', 'hora_inicio', 'hora_fin', 'id_metrica', 'colaboradores', 'paquetes', 'descripcion'); 
            $crud->change_field_type('id_programa','invisible'); 
            $crud->callback_before_insert(array($this,'set_area_id'));           
            
            $output = $crud->render();
            
            $this->load->view('includes/header');
            $this->load->view('dinamica/index', $output);
            $this->load->view('includes/footer');
        // }
    }

    function set_area_id($post_array){
        $post_array['id_programa'] = $this->session->userdata('id_programa');
        return $post_array;
    }

//###############################################################################################################
//#############  GESTION DE MATERIALES Y PAQUETES  ##############################################################
//###############################################################################################################

    public function material(){
        // if (!$this->session->userdata('validated') || $this->session->userdata('tipoUsuarioId') != 2) {
        //     redirect('login');
        // } else {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('Material');
            $crud->set_table('Material');
            $crud->unset_print();
            $crud->unset_export();

            $crud->columns('id', 'nombre','existencia','descripcion');

            $crud->fields('nombre', 'existencia', 'descripcion');            
            
            $output = $crud->render();
            
            $this->load->view('includes/header');
            $this->load->view('material/index', $output);
            $this->load->view('includes/footer');
        // }
    }

    public function paquete(){
        // if (!$this->session->userdata('validated') || $this->session->userdata('tipoUsuarioId') != 2) {
        //     redirect('login');
        // } else {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('Paquete');
            $crud->set_table('Paquete');
            $crud->columns('id', 'nombre','cantidad');

            $crud->set_relation('id_material', 'Material', 'nombre');

            $crud->fields('nombre', 'id_material', 'cantidad');            
            
            $output = $crud->render();
            
            $this->load->view('includes/header');
            $this->load->view('paquete/index', $output);
            $this->load->view('includes/footer');
        // }
    }

//###############################################################################################################
//#############  GESTION DE COLABORADORES  ######################################################################
//###############################################################################################################

public function colaborador()
    {
        //if(($this->session->userdata("tipoUsuarioId")== 1 || $this->session->userdata("tipoUsuarioId")== 2  ) && $this->session->userdata('validated')){
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('Colaborador');
            $crud->set_table('Colaborador');
            $crud->unset_print();
            $crud->unset_export();

            /*if($this->session->userdata("tipoUsuarioId")== 1){
                $crud->where('usuario.tipoUsuarioId',' 2' );
                $crud->set_relation('tipoUsuarioId','tipo_usuario','tipoUsuario', array('tipoUsuarioId' => '2'));
                
            }
            else{
                $crud->where('usuario.tipoUsuarioId >','2' );
                $crud->set_relation('tipoUsuarioId','tipo_usuario','tipoUsuario', array('tipoUsuarioId >' => '2'));
                
            }*/

            $crud->columns('usuario','tipo_usuario');
            $crud->fields('usuario','password', 'verificar_password', 'tipo_usuario');
            $crud->display_as('tipo_usuario','Tipo de usuario');
    
            $crud->change_field_type('password', 'password');
            $crud->change_field_type('verificar_password', 'password');
            $crud->set_rules('verificar_password', 'Verificar Password', 'required|matches[password]');
            $crud->edit_fields('usuario','password', 'verificar_password');
            //$crud->unset_edit_fields('tipoUsuarioId', 'Tipo de usuario');
            
            //callbacks
            //$crud->callback_before_insert(array($this,'encrypt_password_callback'));
            //$crud->callback_before_update(array($this,'encrypt_password_callback'));
            $crud->callback_edit_field('password',array($this,'decrypt_password_callback'));
            $crud->callback_before_insert(array($this,'unset_verification'));
            $crud->callback_before_update(array($this,'unset_verification'));
            
            $crud->set_rules('usuario','Usuario','required|max_length[100]');
            $crud->set_rules('password','Password','required|min_length[4]');
            $crud->required_fields('tipo_usuario');

            /*if($this->session->userdata("tipoUsuarioId")== 1){                
                $crud->add_action('Contacto','', 'contacto_escuela/index/edit', 'ui-icon-plus');
                $crud->add_action('Domicilio','', 'domicilio_escuela/index/edit', 'ui-icon-plus');
                $crud->add_action('Datos de Escuela','', 'escuela/index/edit', 'ui-icon-plus');
            }
            else{*/
                $crud->add_action('Datos Personales','', 'colaborador_personal/index/edit', 'ui-icon-plus');  
            //}
    
            $output = $crud->render();
            /*if($this->session->userdata("tipoUsuarioId")== 1){
                $this->load->view('includes/header-sa');
            }
            else{
                $this->load->view('includes/header-escuela');
            }*/
            $this->load->view('includes/header');
            $this->load->view('colaborador/index',$output);
            $this->load->view('includes/footer');
        /*}
        else{
            redirect('404');
        }*/
    }

    function encrypt_password_callback($post_array){

        // var_dump($post_array['password']);
        // die();
        $this->load->library('encrypt');
 
        $key = 'k1PAjW3tuHCjewV7p7gFEiHps501b68d';
        $post_array['password'] = $this->encrypt->encode($post_array['password'], $key);

        return $post_array;
    }
 
    function decrypt_password_callback($value)
    {
        $this->load->library('encrypt');

        $key = 'k1PAjW3tuHCjewV7p7gFEiHps501b68d';
        $decrypted_password = $this->encrypt->decode($value, $key);
        return "<input type='password' name='password' value='$decrypted_password' />";
    }

    function unset_verification($post_array) {
           unset($post_array['verificar_password']);
           $this->load->library('encrypt');           
           $post_array['password'] = $this->encrypt->encode($post_array['password']);
           return $post_array;
    }

//###############################################################################################################
//#############  METRICAS E INTERVALOS  #########################################################################
//###############################################################################################################

    public function metrica(){
        // if (!$this->session->userdata('validated') || $this->session->userdata('tipoUsuarioId') != 2) {
        //     redirect('login');
        // } else {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('Métrica');
            $crud->set_table('Metrica');
            $crud->unset_print();
            $crud->unset_export();

            $crud->columns('id','nombre','valor_medir','rango_inicio','rango_fin','no_intervalo');

            $crud->fields('nombre','valor_medir','rango_inicio','rango_fin','no_intervalo');    
            $crud->add_action('Editar Intervalos','', 'intervalo/index', 'ui-icon-plus');          
            
            $output = $crud->render();
            
            $this->load->view('includes/header');
            $this->load->view('metrica/index', $output);
            $this->load->view('includes/footer');
        // }
    }

}	
