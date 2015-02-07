<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler();
	}

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
				redirect('/dashboard/orders');
			}
		}		
	}

	/* ---------------------------
	 *  Admin view of orders
	 */
	public function orders(){
		//get orders
		$this->load->model('dashboard_model');
		$orders = $this->dashboard_model->get_orders();
		//load view
		$this->load->view('dashboard/header-dashboard');
		$this->load->view('dashboard/nav-dashboard', array('current' => 'orders'));
		$this->load->view('dashboard/orders-view', array('orders' => $orders));
	}

	public function products(){
		//admin view of products
		$this->load->view('dashboard/header-dashboard');
		$this->load->view('dashboard/nav-dashboard', array('current' => 'products'));
		$this->load->view('dashboard/products-view');
	}

	public function logoff(){
		$userdata = $this->session->all_userdata();
		$this->session->unset_userdata($userdata);
		redirect("/main/admin");
	}
}

//end of main controller