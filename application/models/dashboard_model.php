<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	function get_admin($email, $password){
		
		//TODO:----> add password encryption <------

		$query = "SELECT * FROM admins WHERE email = ? && password = ?";
		return $this->db->query($query, array($email, $password))->row_array();
	}

	function get_orders(){
		$query = "Select orders.id, customers.first_name, customers.last_name, orders.created_at, customers.address,
			customers.address2, customers.city, customers.state, Sum(products.price) as total, orders.status  
			FROM orders
			Join relationships on relationships.orders_id = orders.id
			Join customers on customers.id = relationships.customers_id
			Join products on relationships.products_id = products.id
			Group By orders.id
			Order by orders.id DESC";
		return $this->db->query($query)->result_array();
	}
}