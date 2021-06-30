<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function login()
	{
		if ($this->session->userdata('cursos')['users_ID'])
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
			/* Busca usuário no bd */
			$usuario = $this->db->select("*")->from('usuarios')->where('email', $user_post)->get()->row();

			/* Checa se o usuário existe, caso não retorna uma mensagem de erro e redireciona para a mesma view */
			if ($usuario){
				/* Checa o status do usuário, caso 1 o login é efetuado, caso contrário retorna uma mensagem de erro e um e-mail para confirmação é enviado */
				if ($usuario->status == 1){
					
					// Verifica a senha do usuário e cria a sessão se estiver correta
					if($this->_resolve_user_login($user_post, $pass_post)) {
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
		
						$this->session->set_userdata('cursos', $create_session);
						redirect();
					}

					// Se a senha não estiver correta exibe mensagem de erro
					$this->session->set_flashdata("msg_error", "Senha incorreta!");
					redirect('auth/login');

				}else if($usuario->status_cadastro == 2){
					$this->session->set_flashdata("msg_error", "Você precisa finalizar o login, um link de confirmação foi enviado para seu e-mail");
					$this->enviarEmail($usuario->email, true);
					redirect('auth/login');
				}
				// $this->session->set_flashdata("msg_error", "Você precisa finalizar o login!");
				// redirect('auth/login');
			}
			$this->session->set_flashdata("msg_error", "Usuário não cadastrado");
			redirect('auth/login');
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

	public function register()
	{
		$this->load->library('encrypt');
		if ($this->input->post("enviar")) {
			$this->load->model("Usuarios_model");
			$usuario = $this->Usuarios_model->getUsuario($this->input->post("usuario"));
			if ($usuario) {
				$this->data['msg_error'] = "Usuário já cadastrado";
			} else {

				$usuario = array();
				$usuario['usuario'] 		= strtolower($this->input->post("email", TRUE));
				$usuario['nome'] 			= ucwords(strtolower($this->input->post("nome", TRUE)));
				$usuario['email'] 			= strtolower($this->input->post("email", TRUE));
				$usuario['telefone'] 		= $this->input->post("telefone", TRUE);
				$usuario['senha'] 			= password_hash($this->input->post("senha", TRUE), PASSWORD_BCRYPT);
				$usuario['status'] 			= 1;
				$usuario['createdAt'] 		= date("Y-m-d H:i:s");
				
				$usuarioExiste = $this->db
					->from("usuarios AS m")
					->where("email", $usuario['email'])->get()->row();
				
				if($usuarioExiste) {
					$this->session->set_flashdata("msg_error", "Usuário já existe!");
					redirect('auth/register');
				}

				$this->db->insert("usuarios", $usuario);
				$usuario['id'] = $this->db->insert_id(); //pega o ultimo id inserido no BD

				$usuario_perfil = array();
				$usuario_perfil['usuarios_id']  = $usuario['id'];
				$usuario_perfil['perfis_id'] = 1;
				$this->db->insert("usuarios_perfis", $usuario_perfil);
				$this->session->set_flashdata("msg_success", "Usuário registrado com sucesso");

				redirect('auth/login');
			}
		}
		$this->load->view("modulos/auth/register");
	}
	
	public function logout(){
		//$this->session->unset_userdata($usuarioLogado);
		$this->session->sess_destroy();
		redirect("auth/login");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */