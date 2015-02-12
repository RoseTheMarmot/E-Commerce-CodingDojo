<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function show_all_merch()
	{
		$query = "SELECT * FROM products";
		return $this->db->query($query)->result_array();
	}

	public function get_one_merch($id)
	{
		$query = "SELECT * FROM products WHERE id = ?";
		return $this->db->query($query, array($id))->row_array();
	}

	public function get_merch_by_filter($filter){
		$query = "SELECT * FROM products WHERE name LIKE '%".$filter."%' OR category LIKE '%".$filter."%'";
		return $this->db->query($query)->result_array();
	}
}