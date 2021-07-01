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

	public function index(){

		

	}
}