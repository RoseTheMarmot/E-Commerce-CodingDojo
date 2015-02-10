<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
$route['404_override'] = '';
$route['orders/show/(:num)'] = "dashboard/single_order/$1";

//end of routes.php