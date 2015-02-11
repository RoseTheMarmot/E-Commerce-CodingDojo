<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

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

}