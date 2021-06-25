<?php
    class Cthongtincanhan extends CI_Controller {
        public function __construct() {
	    	parent::__construct();
	    	$this->load->model('Mthongtincanhan');
	    }
        public function index(){
            if($this->input->post('mail')=="mail"){
                $this->mail();
            }
        $session = $this->session->userdata("user");
        
        $sinhvien['thongtincoban'] 	= $this->Mthongtincanhan->getThongtincoban($session['taikhoan']);
        $sinhvien['hanhchinh'] 	= $this->Mthongtincanhan->getDonhanhchinh();
        $sinhvien['chuongtrinh'] 	= $this->Mthongtincanhan->getChuongtrinh();
        $sinhvien['link'] 	= $this->Mthongtincanhan->getLink($sinhvien['thongtincoban']['PK_sMaTK'],$sinhvien['chuongtrinh'][0]['PK_sMaChuongTrinh']);
        $temp = array(
            'template'  => 'Vthongtincanhan',
            'data'     	=> array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'sinhvien'  => $sinhvien,
            ),
        );
        // pr($temp);
        
        $this->load->view('layout/VContent',$temp);
	    }
        public function mail(){
            $config['protocol'] = 'smtp'; //Giao thức máy chủ mail
            $config['smtp_host'] = 'ssl://smtp.gmail.com'; //Địa chỉ host máy chủ mail
            $config['smtp_user'] = 'PPTphamthao@gmail.com'; //Địa chỉ Gmail sử dụng để gửi mail
            $config['smtp_pass'] = 'Couttaikhoan2'; //Mật khẩu của gmail gửi
            $config['smtp_port'] = '465'; //SMPT PORT
            $config['smtp_timeout'] = '5';
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            
            //Thực hiện gửi
            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");
            $this->email->from('PPTphamthao@gmail.com', 'Tên người gửi');
            $this->email->to('20A10010123@students.hou.edu.vn','Tên người nhận');
            $this->email->subject('GHI NỘI DUNG CỦA CHỦ ĐỀ MAIL Ở ĐÂY');
            $body='GHI NỘI DUNG CỦA MAIL Ở ĐÂY';
            $this->email->message($body);
            $this->email->send();
        }
    }
?>