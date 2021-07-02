<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cemail extends MY_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->library('email');
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

    /* Gui thong bao qua mail cho sinh vien khi ho so cua ho duoc duyet*/
//     private function sendMailSuccess($nguoinhan) {
//         $subject = "Thông báo";
//         $noidungMail = "Hồ sơ của bạn đã được phê duyệt";

//         $this->email->from('hoisinhvien.hou@gmail.com', 'Hệ thống cơ sở dữ liệu sinh viên 5 tốt');
//         // tiêu đề email
//         $this->email->subject($subject);
//         // nội dung email
//         $this->email->message($noidungMail);
//         // $this->email->message($noidungMail);
//         // gửi email cho cả đơn vị và cá nhân
//         $this->email->to($nguoinhan);

//         if ($this->email->send()) {
//             return true;
//         }else{
//             show_error($this->email->print_debugger());
//             return false;
//         }

//     }

//     /* Gui cac tieu chi chua dat cho sinh vien*/
//     private function sendMailError($nguoinhan, $arrtieuchi) {
//         $subject = "Thông báo";
//         $noidungMail = "Các mục chưa đạt yêu cầu: ";
//         for($i=0, $len = count($arrtieuchi); $i < $len; ++$i){
//             if($i < $len - 1){
//                 $noidungMail .= $arrtieuchi[$i].", ";
//             }
//             else{
//                 $noidungMail .= $arrtieuchi[$i].'.';
//             }
//         }
//         $this->email->from('PPTphamthao@gmail.com', 'Hệ thống Minh chứng kinh tế');
//         // tiêu đề email
//         $this->email->subject($subject);
//         // nội dung email
//         $this->email->message($noidungMail);
//         // $this->email->message($noidungMail);
//         // gửi email cho cả đơn vị và cá nhân
//         $this->email->to($nguoinhan);
//         /*
//         *   ccemail cho 1 người thì sẽ thông báo cho người đó về cuộc trò chuyện, và người nhận mail cũng biết điều đó
//         *   bcc cho 1 người thì giống với cc chỉ khác là người nhận mail ko biết người gửi đã cc cho người khác
//         */

//         // cc email cho ban giám hiệu
// /*        if($typeBanGiamHieu == 'ccEmail'){
//             $this->email->cc($banGiamHieu);
//         }*/
//         if ($this->email->send()) {
//             return true;
//         }else{
//             show_error($this->email->print_debugger());
//             return false;
//         }
//     }

    private function init(){
         //cấu hình chuẩn bị gửi email
        $config['protocol']     = "smtp";
        $config['smtp_host']    = "ssl://smtp.gmail.com";
        $config['smtp_port']    = 465;
        // $config['smtp_user'] = "lichtuan.hou@gmail.com";
        $config['smtp_user']    = "PPTphamthao@gmail.com";
        $config['smtp_pass']    = "Couttaikhoan2";
        $config['mailtype']     = 'html';
        $config['newline']      = "\r\n";
        $config['charset']      = "utf-8";
        $config['wordwrap']     = TRUE;

        //khởi tạo tham số cấu hình email
        $this->email->initialize($config);
    }
}