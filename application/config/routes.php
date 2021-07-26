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
$route['duyetminhchung']                = 'Cduyetminhchung';
$route['duyetminhchung/(:num)']		    = 'Cduyetminhchung/index/$1';
$route['chitietminhchung']              = 'Cchitietminhchung';
$route['chitietminhchung/(:num)']		= 'Cchitietminhchung/index/$1';
$route['thongkeminhchung']              = 'Cthongkeminhchung';
$route['thongkeminhchung/(:num)']		= 'Cthongkeminhchung/index/$1';
$route['thongkesinhvien']              = 'Cthongkesinhvien';
$route['thongkesinhvien/(:num)']		= 'Cthongkesinhvien/index/$1';

$route['thongtincanhan']                = 'Cthongtincanhan';
$route['hososinhvien']                  = 'Chososinhvien';
$route['dk_minhchung']                  = 'Cdk_minhchung';
$route['dk_minhchung/(:num)']           = 'Cdk_minhchung/index/$1';
$route['dk_hanhchinh']                  = 'Cdk_hanhchinh';
$route['quanlyhanhchinh']               = 'Cduyethanhchinh';
$route['quanlyhanhchinh/(:num)']		= 'Cduyethanhchinh/index/$1';
$route['capbangdiem']                   = 'Cword/capbangdiem';
$route['huymonhoc']                     = 'Cword/huymonhoc';
$route['vayvonnganhang']                = 'Cword/vayvonnganhang';
$route['mail'] 						    = 'Cemail';
$route['sendmail'] 					    = 'Cemail/sending_email';

$route['default_controller'] = 'Clogin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
