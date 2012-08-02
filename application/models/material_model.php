<?php
class Material_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function create_material(){
        $this->load->helper('url');
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'cantidad' =>  $this->input->post('cantidad'),
            'descripcion' =>  $this->input->post('descripcion')
        );

        return $this->db->insert('Material', $data);
    }

    public function read_material(){
        $materiales = $this->db->get('Material');
        return $materiales->result_array();
    }

    public function update_material(){
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'cantidad' =>  $this->input->post('cantidad'),
            'descripcion' =>  $this->input->post('descripcion')
        );
        $this->db->where('id', $this->input->post('id_material'));
        return $this->db->update('Material', $data);
    }

    public function del_material(){
        $this->db->where('id', $this->input->post('id_material'));
        $this->db->delete('Material');
    }

    public function read_material_esp(){
        $id=$this->input->post('id_material');
        $materiales = $this->db->get_where('Material', array('id' => $id), 1, 0);
        return $materiales->result_array();
    }
}
