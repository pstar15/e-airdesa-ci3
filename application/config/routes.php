<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// home
$route['home'] = 'HomeController/home';
$route['syaratketentuan'] = 'HomeController/syaratketentuan';
$route['fitur'] = 'HomeController/fitur';
$route['inboxsimpan'] = 'HomeController/inboxsimpan';

// auth
$route['login'] = 'AuthController/login';
$route['loginproses'] = 'AuthController/loginproses';
$route['logout'] = 'AuthController/logout';
$route['register'] = 'AuthController/register';
$route['registerproses'] = 'AuthController/registerproses';

// panel
$route['panel'] = 'PanelController/dashboard';

// pelanggan
$route['panel/pelanggan'] = 'PanelController/pelanggan';
$route['panel/pelanggansimpan'] = 'PanelController/pelanggansimpan';
$route['panel/pelangganedit/(:any)'] = 'PanelController/pelangganedit/$1';
$route['panel/pelangganupdate/(:any)'] = 'PanelController/pelangganupdate/$1';
$route['panel/pelangganhapus/(:any)'] = 'PanelController/pelangganhapus/$1';

// petugas
$route['panel/petugas'] = 'PanelController/petugas';
$route['panel/petugassimpan'] = 'PanelController/petugassimpan';
$route['panel/petugasedit/(:any)'] = 'PanelController/petugasedit/$1';
$route['panel/petugasupdate/(:any)'] = 'PanelController/petugasupdate/$1';
$route['panel/petugashapus/(:any)'] = 'PanelController/petugashapus/$1';

// tagihan
$route['panel/riwayattagihan/(:any)'] = 'PanelController/riwayattagihan/$1';
$route['panel/tagihan'] = 'PanelController/tagihan';
$route['panel/tagihantambah'] = 'PanelController/tagihantambah';
$route['panel/tagihansimpan'] = 'PanelController/tagihansimpan';
$route['panel/tagihanedit/(:any)'] = 'PanelController/tagihanedit/$1';
$route['panel/tagihanupdate/(:any)'] = 'PanelController/tagihanupdate/$1';
$route['panel/tagihanhapus/(:any)'] = 'PanelController/tagihanhapus/$1';
$route['panel/tagihandetail/(:any)'] = 'PanelController/tagihandetail/$1';
$route['panel/tagihanupdatestatus/(:any)'] = 'PanelController/tagihanupdatestatus/$1';

// inbox
$route['panel/inbox'] = 'PanelController/inbox';
$route['panel/inboxdetail/(:any)'] = 'PanelController/inboxdetail/$1';
$route['panel/inboxhapus/(:any)'] = 'PanelController/inboxhapus/$1';


// notifikasi
$route['panel/notifikasi'] = 'PanelController/notifikasi';

// profile
$route['panel/profile'] = 'PanelController/profile';
$route['panel/profileupdate'] = 'PanelController/profileupdate';
