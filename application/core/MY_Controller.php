<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
    protected $_session;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        // for login session
        if(current_url() != base_url() && current_url() != base_url('dangnhap') && current_url() != base_url('dangky'))
            if(empty($this->session->userdata('user'))){
                setMessages("warning","Vui lòng đăng nhập tài khoản!");
                return redirect(base_url());
            }
    }
    
} // End class

