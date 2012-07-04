<?php
class Intervalo_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function create_intervalo(){
        $this->load->helper('url');
        $data= array(
            'id_metrica' =>  $this->input->post('id_metrica'),
            'intervalo' =>  $this->input->post('intervalo'),
            'descripcion' =>  $this->input->post('descripcion')
        );
        return $this->db->insert('Intervalo', $data);
    }

    public function read_intervalo(){
        $id=$this->input->post('id_metrica');
        $intervalos = $this->db->get_where('Intervalo', array('id_metrica' => $id));
        return $intervalos->result_array();
    }

    public function update_intervalo(){
        $data= array(
            'id_metrica' =>  $this->input->post('id_metrica'),
            'intervalo' =>  $this->input->post('intervalo'),
            'descripcion' =>  $this->input->post('descripcion')
        );
        $this->db->where('id', $this->input->post('id_intervalo'));
        return $this->db->update('Intervalo', $data);
    }

    public function del_intervalo(){
        $this->db->where('id', $this->input->post('id_intervalo'));
        $this->db->delete('Intervalo');
    }

    public function read_intervalo_esp(){
        $id=$this->input->post('id_intervalo');
        $intervalos = $this->db->get_where('Intervalo', array('id' => $id), 1, 0);
        return $intervalos->result_array();
    }
}
