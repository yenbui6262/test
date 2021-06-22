<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//trang chu
$route['dangnhap'] 		= 'Clogin'; 
$route['dangxuat'] 		= 'Clogin/logout'; 
$route['Home']          = 'CHome';
$route['Chuongtrinh']   = 'Cchuongtrinh';
$route['thongtincanhan']='Cthongtincanhan';


$route['default_controller'] = 'Clogin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
