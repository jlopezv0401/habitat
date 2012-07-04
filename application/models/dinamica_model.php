<?php
class Dinamica_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    // id_area INT NOT NULL,
    // id_metrica INT NOT NULL,
    // nombre VARCHAR(50) NOT NULL,
    // hora_inicio TIME NOT NULL,
    // hora_fin TIME NOT NULL,
    // descripcion TEXT,

    public function create_dinamica(){
        $this->load->helper('url');
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'hora_inicio' =>  $this->input->post('hora_inicio'),
            'hora_fin' => $this->input->post('hora_fin'),
            'descripcion' => $this->input->post('descripcion'),
            'id_area' => $this->input->post('id_area'),
            'id_metrica' => $this->input->post('id_metrica')
        );
        return $this->db->insert('Dinamica', $data);
    }

    public function read_dinamica(){
        $id=$this->input->post('id_area');
        $dinamicas = $this->db->get_where('Dinamica', array('id_area' => $id));
        return $dinamicas->result_array();
    }

    public function read_metrica(){
        $metricas = $this->db->get('Metrica');
        return $metricas->result_array();
    }

    public function update_dinamica(){
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'hora_inicio' =>  $this->input->post('hora_inicio'),
            'hora_fin' => $this->input->post('hora_fin'),
            'descripcion' => $this->input->post('descripcion'),
            'id_area' => $this->input->post('id_area'),
            'id_metrica' => $this->input->post('id_metrica')
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
