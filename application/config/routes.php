<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = '';
$route['viewproduct/(:any)'] = 'welcome/viewproduct/$1';
$route['search'] = 'welcome/search';
$route['products'] = 'welcome/product_filter';
$route['category'] = 'welcome/category';
$route['languageswitcher/(:any)'] = 'welcome/languageswitcher/$1';
$route['contact'] = 'welcome/contact';
$route['subcategory/(:any)'] = 'welcome/getsubcategory/$1';
$route['innercategory/(:any)'] = 'welcome/innercategory/$1';
$route['product/(:any)'] = 'welcome/getproduct/$1';
$route['showproduct/(:any)'] = 'welcome/showproduct/$1';
$route['login'] = 'welcome/login';
// $route['price/list'] = 'welcome/get_price_list';
$route['price/list'] = 'welcome/price_list_product';
// $route['price/list/products/(:any)'] = 'welcome/price_list_product/$1';
$route['price/list/showproducts/(:any)'] = 'welcome/pricelistshowproducts/$1';
$route['logout'] = 'welcome/logout';

//admin
$route['admin/users/all'] = 'admin/user_registeration';
$route['admin/users/add'] = 'admin/add_user';
$route['admin/add/user'] = 'admin/add_user';
$route['admin/edit/user/(:any)'] = 'admin/add_user/$1';
$route['admin/delete/user/(:any)'] = 'admin/delete_user/$1';
// $route['price-list'] = 'welcome/price_list_page';
$route['price-list'] = 'welcome/price_list_product';
$route['send_message'] = 'welcome/send_message';



/* End of file routes.php */
/* Location: ./application/config/routes.php */