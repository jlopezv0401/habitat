<?php
class Evento_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}
	
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
}