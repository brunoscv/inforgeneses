<?php

class Carts_model extends CI_Model
{
	private $table;

	public function __construct()
	{
		parent::__construct();
        $this->load->database();
        $this->table = "carts AS c";
	}

	public function get_carts_by_userid($id) {

		return $this->db->get_where($this->table, ['users_id' => $id])->result();
	}

	public function get_cart_items($carts_id, $courses_id) {

		return $this->db->get_where('cart_items', ['carts_id' => $carts_id, 'courses_id' => $courses_id])->row_array();
	}

	public function get_active_carts_by_userid($id) {

		return $this->db->get_where($this->table, ['users_id' => $id, 'status' => 1])->row_array();
	}
	
}