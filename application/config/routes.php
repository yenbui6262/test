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
$route['thongkesinhvien']               = 'Cthongkesinhvien';
$route['thongkesinhvien/(:num)']		= 'Cthongkesinhvien/index/$1';
$route['chitietsinhvien']               = 'Cchitietsinhvien';
$route['thongtinchuongtrinh']           = 'Cthongtinchuongtrinh';
$route['thongtinchuongtrinh/(:num)']	= 'Cthongtinchuongtrinh/index/$1';
$route['thongtincanhan']                = 'Cthongtincanhan';
$route['hososinhvien']                  = 'Chososinhvien';
$route['xacnhanthamgia']                = 'Cxacnhanthamgia';
$route['xacnhanthamgia/(:num)']         = 'Cxacnhanthamgia/index/$1';
$route['dk_minhchung']                  = 'Cdk_minhchung';
$route['dk_minhchung/(:num)']           = 'Cdk_minhchung/index/$1';
$route['dk_hanhchinh']                  = 'Cdk_hanhchinh';
$route['dk_hanhchinh/(:num)']           = 'Cdk_hanhchinh/index/$1';
$route['quanlyhanhchinh']               = 'Cduyethanhchinh';
$route['quanlyhanhchinh/(:num)']		= 'Cduyethanhchinh/index/$1';
$route['quanlytaikhoan']                = 'Cquanlytaikhoan';
$route['quanlytaikhoan/(:num)']         = 'Cquanlytaikhoan/index/$1';
$route['quanlylophoc']                  = 'Cquanlylophoc';
$route['quanlylophoc/(:num)']           = 'Cquanlylophoc/index/$1';
// $route['don'] 						    = 'Cword';

$route['mail'] 						    = 'Cemail';
$route['sendmail'] 					    = 'Cemail/sending_email';
$route['themchuongtrinh']               = 'Cthemchuongtrinh';
$route['suachuongtrinh']                = 'Cthemchuongtrinh';


$route['default_controller'] = 'Clogin';
$route['404_override'] 				    = 'C404';
$route['403_Forbidden'] 			    = 'C403';
$route['translate_uri_dashes'] = FALSE;
