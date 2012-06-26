<?php
class Programa_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function create_programa(){
        $this->load->helper('url');
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'id_carpa' => $this->input->post('id_carpa')
        );
        return $this->db->insert('Programa', $data);
    }

    public function read_programa(){
        $id=$this->input->post('id_carpa');
        $programas = $this->db->get_where('Programa', array('id_carpa' => $id));
        return $programas->result_array();
    }

    public function update_programa(){
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'id_carpa' => $this->input->post('id_carpa')
        );
        $this->db->where('id', $this->input->post('id_programa'));
        return $this->db->update('Programa', $data);
    }

    public function del_programa(){
        $this->db->where('id', $this->input->post('id_programa'));
        $this->db->delete('Programa');
    }

    public function read_programa_esp(){
        $id=$this->input->post('id_programa');
        $programas = $this->db->get_where('Programa', array('id' => $id), 1, 0);
        return $programas->result_array();
    }
}
