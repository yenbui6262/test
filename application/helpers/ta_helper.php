<?php 
function setMessages($toastType = "", $title = "", $message = "") {
    $CI =& get_instance();
    $dataMessage = array(
        'type' => $toastType,
        'title' => $title,
        'message' => $message
    );
    $CI->session->set_flashdata('notification', $dataMessage);
}

function currentTime()
{
    return time();
}

function getMessages() {
    $CI =& get_instance();
    return $CI->session->flashdata('notification');
}

function pr($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    exit();
}
if(!function_exists('IsNullOrEmptyString')){
    function IsNullOrEmptyString($str){
		return (!isset($str) || trim($str) === '');
	}
}
if(!function_exists('is_image')){
    function is_image($path)
    {
        $a = getimagesize($path);
        $image_type = $a[2];
        
        if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
        {
            return true;
        }
        return false;
    }
}
if (!function_exists('setSession')) {
    function setSession($userdata)
    {
        $CI =& get_instance();
        return $CI->session->set_userdata('user',$userdata);
    }
}
if (!function_exists('getSession')) {
        function getSession()
        {
            $CI =& get_instance();
            return $CI->session->userdata('user');
        }
    }
    if (!function_exists('checkPermission')){
        function checkPermission($userLevel, $segment){
            $CI = & get_instance();
            $CI->load->model('Mlogin');
            return $CI->Mlogin->checkPermission($userLevel, $segment);
        }
    }

    if (!function_exists('getSegment')){
        function getSegment(){
            $CI =& get_instance();
            return $CI->uri->segment(1);
        }
    }
function setTenanh($ten)
{
    $s='';
    for($i=strlen($ten)-1; $i>0 ; $i--){
        $s=$s.$ten[$i];

        if($ten[$i]=='.'){
            break;
        }
    }
    $s=strrev($s);
    return $s;
}

function clean($str){
    if(!$str) return false;
    $unicode = array(
        'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
        'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
        'd'=>array('đ'),
        'D'=>array('Đ'),
        'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
        'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
        'i'=>array('í','ì','ỉ','ĩ','ị'),
        'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
        'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
        'O'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
        'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
        'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
        'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
        'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ')
    );
    foreach($unicode as $nonUnicode=>$uni){
        foreach($uni as $value)
            $str = @str_replace($value,$nonUnicode,$str);
        $str = preg_replace("/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/","-",$str);
        $str = preg_replace("/-+-/","-",$str);
        $str = preg_replace("/^\-+|\-+$/","",$str);
    }
    return strtolower($str);
}
function public_url($string=''){
    return base_url('public/' .$string);
}
function seoname($str){
    if(!$str) return false;
    $unicode = array(
        'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
        'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
        'd'=>array('đ'),
        'D'=>array('Đ'),
        'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
        'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
        'i'=>array('í','ì','ỉ','ĩ','ị'),
        'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
        'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
        'O'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
        'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
        'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
        'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
        'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
        '-'=>array(' ','&quot;','.','-–-')
    );
        foreach($unicode as $nonUnicode=>$uni){
            foreach($uni as $value)
            $str = @str_replace($value,$nonUnicode,$str);
            $str = preg_replace("/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/","-",$str);
            $str = preg_replace("/-+-/","-",$str);
            $str = preg_replace("/^\-+|\-+$/","",$str);
        }
        return strtolower($str);
    }
?>