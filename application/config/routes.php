<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//trang chu
$route['dangnhap'] 		= 'Clogin'; 
$route['dangxuat'] 		= 'Clogin/logout'; 
$route['Home']          = 'CHome';
$route['Chuongtrinh']   = 'Cchuongtrinh';
$route['thongtincanhan']='Cthongtincanhan';
$route['hososinhvien']='Chososinhvien';
$route['mail'] 						= 'Cemail';
$route['sendmail'] 					= 'Cemail/sending_email';

$route['doimatkhau'] 				= 'canhan/Cdoimatkhau';


$route['default_controller'] = 'Clogin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
