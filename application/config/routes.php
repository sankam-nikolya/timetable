<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
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

$route['default_controller'] = "shedule";
$route['fulltime'] = "shedule";
$route['parttime'] = "shedulezao";
$route['auth'] = "auth";
$route['admin'] = "admin_shedule";

$route['admin/announcements'] = "admin_ads";
$route['admin/announcements/(:num)'] = 'admin_ads';
$route['admin/announcements/add'] = "admin_ads/add_view";
$route['admin/announcements/add_db'] = "admin_ads/add_db";
$route['admin/announcements/edit/(:num)'] = "admin_ads/edit_view";
$route['admin/announcements/edit_data_json'] = "admin_ads/edit_data_json";
$route['admin/announcements/edit_data_json/(:num)'] = "admin_ads/edit_data_json/$1";
$route['admin/announcements/update_db/(:num)'] = "admin_ads/update_db/$1";
$route['admin/announcements/delete_db/(:num)'] = "admin_ads/delete_db/$1";

$route['admin/shedule'] = "admin_shedule";
$route['admin/shedule/add'] = "admin_shedule/add_datepick_view";
$route['admin/shedule/edit'] = "admin_shedule/edit_datepick_view";
$route['admin/audit/edit'] = "admin_shedule/edit_datepick_audit_view";
$route['admin/teachers'] = "admin_shedule/teachers_list_view";
$route['admin/subjects'] = "admin_shedule/subjects_list_view";
$route['admin/statistics'] = "admin_statistics/statistics";
//$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */