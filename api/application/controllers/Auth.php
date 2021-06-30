<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function login()
	{
		if ($this->session->userdata('userdata')['users_ID'])
		{
			redirect("dashboard");
		}

		$validation = array(
			array('field' => 'usuario', 'rules' => 'required'),
			array('field' => 'senha', 'rules' => 'required')
		);

		$this->form_validation->set_rules($validation);
		
		if ($this->form_validation->run() == true) 
		{
			$user_post = $this->input->post("usuario");
			$pass_post = $this->input->post("senha");
			
			if($this->_resolve_user_login($user_post, $pass_post)) 
			{
				$user_ID 	= $this->_get_user_ID_from_username($user_post);
				$user		= $this->_get_user_information_from_ID($user_ID);;
				$profile 	= $this->_get_user_profile_from_ID($user_ID);
				$ip_address = $this->input->ip_address();
				
				$create_session = array(
					'users_ID' => $user_ID,
					'nome' => $user->nome,
					'usuario' => $user->usuario,
					'email' => $user->email,
					'principal' => $user->principal,
					'clientes_id' => $user->clientes_id,
					'perfis' => $profile,
					'ip_address' => $ip_address,
				);

				$this->session->set_userdata('userdata', $create_session);
				redirect('dashboard');
			}
		} 
		$this->load->view("modulos/auth/login");
	}

	private function _resolve_user_login($username, $password)
	{
		$this->db->where('usuario', $username);
		$hash = $this->db->get('usuarios')->row('senha');
		return $this->_verify_password_hash($password, $hash);
	}

	private function _get_user_ID_from_username($username)
	{
		$this->db->select('id');
		$this->db->from('usuarios');
		$this->db->where('usuario', $username);
		return $this->db->get()->row('id');
	}

	private function _get_user_information_from_ID($user_ID)
	{
		$this->db->select('id, nome, usuario, email, clientes_id, principal');
		$this->db->from('usuarios');
		$this->db->where('id', $user_ID);
		return $this->db->get()->row();
	}

	private function _get_user_profile_from_ID($user_ID)
	{
		$this->db->select('perfis_id');
		$this->db->from('usuarios_perfis');
		$this->db->where('usuarios_id', $user_ID);
		return $this->db->get()->row('perfis_id');
	}

	private function _verify_password_hash($password, $hash)
	{
		return password_verify($password, $hash);
	}
	
	public function logout(){
		//$this->session->unset_userdata($usuarioLogado);
		$this->session->sess_destroy();
		redirect("auth/login");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */