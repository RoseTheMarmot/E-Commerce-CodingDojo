<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Controller {

  public function add_customer($customer)
  {
    // echo 'hello';
    // var_dump($customer);
    // put into customer table
    $query = "INSERT INTO addresses (address, address2, city, state, zipcode) VALUES (?,?,?,?,?)";
    $values = array($customer['address'], $customer['address_2'], $customer['city'], $customer['state'], $customer['zipcode']);
    $this->db->query($query, $values);

    // put into customers table
    $query2 = "INSERT INTO customers (first_name, last_name) VALUES (?,?)";
    $values2 = array($customer['first_name'], $customer['last_name']);
    $this->db->query($query2, $values2);
  }
}


