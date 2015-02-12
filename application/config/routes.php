<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
$route['404_override'] = '';

$route['view/merch/(:num)'] = "main/merch_page/$1";
$route['view/(:any)'] = "main/homepage/$1";
$route['views/homepage'] = "main/select_category";

<<<<<<< HEAD
<<<<<<< HEAD
//succesful order
$route['success'] = "main/success";
=======
=======
>>>>>>> 0864677f61543467355a1f043ba591013e5197ad
$route['carts'] = "main/carts";
$route['pay'] = "main/pay";

$route['orders/show/(:num)'] = "dashboard/single_order/$1";

<<<<<<< HEAD
>>>>>>> 0864677f61543467355a1f043ba591013e5197ad
=======
>>>>>>> 0864677f61543467355a1f043ba591013e5197ad


//end of routes.php


