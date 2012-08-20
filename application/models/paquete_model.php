<?php
class Paquete_model extends CI_Model {

//id INT NOT NULL AUTO_INCREMENT,
//nombre VARCHAR(50) NOT NULL,
//cantidad INT NOT NULL,
//descripcion TEXT

    public function __construct(){
        $this->load->database();
    }

    public function create_paquete(){
        $this->load->helper('url');
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'cantidad' =>  $this->input->post('cantidad'),
            'descripcion' =>  $this->input->post('descripcion')
        );

        return $this->db->insert('Paquete', $data);
    }

    public function read_paquete(){
        $paquetes = $this->db->get('Paquete');
        return $paquetes->result_array();
    }

    public function update_paquete(){
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'cantidad' =>  $this->input->post('cantidad'),
            'descripcion' =>  $this->input->post('descripcion')
        );
        $this->db->where('id', $this->input->post('id_paquete'));
        return $this->db->update('Paquete', $data);
    }

    public function del_paquete(){
        $this->db->where('id', $this->input->post('id_paquete'));
        $this->db->delete('Paquete');
    }

    public function read_paquete_esp(){
        $id=$this->input->post('id_paquete');
        $paquetes = $this->db->get_where('Paquete', array('id' => $id), 1, 0);
        return $paquetes->result_array();
    }
}
