<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	function get_admin($email, $password){
		
		//TODO:----> add password encryption <------

		$query = "SELECT * FROM admins WHERE email = ? && password = ?";
		return $this->db->query($query, array($email, $password))->row_array();
	}
}