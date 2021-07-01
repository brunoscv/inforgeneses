<?php
class Users_model extends CI_Model{
	public function userExists($usuario, $id){
		$this->db->select("usuario");
		$this->db->from("usuarios");
		$this->db->where("usuario", $usuario);
		if( $id ){
			$this->db->where("id <>", $id);	
		}
		return $this->db->get()->row();
	}

	public function get_user($username){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("username", $username);
		return $this->db->get()->row();
	}

	public function get_user_by_id($id){
		$id = intval($id);
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("id", $id);
		return $this->db->get()->row();
	}

	public function get_profile_id($user_id){
		$query = "SELECT * FROM user_profiles WHERE users_id = '".$this->db->escape_str($user_id)."'";
		$result = $this->db->query($query);
		
		$profiles = array();
		foreach($result->result() as $profile){
			$profiles[] = $profile->profiles_id;
		}
		return $profiles;
	}

}
?>