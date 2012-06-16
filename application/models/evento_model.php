<?php
class Evento_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}
<<<<<<< HEAD

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
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('Evento', $data);
    }

    public function del_evento(){
        $data= array(
            'id' => $this->input->post('id')
        );

        return $this->db->delete('Evento', $data);

    }
=======
	
	public function show_evento(){
		$eventos = $this->db->get('Evento');
		return $eventos->result_array();
	}
	
	public function add_evento(){
		$this->load->helper('url');
		$data= array(
			'nombre' =>  $this->input->post('nombre'),
			'ubicacion' =>  $this->input->post('ubicacion'),
			'fecha_inicio' =>  $this->input->post('fecha_inicio'),
			'fecha_fin' =>  $this->input->post('fecha_fin')
		);
		
		return $this->db->insert('Evento', $data);
	}
>>>>>>> f26fcce37ce2538279467184e1f5f0177ecbc92b
}