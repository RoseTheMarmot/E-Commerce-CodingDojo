<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
$route['404_override'] = '';
$route['view/merch/(:num)'] = "main/merch_page/$1";

//end of routes.php