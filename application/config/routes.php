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
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['connexion'] = 'verifyLogin';
$route['home'] = 'home';
$route['parametrage']='home/parametrage';
$route['biblio/(:num)/(:num)']='home/biblio/$1/$2';
$route['biblio/(:num)']='home/biblio/$1';
$route['add-biblio']='home/add_biblio';
$route['add-sous-biblio']='home/add_sous_biblio';
$route['demande']='home/demandeSpecifique';
$route["list-sc"]='home/list_scat';
$route['download']='home/download/$file';
$route["notification"]='login/sendNotif';
$route['filtre']='home/excuteFiltre';
$route["tab-bib"]='/home/search_bib';
$route["config-lang"]='/Trans/editTrans';
$route['add-user']='home/addUser';
$route["select-lang/(:any)"]="LanguageSwitcher/switchLang/$1";
$route['delete-user/(:num)']='home/deleteUser/$1';
$route['delete-categ/(:num)']='home/delete_biblio/$1';
$route['delete-sous-categ/(:num)']='home/delete_sous_biblio/$1';
$route['projection/(:num)'] = 'home/projection/$1';
$route["delete-report/(:num)"]='home/delete_report_menu/$1';
$route["delete-category/(:num)"]='home/delete_categ_menu/$1';
$route["create-report"]='home/create_form';
$route["rename-report"]='home/rename_form';
$route["rename-category"]='home/rename_categ_form';
$route["delete-chart/(:num)"]='home/delete_chart/$1';
$route['logout'] = 'home/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
