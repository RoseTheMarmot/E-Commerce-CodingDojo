<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		//redirect to admin login
		redirect('/main/admin');
	}

	/* ---------------------------
	 *  Processes admin logins
	 */
	public function admin_login(){
		//validate form
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|rquired|valid_email|max_length[255]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[255]');
		if(!$this->form_validation->run()){
			//form validation has errors
			$this->session->set_flashdata('admin_login_errors', validation_errors());
			redirect('/main/admin');
		}else{
			//validation ok, check database for matches
			$this->load->model('dashboard_model');
			$admin = $this->dashboard_model->get_admin($this->input->post('email'), $this->input->post('password'));
			if(!$admin){
				//no matches for email and password combo found in database
				$this->session->set_flashdata('admin_login_errors', 'No matches for that email and password.');
				redirect('/main/admin');
			}else{
				//email and password matches found, login successful
				$this->session->set_userdata($admin);
				$this->session->set_userdata('is_admin', true);
				redirect('/dashboard/orders');
			}
		}		
	}

	/* ---------------------------
	 *  Admin view of orders
	 */
	public function orders(){
		if($this->session->userdata('is_admin') === true){ //check if admin
			//load view
			$this->load->view('dashboard/header-dashboard');
			$this->load->view('dashboard/nav-dashboard', array('current' => 'orders'));
			$this->load->view('dashboard/orders-view');
		}else{
			redirect('/main/admin');
		}	
	}

	/* ---------------------------
	 *  Admin detail view of order
	 */
	public function single_order($id){
		$this->load->model('dashboard_model');
		$order = $this->dashboard_model->get_order_by_id($id);
		$items = $this->dashboard_model->get_order_items($id);
		
		$shipping = 1.23;

		$this->load->view('dashboard/header-dashboard');
		$this->load->view('dashboard/nav-dashboard');
		$this->load->view('/dashboard/single-order-view', array('order' => $order, 'items' => $items, 'shipping' => $shipping));
	}

	/* ---------------------------
	 *  JSON orders APIs
	 *	
	 */
	public function get_orders(){
		$this->load->model('dashboard_model');
		if($this->input->post('filter')){
			$output['orders'] = $this->dashboard_model->get_orders_filter($this->input->post('filter'));
		}else{
			$output['orders'] = $this->dashboard_model->get_orders();
		}
		echo json_encode($output);
	}
	public function get_orders_by_status(){
		$status = $this->input->post('filter');
		$this->load->model('dashboard_model');
		$output['orders'] = $this->dashboard_model->get_orders_by_status($status);
		echo json_encode($output);
	}

	public function change_order_status($id){
		var_dump($id);
		var_dump($this->input->post('status'));
		if($this->input->post('status')){

			$this->load->model('dashboard_model');
			$this->dashboard_model->change_order_status($id, $this->input->post('status'));
		}
	}

	/* ---------------------------
	 *  Admin view of products
	 */
	public function products(){
		if($this->session->userdata('is_admin') === true){ //check if admin
			//get products
			$this->load->model('dashboard_model');
			$products = $this->dashboard_model->get_products();
			//load view
			$this->load->view('dashboard/header-dashboard');
			$this->load->view('dashboard/nav-dashboard', array('current' => 'products'));
			$this->load->view('dashboard/products-view', array('products' => $products));
		}else{
			redirect('/main/admin');
		}
	}

	/* ---------------------------
	 *  JSON products API
	 */
	public function get_products(){
		$this->load->model('dashboard_model');
		if($this->input->post('filter')){
			$output['products'] = $this->dashboard_model->get_products_filter($this->input->post('filter'));
		}else{
			$output['products'] = $this->dashboard_model->get_products();
		}
		echo json_encode($output);
	}

	/* ---------------------------
	 *  Process Log Off
	 */
	public function logoff(){
		$userdata = $this->session->all_userdata();
		$this->session->unset_userdata($userdata);
		redirect("/main/admin");
	}
}

//end of main controller