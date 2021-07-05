<?php
    class Cthongtincanhan extends MY_Controller {
        public function __construct() {
	    	parent::__construct();
	    	$this->load->model('Mthongtincanhan');
	    }
        public function index(){
            
        $session = $this->session->userdata("user");
        // pr($session);
        $sinhvien['thongtincoban'] 	= $this->Mthongtincanhan->getThongtincoban($session['taikhoan']);
        $sinhvien['lop'] 	= $this->Mthongtincanhan->getLop();

        if($this->input->post("action")){
            $email= $this->input->post("sEmail");
            $acc=$session['taikhoan'];
            
            if($this->input->post("newPass") != '' && $this->input->post("rePass") != 0){
                $newPass    = sha1($this->input->post("newPass") );
                $reNewPass  = sha1($this->input->post("rePass"));
                if($newPass == $reNewPass){
                    $kiemTraMatKhauTrung = true;
                }else{
                    $kiemTraMatKhauTrung = false;
                }
            }
            if($this->input->post("oldPass") != ''&& $kiemTraMatKhauTrung = true ){
                $oldPass = sha1($this->input->post("oldPass"));
                $acc=$session['taikhoan'];

                $xacDinhMatKhau = $this->Mthongtincanhan->checkPass($oldPass, $acc );
                  
            }
            
            if($xacDinhMatKhau == 0){        
                $thongTinCapNhat = array(
                    //ko thay đổi mật khẩu
                    'PK_sMaTK' 	    => $acc,
                    'tEmail'        =>$email,
                );
            }else{
                $thongTinCapNhat = array(
                    'PK_sMaTK' 	    => $acc,
                    'tEmail'        =>$email,
                    'sMatkhau'      => $newPass,
                );
            }
            $row = $this->Mthongtincanhan->capnhat($thongTinCapNhat,$acc );
            if($row > 0){
				setMessages('success','Cập nhật thành công','Thông báo');
                
			}else{
				setMessages('danger','cập nhật thất bại','Thông báo');
			}
			redirect('thongtincanhan');
        }
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
    }
?>