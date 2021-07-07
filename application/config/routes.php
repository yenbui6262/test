<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//trang chu
$route['dangnhap'] 		                = 'Clogin'; 
$route['dangxuat'] 		                = 'Clogin/logout'; 
$route['Home']                          = 'CHome';
$route['hanhchinh']                     = 'Chanhchinh';
$route['hanhchinh/(:num)']              = 'Chanhchinh/index/$1';
$route['Chuongtrinh']                   = 'Cchuongtrinh';
$route['Chuongtrinh/(:num)']            = 'Cchuongtrinh/index/$1';
$route['quanlyminhchung']               = 'Cquanlyminhchung';
$route['quanlyminhchung/(:num)']		= 'Cquanlyminhchung/index/$1';
$route['chitietsinhvien']               = 'Cchitietsinhvien';
$route['chitietsinhvien/(:num)']		= 'Cchitietsinhvien/index/$1';
$route['thongkeminhchung']              = 'Cthongkeminhchung';
$route['thongkeminhchung/(:num)']		= 'Cthongkeminhchung/index/$1';

$route['thongtincanhan']                = 'Cthongtincanhan';
$route['dk_minhchung']                  = 'Cdk_minhchung';
$route['dk_minhchung/(:num)']           = 'Cdk_minhchung/index/$1';
$route['dk_hanhchinh']                  = 'Cdk_hanhchinh';
$route['quanlyhanhchinh']               = 'Cduyethanhchinh';
$route['quanlyhanhchinh/(:num)']		= 'Cduyethanhchinh/index/$1';
$route['mail'] 						    = 'Cemail';
$route['sendmail'] 					    = 'Cemail/sending_email';

$route['default_controller'] = 'Clogin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
