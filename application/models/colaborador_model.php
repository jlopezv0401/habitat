<?php
class Colaborador_model extends CI_Model {

//id INT NOT NULL AUTO_INCREMENT,
//nombre VARCHAR(20) NOT NULL,
//apaterno VARCHAR(15) NOT NULL,
//amaterno VARCHAR (15) NOT NULL,
//sexo ENUM('M','F') NOT NULL,
//estatus BIT NOT NULL,
//edad CHAR(2),
//direccion TEXT,
//telefono VARCHAR(12),
//correo VARCHAR(50),

    public function __construct(){
        $this->load->database();
    }

    public function create_colaborador(){
        $this->load->helper('url');
        $data= array(

            'nombre' =>  $this->input->post('nombre'),
            'apaterno' =>  $this->input->post('apaterno'),
            'amaterno' =>  $this->input->post('amaterno'),
            'sexo' =>  $this->input->post('sexo'),
            'estatus' =>  $this->input->post('estatus'),
            'edad' =>  $this->input->post('edad'),
            'direccion' =>  $this->input->post('direccion'),
            'telefono' =>  $this->input->post('telefono'),
            'correo' =>  $this->input->post('correo')
        );

        return $this->db->insert('Colaborador', $data);
    }

    public function read_colaborador(){
        $colaboradores = $this->db->get('Colaborador');
        return $colaboradores->result_array();
    }

    public function read_dinamica(){
        $dinamicas = $this->db->get('Dinamica');
        return $dinamicas->result_array();
    }

    public function update_colaborador(){
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'apaterno' =>  $this->input->post('apaterno'),
            'amaterno' =>  $this->input->post('amaterno'),
            'sexo' =>  $this->input->post('sexo'),
            'estatus' =>  $this->input->post('status'),
            'edad' =>  $this->input->post('edad'),
            'direccion' =>  $this->input->post('direccion'),
            'telefono' =>  $this->input->post('telefono'),
            'correo' =>  $this->input->post('correo')
        );
        $this->db->where('id', $this->input->post('id_colaborador'));
        return $this->db->update('Colaborador', $data);
    }

    public function del_colaborador(){
        $this->db->where('id', $this->input->post('id_colaborador'));
        $this->db->delete('Colaborador');
    }

    public function read_colaborador_esp(){
        $id=$this->input->post('id_colaborador');
        $colaboradores = $this->db->get_where('Colaborador', array('id' => $id), 1, 0);
        return $colaboradores->result_array();
    }
}
