<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'authentication';
$route['404_override'] = 'Errorpage';
$route['translate_uri_dashes'] = TRUE;

//CUSTOM ROUTE LIST
$route['auth'] = 'Authentication';
$route['login'] = 'Authentication/index';
$route['logout'] = 'Authentication/logout';

//Restrict page route
$route['restrict-page'] = 'Errorpage/restrict_page';

$route['topik-skripsi'] = 'Topik/index';
$route['topik-skripsi/create'] = 'Topik/create';
$route['topik-skripsi/(:any)/(:num)'] = 'Topik/$1/$2';
