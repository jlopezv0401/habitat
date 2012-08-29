<?php
class Participante_model extends CI_Model {

//id INT NOT NULL AUTO_INCREMENT,
//nombre VARCHAR(50) NOT NULL,
//cantidad INT NOT NULL,
//descripcion TEXT

    public function __construct(){
        $this->load->database();
    }

    public function create_participante(){
        $this->load->helper('url');
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'apaterno' =>  $this->input->post('apaterno'),
            'amaterno' =>  $this->input->post('amaterno'),
            'sexo' =>  $this->input->post('sexo'),
            'edad' =>  $this->input->post('edad'),
            'telefono' =>  $this->input->post('telefono'),
            'correo' =>  $this->input->post('correo')
        );

        return $this->db->insert('Participante', $data);
    }

    public function read_participante(){
        $participantes = $this->db->get('Participante');
        return $participantes->result_array();
    }

    public function update_participante(){
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'apaterno' =>  $this->input->post('apaterno'),
            'amaterno' =>  $this->input->post('amaterno'),
            'sexo' =>  $this->input->post('sexo'),
            'edad' =>  $this->input->post('edad'),
            'telefono' =>  $this->input->post('telefono'),
            'correo' =>  $this->input->post('correo')
        );
        $this->db->where('id', $this->input->post('id_participante'));
        return $this->db->update('Participante', $data);
    }

    public function del_participante(){
        $this->db->where('id', $this->input->post('id_participante'));
        $this->db->delete('Participante');
    }

    public function read_participante_esp(){
        $id=$this->input->post('id_participante');
        $participantes = $this->db->get_where('Participante', array('id' => $id), 1, 0);
        return $participantes->result_array();
    }
}
