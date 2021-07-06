<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends MY_Controller {

	public $data;	
	function __construct(){
		parent::__construct();
		$this->_auth();
		
		//adicione os campos da busca
		//$camposFiltros["pr.nome_prof"] = "Nome Cliente";
		//$camposFiltros["pr.area"] 	 = "Área Desejada";
		//$this->data['campos']    		 = $camposFiltros;
	}

	public function index(){}

	public function details() {
		//get the course_id from url		
		$this->data['course_id'] = $this->uri->segment(3);

		if(!isset($this->data['course_id']) || empty($this->data['course_id'])) {
			redirect('courses');
		}
	}
}