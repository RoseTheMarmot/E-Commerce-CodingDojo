<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
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



		//shipping:
		// $first_name = $this->input->post('first_name');
		// $last_name = $this->input->post('last_name');

		// for addresses
		$address = $this->input->post('address');
		$address_2 = $this->input->post('address_2');
		$city = $this->input->post('city');
		$state = $this->input->post('state');
		$zipcode = $this->input->post('zipcode');

		//for customers
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');

		//biling:
		// $billing_first_name = $this->input->post('billing_first_name');
		// $billing_last_name = $this->input->post('billing_last_name');
		// $billing_address = $this->input->post('address');
		// $billing_address_2 = $this->input->post('address_2');
		// $billing_city = $this->input->post('billing_city');
		// $billing_state = $this->input->post('billing_state');
		// $billing_zipcode = $this->input->post('billing_zipcode');
		// $billing_card = $this->input->post('billing_card');
		// $billing_security_code = $this->input->post('billing_security_code');




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
							// "billing_first_name" => $billing_first_name,
							// "billing_last_name" => $billing_last_name,
							// "billing_address" => $billing_address,
							// "billing_address_2" => $billing_address_2,
							// "billing_city" => $billing_city,
							// "billing_state" => $billing_state,
							// "billing_zipcode" => $billing_zipcode
		);
		// var_dump($customer_details);

		// check for duplicate users
		// if ($customers.first_name == TRUE && $customers.last_name == TRUE)
		// {
		// 	// dont add/duplicate customer data into the db
		// }
		// else 
		// {
		// 	$add_customer = $this->cart_model->add_customer($customer_details);
		// }



		// this line below adds my customer data of input into the db
		$add_customer = $this->cart_model->add_customer($customer_details);
	}

}

//end of main controller