<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		echo "Welcome to CodeIgniter. The default Controller is Main.php";
	}

	public function carts()
	{
		$this->load->view("carts");
	}
}

//end of main controller