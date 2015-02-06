<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler();
	}

	public function index()
	{
		$this->admin();
	}
	
	public function admin(){
		$this->load->view('admin-login-view');
		//admin login here
		//if login successful, redirect to dashboard
	}
}

//end of main controller