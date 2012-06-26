<?php
class Area_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function create_area(){
        $this->load->helper('url');
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'id_carpa' => $this->input->post('id_carpa')
        );
        return $this->db->insert('Area', $data);
    }

    public function read_area(){
        $id=$this->input->post('id_carpa');
        $areas = $this->db->get_where('Area', array('id_carpa' => $id));
        return $areas->result_array();
    }

    public function update_area(){
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'id_carpa' => $this->input->post('id_carpa')
        );
        $this->db->where('id', $this->input->post('id_area'));
        return $this->db->update('Area', $data);
    }

    public function del_area(){
        $this->db->where('id', $this->input->post('id_area'));
        $this->db->delete('Area');
    }

    public function read_area_esp(){
        $id=$this->input->post('id_area');
        $areas = $this->db->get_where('Area', array('id' => $id), 1, 0);
        return $areas->result_array();
    }
}
