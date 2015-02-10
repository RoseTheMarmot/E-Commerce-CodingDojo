<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$query = "SELECT * FROM products";
		$results = $this->db->query($query)->result_array();
		$this->load->view('homepage', array("results" => $results));
	}

	public function merch_page($id)
	{
		$this->load->model('product_model');
		$results = $this->product_model->get_one_merch($id);
		$items = $this->product_model->show_all_merch();
		$this->load->view('merch', array("results" => $results, "items" => $items));
	}
}

//end of main controller