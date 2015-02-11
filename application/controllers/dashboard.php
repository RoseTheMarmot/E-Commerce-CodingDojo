<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('is_admin') === true){
			redirect('/dashboard/orders');
		}else{
			//redirect to admin login
			redirect('/main/admin');
		}
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
			//redirect to admin login
			redirect('/main/admin');
		}	
	}

	/* ---------------------------
	 *  Admin detail view of order
	 */
	public function single_order($id){
		if($this->session->userdata('is_admin') === true){ //check if admin
			$this->load->model('dashboard_model');
		
			$order = $this->dashboard_model->get_order_by_id($id);
			$items = $this->dashboard_model->get_order_items($id);
			$shipping = 1.23;

			$this->load->view('dashboard/header-dashboard');
			$this->load->view('dashboard/nav-dashboard');
			$this->load->view('/dashboard/single-order-view', array('order' => $order, 'items' => $items, 'shipping' => $shipping));
		}else{
			redirect('/main/admin');
		}	
		
	}

	/* ---------------------------
	 *  JSON orders APIs
	 *	
	 */
	public function get_orders(){
		if($this->session->userdata('is_admin') === true){ //check if admin
			$this->load->model('dashboard_model');
			if($this->input->post('filter')){
				$output['orders'] = $this->dashboard_model->get_orders_filter($this->input->post('filter'));
			}else{
				$output['orders'] = $this->dashboard_model->get_orders();
			}
			echo json_encode($output);
		}else{
			redirect('/main/admin');
		}
	}
	public function get_orders_by_status(){
		if($this->session->userdata('is_admin') === true){ //check if admin
			$status = $this->input->post('filter');
			$this->load->model('dashboard_model');
			$output['orders'] = $this->dashboard_model->get_orders_by_status($status);
			echo json_encode($output);
		}else{
			redirect('/main/admin');
		}
	}
	public function change_order_status($id){
		if($this->session->userdata('is_admin') === true){ //check if admin
			if($this->input->post('status')){
				$this->load->model('dashboard_model');
				$this->dashboard_model->change_order_status($id, strtolower($this->input->post('status')));
			}
			$output['status'] = $this->input->post('status');
			echo json_encode($output);
		}else{
			redirect('/main/admin');
		}
		
	}

	/* ---------------------------
	 *  HTML orders APIs
	 *	
	 */
	public function order_rows(){ //this function doesn't work super good, not using it right now
		$array = $this->input->post();?>
    	<tr id="row-<?=$array['id']?>">
			<td>
				<a href="/orders/show/<?=$array['id']?>"><?=$array['id']?></a>
			</td>
			<td><?=$array['first_name']." ".$array['last_name']?></td>
			<td><?=$array['created_at']?></td>
			<td><?=$array['address']." ".$array['address2']." ".$array['city'].", ".$array['state']." ".$array['zipcode']?></td>
			<td><?=$array['total']?></td>
			<td>
				<form method="post" action="/dashboard/change_order_status/<?=$array['id']?>">
					<select name="status">
						<option value="order in progress">Order in progress</option> 
						<?php
						if(strcmp($array['status'], 'shipped')===0){?>
							<option selected="selected" value="shipped">Shipped</option><?php
						}else{?>
							<option value="shipped">Shipped</option><?php
						} 
						if(strcmp($array['status'], 'canceled')===0){?>
							<option selected="selected" value="canceled">Canceled</option><?php
						}else{?>
							<option value="canceled">Canceled</option><?php
						}?>
					</select>
				</form>
			</td>
		</tr>
		<?php 
	}
	function order_status_select($status, $id){?>
		<form method="post" action="/dashboard/change_order_status/<?=$id?>">
			<select class="form-control" name="status">
				<option value="order in progress">Order in progress</option> 
				<?php
				if(strcmp($status, 'shipped')===0){?>
					<option selected="selected" value="shipped">Shipped</option><?php
				}else{?>
					<option value="shipped">Shipped</option><?php
				} 
				if(strcmp($status, 'canceled')===0){?>
					<option selected="selected" value="canceled">Canceled</option><?php
				}else{?>
					<option value="canceled">Canceled</option><?php
				}?>
			</select>
		</form>
		<?php
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
	 *  Admin edit products
	 */
	public function edit_product($id){
		if($this->session->userdata('is_admin') === true){ //check if admin
			$this->load->model('dashboard_model');
			$product = $this->dashboard_model->get_product_by_id($id);
			$categories = $this->dashboard_model->get_product_categories();
			$this->load->view('dashboard/edit-product-view', array('product' => $product, 'categories' => $categories));
		}else{
			redirect('/main/admin');
		}
	}

	/* ---------------------------
	 *  Process product edit
	 */
	public function edit_product_process($id){
		if($this->session->userdata('is_admin') === true){ //check if admin
			$info = $this->process_product($id);
			if($info){
				$this->load->model('dashboard_model');
				$this->dashboard_model->update_product($info['id'], $info['name'], $info['description'], $info['category'], $info['image']);
			}
			//echo "{}";
			redirect('/dashboard/products');
		}else{
			redirect('/main/admin');
		}		
	}

	/* ---------------------------
	 *  Admin add products view
	 */
	public function add_product(){
		if($this->session->userdata('is_admin') === true){ //check if admin
			$this->load->model('dashboard_model');
			$categories = $this->dashboard_model->get_product_categories();
			$this->load->view('dashboard/add-product-view', array('categories' => $categories));
		}else{
			redirect('/main/admin');
		}
		
	}

	/* ---------------------------
	 *  Process adding products
	 */
	public function add_product_process(){
		if($this->session->userdata('is_admin') === true){ //check if admin
			$info = $this->process_product(0);
			if($info){
				$this->load->model('dashboard_model');
				$this->dashboard_model->add_product($info['name'], $info['description'], $info['category'], $info['image']);
			}
			//echo "{}";
			redirect('/dashboard/products');
		}else{
			redirect('/main/admin');
		}	
	}

	/* ---------------------------
	 *  Process deleting products
	 */
	public function delete_product($id){
		if($this->session->userdata('is_admin') === true){ //check if admin
			$this->load->model('dashboard_model');
			$this->dashboard_model->delete_product($id);
			echo "{}";
		}else{
			redirect('/main/admin');
		}
	}

	public function delete_product_processs(){

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
		redirect("/main");
	}


	/* ---------------------------
	 *  Helper functions
	 */
	private function process_product($id){
		$array = false;
		if($this->input->post()){
			$array = array(
				'id' => $id, 
				'name' => $this->input->post('name'), 
				'description' => $this->input->post('description'), 
				'category' => $this->input->post('category'), 
				'image' => $this->process_image()
				);
			if($this->input->post('new-category')){
				$array['category'] = $this->input->post('new-category');
			}
			if($this->input->post('image-title')){
				$array['image'] = $this->input->post('image-title');
			}
		}
		return $array;
	}
	private function process_image(){
		$image = null;
		if(!empty($_FILES['image']) 
				&& $_FILES['image']['size'] <= 5*1024*1024
				&& ( strcmp($_FILES['image']['type'], "image/jpg") === 0
					|| strcmp($_FILES['image']['type'], "image/png") === 0 
					|| strcmp($_FILES['image']['type'], "image/jpeg") === 0
					|| strcmp($_FILES['image']['type'], "image/gif") === 0 )
			){
			$image = $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], './assets/images/'.$_FILES['image']['name']);	
		}
		return $image;
	}

}

//end of main controller