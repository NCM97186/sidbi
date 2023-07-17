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
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['frontuser'] = "home";

/*** certificate ***/
$route['certificate/(:num)'] = "certificate";
$route['zwemschool'] = "certificate";
$route['certificate/add']="certificate/add";
$route['organization/(:num)'] = "organization";
$route['organization/add']="organization/add";
$route['dashboard'] = "home/dashboard";
$route['contactus'] = "home/contactus";

/*** tcbp ***/
$route['tcbp/(:num)'] = "tcbp";
$route['tcbp'] = "tcbp";
$route['tcbp/add']="tcbp/add";

$route['verifier-manager/(:num)'] = "tcbp/verifierlist";
$route['verifier-manager'] = "tcbp/verifierlist";
$route['approval-manager/(:num)'] = "tcbp/approverlist";
$route['approval-manager'] = "tcbp/approverlist";
$route['tcbp/rejectdoc'] = "tcbp/rejectdoc";
$route['tcbp/rejectdoc/(:num)'] = "tcbp/rejectdoc";
$route['tcbp/verifydoc'] = "tcbp/verifydoc";
$route['tcbp/verifydoc/(:num)'] = "tcbp/verifydoc";
$route['tcbp/approvedoc'] = "tcbp/approvedoc";
$route['tcbp/approvedoc/(:num)'] = "tcbp/approvedoc";


/*** task-list ***/
$route['task-list'] = "tcbp";
$route['task-list/(:num)'] = "tcbp";
$route['task-list/add']="tcbp/add";
$route['task-list/deletedoc']="tcbp/deletedoc";
$route['task-list/deletedoc/(:num)']="tcbp/deletedoc";

/*** Alltasklist ***/
$route['alltasks/(:num)'] = "tcbp/getalltasks";
$route['alltasks'] = "tcbp/getalltasks";
$route['approvereport'] = "tcbp/approvereport";
/*** task-manager ***/
$route['task-manager/(:num)'] = "tcbp/taskmanager";
$route['task-manager'] = "tcbp/taskmanager";
$route['task-manager/add']="tcbp/add";
$route['task-manager/finalsave']="tcbp/finalsave";
/*** state-list ***/
$route['state-list/(:num)'] = "tcbp/statelist";
$route['state-list'] = "tcbp/statelist";
$route['state-list/add']="tcbp/statelistadd";

/*** users ***/
$route['user-profile/(:any)'] = "user/userprofile";
$route['user-profile'] = "user/userprofile";
$route['change-password'] = "user/changepassword";
$route['register'] = "user/register";
$route['register/captcha_refresh'] = "user/captcha_refresh";
$route['users-list/(:num)'] = "user";
$route['users-list'] = "user";
/*** Image upload ***/
$route['documentshow/(:num)'] = "tcbp/documentshow";
$route['download/(:num)'] = "tcbp/download";
$route['download'] = "tcbp/download";
