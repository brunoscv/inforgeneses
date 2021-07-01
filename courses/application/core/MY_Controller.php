<?php
class MY_Controller extends CI_Controller
{

	public $data;

	public function __construct()
	{
		parent::__construct();
		
		$this->form_validation->set_error_delimiters('<em class="error">', '</em>');
		$this->data['msg_error'] 	= $this->session->flashdata("msg_error");
		$this->data['msg_success'] 	= $this->session->flashdata("msg_success");
	}
	
	protected function _auth(){
		#return true;
		
		$this->data['courses'] = $this->session->userdata('courses');
		//$perfis = (is_array($this->data['courses']['profiles']) ? count($this->data['courses']['profiles']) : 0);

		//arShow($this->data['courses']['profiles']); exit;
		if( !$this->data['courses'] || !$this->data['courses']['profiles'] ){
			redirect("auth/login");
		}

		$this->load->model("Menus_model");
		$listaMenus = $this->Menus_model->getMenusByPerfis($this->data['courses']['profiles']);

		//arShow($listaMenus); exit;
		
		$menusPermitidos = array();
		$currentUrl = ( empty($this->uri->uri_string) ) ? strtolower(get_active_class()) . "/" . strtolower(get_active_method()) : $this->uri->uri_string;
		$currentUrl = "/".$currentUrl;
		
		$allowed = FALSE;
		if( is_array($listaMenus) ){
			foreach($listaMenus as $menu){
				if( !preg_match("|^/dashboard|i", $currentUrl) ){
					if( !empty($menu->url) && preg_match("|^".$menu->url."|i", $currentUrl) ){
						$allowed = TRUE;
					}	
				} else {
					$allowed = TRUE;
				}
			}
		}

		if( !$allowed ){
			$this->session->set_flashdata("msg_error","Você não tem permissão para acessar o menu: <b>" . get_active_class()."</b>.");
			redirect("/");
		}
		
		$this->data['menuOrdenado'] = $this->Menus_model->_arranjaMenu($listaMenus);


		$configuracoes = new StdClass();
		$configuracoes->limite_usuarios 	= $this->config->item("limite_usuarios");

	}

}