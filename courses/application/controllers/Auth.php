<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model("Users_model");
	}
	
	public function login()
	{
		
		//if ($this->session->userdata('courses')['users_ID']){}

		if( $this->input->post("send") ){

			$user_post = $this->input->post("username");
			$pass_post = $this->input->post("password");
			/* Busca usuário no bd */
			$user = $this->db->select("*")->from('users')->where('username', $user_post)->get()->row();

			/* Checa se o usuário existe, caso não retorna uma mensagem de erro e redireciona para a mesma view */
			if ($user){
				// Verifica a password do usuário e cria a sessão se estiver correta
				if($this->_resolve_user_login($user_post, $pass_post)) {
					$user_ID 	= $this->_get_user_ID_from_username($user_post);
					$user_info	= $this->_get_user_information_from_ID($user_ID);;
					$profile 	= $this->_get_user_profile_from_ID($user_ID);
					$ip_address = $this->input->ip_address();
					
					$create_session = array(
						'users_ID' => $user_ID,
						'name' => $user_info->name,
						'username' => $user_info->username,
						'email' => $user_info->email,
						'principal' => $user_info->principal,
						'profiles' => $profile,
						'ip_address' => $ip_address,
					);
					
					//arShow($create_session); exit;
					$this->session->set_userdata('courses', $create_session);
					//arShow($this->session->userdata('courses')); exit;
					redirect("courses/index");
				} else {
					// Se a password não estiver correta exibe mensagem de erro
					
					$this->session->set_flashdata("msg_error", "senha incorreta!");
					//redirect('auth/login');				
				}
			} else {
				
				$this->session->set_flashdata("msg_error", "Usuário não encontrado!");
				//redirect('auth/login');
			}
		}
		$this->load->view("modulos/auth/login");
	}

	private function _resolve_user_login($username, $password)
	{
		$this->db->where('username', $username);
		$hash = $this->db->get('users')->row('password');
		return $this->_verify_password_hash($password, $hash);
	}

	private function _get_user_ID_from_username($username)
	{
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('username', $username);
		return $this->db->get()->row('id');
	}

	private function _get_user_information_from_ID($user_ID)
	{
		$this->db->select('id, name, username, email, principal');
		$this->db->from('users');
		$this->db->where('id', $user_ID);
		return $this->db->get()->row();
	}

	private function _get_user_profile_from_ID($user_ID)
	{
		$this->db->select('profiles_id');
		$this->db->from('user_profiles');
		$this->db->where('users_id', $user_ID);
		return $this->db->get()->row('profiles_id');
	}

	private function _verify_password_hash($password, $hash)
	{
		return password_verify($password, $hash);
	}

	public function register()
	{

		$this->load->library('encrypt');
		if ($this->input->post("send")) {
			$user = $this->Users_model->get_user($this->input->post("username"));
			if ($user) {
				$this->data['msg_error'] = "Usuário já cadastrado";
			} else {

				$user = array();
				$user['username']  = strtolower($this->input->post("email", TRUE));
				$user['name'] 	   = ucwords(strtolower($this->input->post("name", TRUE)));
				$user['email'] 	   = strtolower($this->input->post("email", TRUE));
				$user['phone'] 	   = $this->input->post("phone", TRUE);
				$user['password']  = password_hash($this->input->post("password", TRUE), PASSWORD_BCRYPT);
				$user['status']    = 1;
				$user['createdAt'] = date("Y-m-d H:i:s");
				
				$userExists = $this->db
					->from("users AS m")
					->where("email", $user['email'])->get()->row();
				
				if($userExists) {
					$this->session->set_flashdata("msg_error", "Usuário já existe!");
					redirect('auth/register');
				}

				$this->db->insert("users", $user);
				$user['id'] = $this->db->insert_id(); //pega o ultimo id inserido no BD

				$user_profile = array();
				$user_profile['users_id']  = $user['id'];
				$user_profile['profiles_id'] = 1;
				$this->db->insert("user_profiles", $user_profile);
				$this->session->set_flashdata("msg_success", "Usuário registrado com sucesso");

				redirect('auth/login');
			}
		}
		$this->load->view("modulos/auth/register");
	}
	
	public function logout(){
		//$this->session->unset_userdata($userLogado);
		$this->session->sess_destroy();
		redirect("auth/login");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */