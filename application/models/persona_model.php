<?php
class Persona_model extends CI_Model {

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

    public function create_persona(){
        $this->load->helper('url');
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

        return $this->db->insert('Persona', $data);
    }

    public function read_persona(){
        $personas = $this->db->get('Persona');
        return $personas->result_array();
    }

    public function update_persona(){
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
        $this->db->where('id', $this->input->post('id_persona'));
        return $this->db->update('Persona', $data);
    }

    public function del_persona(){
        $this->db->where('id', $this->input->post('id_persona'));
        $this->db->delete('Persona');
    }

    public function read_persona_esp(){
        $id=$this->input->post('id_persona');
        $personas = $this->db->get_where('Persona', array('id' => $id), 1, 0);
        return $personas->result_array();
    }
}
