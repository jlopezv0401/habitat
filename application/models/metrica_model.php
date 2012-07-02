<?php
class Metrica_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function create_metrica(){
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'valor_medir' =>  $this->input->post('valor_medir'),
            'rango_inicio' =>  $this->input->post('rango_inicio'),
            'rango_fin' =>  $this->input->post('rango_fin'),
            'no_intervalo' =>  $this->input->post('no_intervalo')
        );

        return $this->db->insert('Metrica', $data);
    }

    public function read_metrica(){
        $metricas = $this->db->get('Metrica');
        return $metricas->result_array();
    }

    public function update_metrica(){
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'valor_medir' =>  $this->input->post('valor_medir'),
            'rango_inicio' =>  $this->input->post('rango_inicio'),
            'rango_fin' =>  $this->input->post('rango_fin'),
            'no_intervalo' =>  $this->input->post('no_intervalo')
        );
        $this->db->where('id', $this->input->post('id_metrica'));
        return $this->db->update('Metrica', $data);
    }

    public function del_metrica(){
        $this->db->where('id', $this->input->post('id_metrica'));
        $this->db->delete('Metrica');
    }

    public function read_metrica_esp(){
        $id=$this->input->post('id_metrica');
        $metricas = $this->db->get_where('Metrica', array('id' => $id), 1, 0);
        return $metricas->result_array();
    }
}
