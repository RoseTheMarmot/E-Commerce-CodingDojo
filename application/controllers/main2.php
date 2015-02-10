<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Main extends CI_Controller {

  public function index()
  {
    $this->load->view("carts");
  }  

  public function carts()
  {
    $items = array();
    $cart = $this->session->userdata('cart');
    if($cart)
    {
      foreach ($cart as $item)
      {
        foreach($item as $key => $value)
        {
          $prod_id = $key;
          $one_item= $this->product->get_product_by_id($prod_id);
          $items['items'][] = array(
            "id" => $one_item['id'],
            "name" => $one_item['name'],
            "price" => $one_item['price'],
            "qty" => $value,
            "total" => (($one_item['price'])*($value))
            );
        }
      }
    }
    $this->load->view('carts_page', $items);
  }
  public function buy($id)
  {
    $cart_qty = $this->session->userdata('cart_qty');
    $cart = $this->session->userdata('cart');
    $item['id'] = $id;
    $item['qty'] = $this->input->post('qty');
    $cart_qty += $item['qty'];
    $cart_item = array(
        "{$item['id']}" => $item['qty']
        );
    // $cart_item[$item['id']] = $item['qty'];
    $cart[] = $cart_item;
    $this->session->set_userdata('cart', $cart);
    $this->session->set_userdata('cart_qty', $cart_qty);
    redirect('/products/carts');
  }
}