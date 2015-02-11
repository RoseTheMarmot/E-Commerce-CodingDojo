<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
<<<<<<< HEAD
		// $this->output->enable_profiler();
		$this->load->model('product_model');
		$this->load->model('category_model');
=======
		//$this->output->enable_profiler();
>>>>>>> origin/master
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
<<<<<<< HEAD
		$this->load->model('category_model');
		$values = $this->category_model->sort_merch($name);
		$output['values'] = $values;
		echo json_encode($output);
=======

	}
	
	public function admin(){
		$this->load->view('admin-login-view');
>>>>>>> origin/master
	}
}

//end of main controller