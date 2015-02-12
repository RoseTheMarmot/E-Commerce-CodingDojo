<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
	}
	
	public function index()
	{	
		$category = $this->category_model->show_all_merch();
		$results = $this->product_model->show_all_merch();
		$this->load->view('homepage', array("results" => $results, 'categories' => $category));
	}
	
	public function carts()
	{
		$this->load->view("carts");
	}

	public function pay()
	{
		// CI Form Validation
		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required|xss_clean|is_unique[customers.first_name]");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required|is_unique[customers.last_name]");
		$this->form_validation->set_rules("address", "Address", "trim|required");
		$this->form_validation->set_rules("address_2", "Address 2", "trim");
		$this->form_validation->set_rules("city", "City", "trim|required");
		$this->form_validation->set_rules("state", "State", "trim|required");
		$this->form_validation->set_rules("zipcode", "Zipcode", "trim|require");
		if($this->form_validation->run() === FALSE)
		{
			$this->view_data["errors"] = validation_errors();
		}
		else 
		{
			// codes to run on success validation here
			$this->form_validation->run();
		}

		// for addresses
		$address = $this->input->post('address');
		$address_2 = $this->input->post('address_2');
		$city = $this->input->post('city');
		$state = $this->input->post('state');
		$zipcode = $this->input->post('zipcode');

		//for customers
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');

		// to use model:
		$this->load->model('cart_model');

		$customer_details = array(
							"address" => $address,
							"address_2" => $address_2,
							"city" => $city,
							"state" => $state,
							"zipcode" => $zipcode, 
							"first_name" => $first_name,
							"last_name" => $last_name
							
		);
		
		// this line below adds my customer data of input into the db
		// $add_customer = $this->cart_model->add_customer($customer_details);
		$query = mysql_query("SELECT first_name AND last_name 
							  FROM customers 
							  WHERE first_name = '$first_name' AND last_name = '$last_name'");
		if(mysql_num_rows($query) != 0)
		{
			echo "Name already exists";
		}
		else 
		{
			$add_customer = $this->cart_model->add_customer($customer_details);
		}

	}

	public function home()
	{
		$this->load->view("homepage");
	}

	public function merch()
	{
		$this->load->view("merch");		
	}

	public function merch_page($id)
	{
		$results = $this->product_model->get_one_merch($id);
		//$items = $this->product_model->show_all_merch();
		$items = $this->category_model->sort_merch($results['category']);
		$this->load->view('merch', array("results" => $results, "items" => $items));
	}

	public function homepage($category)
	{
		$items = $this->category_model->sort_merch($category);
	}

	public function get_merch($name)
	{
		$this->load->model('category_model');
		$values = $this->category_model->sort_merch($name);
		$output['values'] = $values;
		echo json_encode($output);
	}
	
	public function admin(){
		$this->load->view('admin-login-view');
	}

	// successful order page
	public function success()
	{
		$this->load->view("success");
	}
}

//end of main controller 
