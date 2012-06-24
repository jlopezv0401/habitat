<?php
class Evento_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function create_evento(){
        $this->load->helper('url');
        $data= array(
            'nombre' =>  $this->input->post('nombre'),
            'ubicacion' =>  $this->input->post('ubicacion'),
            'fecha_inicio' =>  $this->input->post('fecha_inicio'),
            'fecha_fin' =>  $this->input->post('fecha_fin')
        );

        return $this->db->insert('Evento', $data);
    }

	public function read_evento(){
		$eventos = $this->db->get('Evento');
		return $eventos->result_array();
	}	

	public function update_evento(){
		$data= array(
		    'nombre' =>  $this->input->post('nombre'),
		    'ubicacion' =>  $this->input->post('ubicacion'),
		    'fecha_inicio' =>  $this->input->post('fecha_inicio'),
		    'fecha_fin' =>  $this->input->post('fecha_fin')
		);
		$this->db->where('id', $this->input->post('identifica'));
		return $this->db->update('Evento', $data);
	}

	public function del_evento(){
			$this->db->where('id', $this->input->post('identifica'));
			$this->db->delete('Evento');
	}

    public function read_evento_esp(){
        $id=$this->input->post('identifica');
        $eventos = $this->db->get_where('Evento', array('id' => $id), 1, 0);
        return $eventos->result_array();
    }
}
