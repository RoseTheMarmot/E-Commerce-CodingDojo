<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
$route['404_override'] = '';

$route['view/merch/(:num)'] = "main/merch_page/$1";
$route['view/(:any)'] = "main/homepage/$1";
$route['views/homepage'] = "main/select_category";

$route['carts'] = "main/carts";
$route['pay'] = "main/pay";

$route['orders/show/(:num)'] = "dashboard/single_order/$1";



//end of routes.php


