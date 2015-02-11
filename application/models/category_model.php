<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}
	public function show_all_merch()
	{
		$query = "SELECT category FROM products GROUP BY category DESC";
		return $this->db->query($query)->result_array();
	}
	public function sort_merch($category)
	{
		$query = "SELECT * FROM products WHERE category = ?";
		$results = $this->db->query($query, $category)->result_array();
		return $results;
	}
}
//end of routes.php