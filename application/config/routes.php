<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Book';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//-------------------------------------------------------------------------
//-------------------------------------------------------------------------

$route['login'] = 'Book/login';
$route['sign_up'] = 'Book/sign_up';
$route['mp_pin'] = 'Book/mp_pin';
$route['check_user'] = 'Book/check_user';
$route['forget_password'] = 'Book/forget_password';
$route['set_mp_pin'] = 'Book/set_mp_pin';
$route['dailysale_purchases'] = 'Book/dailysale_purchases';
$route['sale_purchases_list'] = 'Book/sale_purchases_list';
$route['credit_sale_purchases'] = 'Book/credit_sale_purchases';
$route['credit_sale_purchases_list'] = 'Book/credit_sale_purchases_list';
$route['logout'] = 'Book/logout';
$route['home'] = 'Book/home';
$route['graph'] = 'Book/graph';
$route['credit_view_details'] = 'Book/credit_view_details';

$route['confirm_payment'] = 'Book/confirm_payment';
$route['remind'] = 'Book/remind';
$route['supervisor_home'] = 'Book/supervisor_home';

$route['purchase_view_details'] = 'Book/purchase_view_details';
$route['business_details'] = 'Book/business_details';
$route['bussiness_visit'] ='Book/bussiness_visit';

$route['sorting'] = 'Book/sorting';

$route['profile'] = 'Book/profile';

$route['training'] = 'Book/training';
$route['training_viewDetails'] = 'Book/training_viewDetails';
$route['training_rating'] ='Book/training_rating';

$route['filter'] = 'Book/filter';
$route['check_validation'] = 'Book/check_validation';
//-------------------------------------------------------------------------
//-------------------------------------------------------------------------



//-------------------------------------------------------------------------
//-------------------------------------------------------------------------


$route['dashboard'] ='Admin/index';
$route['login_admin'] ='Admin/login_admin';
$route['admin_login'] = 'Admin/admin_login';
$route['change_password'] = 'Admin/change_password';
$route['supervisor'] ='Admin/supervisor';
$route['add_supervisor'] = 'Admin/add_supervisor';
$route['supervisor_list'] = 'Admin/supervisor_list';
$route['view_supervisor/(:any)'] = 'Admin/view_supervisor/$1';
$route['update_supervisor'] = 'Admin/update_supervisor';
$route['supervisor_password/(:any)'] = 'Admin/supervisor_password/$1';
$route['supervisor_update'] = 'Admin/supervisor_update';
$route['action'] = 'Admin/action';
$route['sales_cash'] ='Admin/sales_cash';
$route['sales_cash_export'] = 'Admin/sales_cash_export';
$route['sales_credit'] = 'Admin/sales_credit';
$route['sales_credit_export'] = 'Admin/sales_credit_export';
$route['purchase_cash'] = 'Admin/purchase_cash';
$route['purchase_credit'] = 'Admin/purchase_credit';
$route['purchase_cash_export'] = 'Admin/purchase_cash_export';
$route['purchase_credit_export'] = 'Admin/purchase_credit_export';
$route['user'] = 'Admin/user';
$route['user_list/(:any)'] = 'Admin/user_list/$1';
$route['add_user'] = 'Admin/add_user';
$route['user_list'] = 'Admin/user_list';
$route['assign_user/(:any)'] = 'Admin/assign_user/$1';
$route['update_assign_user'] = 'Admin/update_assign_user';
$route['user_export'] = 'Admin/user_export';
$route['trainings'] = 'Admin/trainings';
$route['add_training'] = 'Admin/add_training';
$route['training_list'] ='Admin/training_list';
$route['supervisor_user_list/(:any)'] = 'Admin/supervisor_user_list/$1';
$route['assign_users/(:any)'] = 'Admin/assign_users/$1';
$route['update_assign_users'] = 'Admin/update_assign_users';
$route['view_training/(:any)'] = 'Admin/view_training/$1';
$route['update_training'] = 'Admin/update_training';
$route['bussiness_visit_list'] ='Admin/bussiness_visit_list';
$route['bussiness_visit_export'] = 'Admin/bussiness_visit_export';
$route['bussiness_status/(:any)']='Admin/bussiness_status/$1';
$route['bussiness_register_status/(:any)'] = 'Admin/bussiness_register_status/$1';
$route['assign_supervisor/(:any)']  = 'Admin/assign_supervisor/$1';
$route['update_assign_supervisor'] = 'Admin/update_assign_supervisor'; 
$route['supervisor_history/(:any)'] = 'Admin/supervisor_history/$1';
$route['privacy_policy'] = 'Admin/privacy_policy';
$route['add_privacy_policy'] = 'Admin/add_privacy_policy';
$route['terms_conditions'] = 'Admin/terms_conditions';
$route['add_terms_conditions'] = 'Admin/add_terms_conditions';
$route['Privacy_Policy'] = 'Admin/Privacy_Policys';
$route['Terms_Conditions'] = 'Admin/Terms_Conditionss';
 