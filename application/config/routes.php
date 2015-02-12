<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
$route['404_override'] = '';
$route['carts'] = "main/carts";
$route['pay'] = "main/pay";

//Alex
$route['view/merch/(:num)'] = "main/merch_page/$1";
$route['views/homepage'] = "main/select_category";

//succesful order
$route['success'] = "main/success";


//end of routes.php


