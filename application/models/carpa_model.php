<?php
class Carpa_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function create_carpa(){
        $this->load->helper('url');
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'ubicacion' =>  $this->input->post('ubicacion'),
            'fecha_inicio' =>  $this->input->post('fecha_inicio'),
            'fecha_fin' =>  $this->input->post('fecha_fin')
        );

        return $this->db->insert('Carpa', $data);
    }

    public function read_carpa(){
        $carpas = $this->db->get('Carpa');
        return $carpas->result_array();
    }

    public function update_carpa(){
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'ubicacion' =>  $this->input->post('ubicacion'),
            'fecha_inicio' =>  $this->input->post('fecha_inicio'),
            'fecha_fin' =>  $this->input->post('fecha_fin')
        );
        $this->db->where('id', $this->input->post('identifica'));
        return $this->db->update('Carpa', $data);
    }

    public function del_carpa(){
        $this->db->where('id', $this->input->post('identifica'));
        $this->db->delete('Carpa');
    }

    public function read_Carpa_esp(){
        $id=$this->input->post('identifica');
        $carpas = $this->db->get_where('Carpa', array('id' => $id), 1, 0);
        return $carpas->result_array();
    }
}
