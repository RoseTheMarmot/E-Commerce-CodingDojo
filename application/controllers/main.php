<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$this->load->model('product_model');
		$this->load->model('category_model');
	}

	public function index()
	{	
		$category = $this->category_model->show_all_merch();
		$results = $this->product_model->show_all_merch();
		$this->load->view('homepage', array("results" => $results, 'categories' => $category));
	}

	public function merch_page($id)
	{
		$results = $this->product_model->get_one_merch($id);
		$items = $this->product_model->show_all_merch();
		$this->load->view('merch', array("results" => $results, "items" => $items));
	}

	public function homepage($category)
	{
		// echo $category;
		// die();
		$items = $this->category_model->sort_merch($category);
	}

	public function get_merch($name)
	{
		$this->load->model('category_model');
		$values = $this->category_model->sort_merch($name);
		$output['values'] = $values;
		echo json_encode($output);
	}
}

//end of main controller