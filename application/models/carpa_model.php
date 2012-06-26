<?php
class Carpa_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function create_carpa(){
        $this->load->helper('url');
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'id_evento' => $this->input->post('id_evento')
        );
        return $this->db->insert('Carpa', $data);
    }

    public function read_carpa(){
        $id=$this->input->post('id_evento');
        $carpas = $this->db->get_where('Carpa', array('id_evento' => $id));
        return $carpas->result_array();
    }

    public function update_carpa(){
        $data= array(
            'nombre' =>  $this->input->post('nombre')
        );
        $this->db->where('id', $this->input->post('id_carpa'));
        return $this->db->update('Carpa', $data);
    }

    public function del_carpa(){
        $this->db->where('id', $this->input->post('id_carpa'));
        $this->db->delete('Carpa');
    }

    public function read_Carpa_esp(){
        $id=$this->input->post('id_carpa');
        $carpas = $this->db->get_where('Carpa', array('id' => $id), 1, 0);
        return $carpas->result_array();
    }
}
