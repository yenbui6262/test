<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cemail extends MY_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->library('email');
        $this->load->model('Memail');
        $this->init();

    }

    
    public function index() {
        if($action = $this->input->post("action")){
            if($action == "laylaimatkhau"){
                $taikhoan = $this->input->post("username");
                $email = $this->input->post("email");

                $this->db->select("PK_sMaTK");
                $this->db->where("PK_sMaTK", $taikhoan);
                $this->db->from("tbl_taikhoan");
                $row = $this->db->count_all_results();
                
                if($row > 0){
                    $newPass = substr(sha1(rand(10,100)), rand(0,34), 6);
                    // update lai mat khau
                    $this->db->where("PK_sMaTK", $taikhoan)
                    ->set("sMatKhau", sha1($newPass))
                    ->update("tbl_taikhoan");
                    $this->sendPass($taikhoan, $email, $newPass);
                }
                echo $row;
            }

            if($action == "notifierFail"){
                $mact      =   $this->input->post("mact");
                $res        =   $this->sendMailError($mact);
                return $res;
            }
        }
    }   

    private function sendPass($taikhoan, $email, $newPass) {
        $subject = "Cấp lại mật khẩu cho tài khoản có mã sinh viên ".$taikhoan;
        $noidungMail = "Mật khẩu mới là ".$newPass.". Vui lòng đổi lại mật khẩu mới để tiếp tục sử dụng.";

        $this->email->from('PPTphamthao@gmail.com', 'Hệ thống Minh chứng kinh tế');
        // tiêu đề email
        $this->email->subject($subject);
        // nội dung email
        $this->email->message($noidungMail);
        // $this->email->message($noidungMail);
        // gửi email cho cả đơn vị và cá nhân
        $this->email->to($email);

        if ($this->email->send()) {
            return true;
        }else{
            show_error($this->email->print_debugger());
            return false;
        }
    }

    /* Gui cac tieu chi chua dat cho sinh vien*/
    private function sendMailError($mact) {
        $tenct = $this->Memail->gettenct($mact)[0]['sTenCT'];
        $subject = "Thông báo";
        $noidungMail = "Yêu cầu xác nhận tham gia chương trình: ".$tenct;
        $dsnguoinhan = $this->Memail->getsinhvienchuaxacnhan($mact);

        $this->email->from('kinhte.hou@.edu.vn', 'Hệ thống Minh chứng - Tư vấn Khoa kinh tế HOU');
        // tiêu đề email
        $this->email->subject($subject);
        // nội dung email
        $this->email->message($noidungMail);

        foreach ($dsnguoinhan as $key => $value) {
            if(!empty($value['tEmail'])){
                $this->email->bcc($value['tEmail']);
            }
        }

        if ($this->email->send()) {
            return true;
        }else{
            show_error($this->email->print_debugger());
            return false;
        }
    }

    private function init(){
         //cấu hình chuẩn bị gửi email
        $config['protocol']     = "smtp";
        $config['smtp_host']    = "ssl://smtp.gmail.com";
        $config['smtp_port']    = 465;
        $config['smtp_user']    = "emailkinhte";
        $config['smtp_pass']    = "passkinhte";
        $config['mailtype']     = 'html';
        $config['newline']      = "\r\n";
        $config['charset']      = "utf-8";
        $config['wordwrap']     = TRUE;

        //khởi tạo tham số cấu hình email
        $this->email->initialize($config);
    }
}