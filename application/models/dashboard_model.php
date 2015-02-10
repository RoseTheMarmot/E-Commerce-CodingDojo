<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	
	function get_admin($email, $password){
		
		//TODO:----> add password encryption <------

		$query = "SELECT * FROM admins WHERE email = ? && password = ?";
		return $this->db->query($query, array($email, $password))->row_array();
	}

	function get_orders(){
		$query = "SELECT 
			    orders.id,
			    customers.first_name,
			    customers.last_name,
			    customers.created_at,
			    addresses.address,
			    addresses.address2,
			    addresses.city,
			    addresses.state,
			    addresses.zipcode,
			    Sum(products.price) as total,
			    orders.status
			FROM
			    orders
			        JOIN
			    relationships ON relationships.orders_id = orders.id
			        JOIN
			    customers ON customers.id = relationships.customers_id
			        JOIN
			    products ON relationships.products_id = products.id
					JOIN
				addresses ON addresses.id = customers.billing_id
			GROUP BY orders.id
			ORDER BY orders.id DESC";
		return $this->db->query($query)->result_array();
	}

	function get_orders_by_status($status){
		$query = "SELECT 
			    orders.id,
			    customers.first_name,
			    customers.last_name,
			    customers.created_at,
			    addresses.address,
			    addresses.address2,
			    addresses.city,
			    addresses.state,
			    addresses.zipcode,
			    SUM(products.price) AS total,
			    orders.status
			FROM
			    orders
			        JOIN
			    relationships ON relationships.orders_id = orders.id
			        JOIN
			    customers ON customers.id = relationships.customers_id
			        JOIN
			    products ON relationships.products_id = products.id
			        JOIN
			    addresses ON addresses.id = customers.billing_id
			WHERE
			    status = ?
			GROUP BY orders.id
			ORDER BY orders.id DESC";
		return $this->db->query($query, array($status))->result_array();
	}

	//--> TODO: get this search to work with total too (like caluse doesn't work with renamed columns)<---
	function get_orders_filter($filter){
		$query = "SELECT 
			    orders.id,
			    customers.first_name,
			    customers.last_name,
			    customers.created_at,
			    addresses.address,
			    addresses.address2,
			    addresses.city,
			    addresses.state,
			    addresses.zipcode,
			    SUM(products.price) AS total,
			    orders.status
			FROM
			    orders
			        JOIN
			    relationships ON relationships.orders_id = orders.id
			        JOIN
			    customers ON customers.id = relationships.customers_id
			        JOIN
			    products ON relationships.products_id = products.id
			        JOIN
			    addresses ON addresses.id = customers.billing_id
			WHERE
			    first_name LIKE '%".$filter."%'
			        OR last_name LIKE '%".$filter."%'
			        OR orders.created_at LIKE '%".$filter."%'
			        OR address LIKE '%".$filter."%'
			        OR address2 LIKE '%".$filter."%'
			        OR city LIKE '%".$filter."%'
			        OR state LIKE '%".$filter."%'
			        OR status LIKE '%".$filter."%'
			GROUP BY orders.id
			ORDER BY orders.id DESC";
		return $this->db->query($query)->result_array();
	}

	function get_order_by_id($id){
		$query = "SELECT 
			    orders.id,
			    customers.first_name,
			    customers.last_name,
			    billing.address,
			    billing.address2,
			    billing.city,
			    billing.state,
			    billing.zipcode,
			    shipping.address AS shipping_address,
			    shipping.address2 AS shipping_address2,
			    shipping.city AS shipping_city,
			    shipping.state AS shipping_state,
			    shipping.zipcode AS shipping_zipcode,
			    orders.status,
			    SUM(products.price) AS total
			FROM
			    orders
			        JOIN
			    relationships ON relationships.orders_id = orders.id
			        JOIN
			    customers ON customers.id = relationships.customers_id
			        JOIN
			    products ON products.id = relationships.products_id
			        JOIN
			    addresses AS billing ON billing.id = customers.billing_id
			        JOIN
			    addresses AS shipping ON shipping.id = customers.shipping_id
			WHERE
			    orders.id = ?
			GROUP BY orders.id";
		return $this->db->query($query, array($id))->row_array();
	}

	function get_order_items($id){
		$query = "SELECT 
			    products.id,
			    products.name,
			    products.price,
			    relationships.quantity,
			    relationships.quantity * products.price as total
			FROM
			    orders
			        JOIN
			    relationships ON relationships.orders_id = orders.id
			        JOIN
			    customers ON customers.id = relationships.customers_id
			        JOIN
			    products ON products.id = relationships.products_id
			        JOIN
			    addresses AS billing ON billing.id = customers.billing_id
			        JOIN
			    addresses AS shipping ON shipping.id = customers.shipping_id
			WHERE
			    orders.id = ?";
    	return $this->db->query($query, array($id))->result_array();
	}

	function change_order_status($id, $status){
		$this->input->post('');
		$query = "UPDATE orders SET status = ? WHERE id = ?";
		return $this->db->query($query, array($status, $id));
	}

	function get_products(){
		$query = "SELECT 
			    products.id,
			    products.name,
			    products.inventory,
			    SUM(relationships.quantity) AS sold
			FROM
			    products
			        JOIN
			    relationships ON relationships.products_id = products.id
			GROUP BY products.id
			ORDER BY products.id ASC";
		return $this->db->query($query)->result_array();
	}

	//--> TODO: get this search to work with quantity sold too <---
	function get_products_filter($filter){
		$query = "SELECT 
			    products.id,
			    products.name,
			    products.inventory,
			    SUM(relationships.quantity) AS sold
			FROM
			    products
			        JOIN
			    relationships ON relationships.products_id = products.id
			WHERE
			    products.id LIKE '%".$filter."%'
			        OR products.name LIKE '%".$filter."%'
			        OR products.inventory LIKE '%".$filter."%'
			GROUP BY products.id
			ORDER BY products.id ASC";
		return $this->db->query($query)->result_array();
	}
}