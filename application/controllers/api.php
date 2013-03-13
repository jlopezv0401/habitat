<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Moy Lopez
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';
require APPPATH.'/libraries/sphinxapi.php';

class Api extends REST_Controller {

	function login_post() {
		if(!$this->post('usuario')) {
			if(!$this->post('password')) {
				$this->response(array('error' => 'Usuario no encontrado'), 404);
			}
		}
		else {
			$usuario = $this->post('usuario');
			$password = $this->post('password');
		}

		$this->load->library('encrypt');
        $usuario = $this->security->xss_clean($this->input->post('usuario'));        
        $decoded = $this->security->xss_clean($this->input->post('password'));

        $this->db->where('usuario', $usuario);
        //$this->db->where('password', $decoded);                 
        // Run the query
        $query = $this->db->get('Colaborador');
        // Let's check if there are any results
        if($query->num_rows() == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            if($this->encrypt->decode($row->password) == $decoded){
               	$sql = 'SELECT id_dinamica FROM Dinamica_Colaborador WHERE id_colaborador=' . $row->id;
            	$query = $this->db->query($sql);
                $resultado = array(
                    'id' => $row->id,
                    'tipo_usuario' => $row->tipo_usuario,                    
                    'usuario' => $row->usuario,
                    'id_dinamica' => $query->result(),
                    'validated' => true
                    );
                // $this->session->set_userdata($data);
                // return true;
            } else{
                $this->response(array('error' => 'Usuario o contraseña no validos'), 404);
            }

      	}

		//$resultado = $decoded;
		if($resultado) {
			$this->response($resultado, 200);
			}
			else {
				$this->response(array('error' => 'Usuario no encontrado'), 404);
		}
	}

}