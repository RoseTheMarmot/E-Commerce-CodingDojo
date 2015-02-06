<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler();
	}

	public function index()
	{
		echo "Welcome to CodeIgniter. The default Controller is Main.php";
	}

	public function admin_login(){
		//processes admin login
		redirect('/dashboard/orders');
	}

	public function orders(){
		//admin view of orders
		$this->load->view('dashboard/header-dashboard');
		$this->load->view('dashboard/nav-dashboard', array('current' => 'orders'));
		$this->load->view('dashboard/orders-view');
	}

	public function products(){
		//admin view of products
		echo "hi";
	}

	public function logoff(){
		$userdata = $this->session->all_userdata();
		$this->session->unset_userdata($userdata);
		redirect("/");
	}
}

//end of main controller