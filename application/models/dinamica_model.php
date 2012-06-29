<?php
class Dinamica_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function create_dinamica(){
        $this->load->helper('url');
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'id_dinamica' => $this->input->post('id_dinamica')
        );
        return $this->db->insert('Dinamica', $data);
    }

    public function read_dinamica(){
        $id=$this->input->post('id_dinamica');
        $dinamicas = $this->db->get_where('Dinamica', array('id' => $id));
        return $dinamicas->result_array();
    }

    public function update_dinamica(){
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'id_dinamica' => $this->input->post('id_dinamica')
        );
        $this->db->where('id', $this->input->post('id_dinamica'));
        return $this->db->update('Dinamica', $data);
    }

    public function del_dinamica(){
        $this->db->where('id', $this->input->post('id_dinamica'));
        $this->db->delete('Dinamica');
    }

    public function read_dinamica_esp(){
        $id=$this->input->post('id_dinamica');
        $dinamicas = $this->db->get_where('Dinamica', array('id' => $id), 1, 0);
        return $dinamicas->result_array();
    }
}
