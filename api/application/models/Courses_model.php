<?php

class Courses_model extends CI_Model
{
	private $table;

	public function __construct()
	{
		parent::__construct();
        $this->load->database();
        $this->table = "courses AS c";
	}

	public function get_course_by_id($id) {
        $this->db->select('c.id, c.name, c.description AS course_description, c.image, c.price, c.createdAt, c.updatedAt, ctg.description AS category_description');
        $this->db->join('categories AS ctg', 'c.categories_id = ctg.id');

        $query = $this->db->get_where($this->table, ['c.id' => $id]);
		return $query->row_array();
	}
    
	public function get_all_courses() {
        $this->db->select('c.id, c.name, c.description AS course_description, c.image, c.price, c.createdAt, c.updatedAt, ctg.description AS category_description');
        $this->db->join('categories AS ctg', 'c.categories_id = ctg.id');
		
        return $this->db->get($this->table)->result();
	}
	
}