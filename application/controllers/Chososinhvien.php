<?php
    class Chososinhvien extends CI_Controller {
        public function __construct() {
	    	parent::__construct();
	    	$this->load->model('Mhososinhvien');
	    }
        public function index(){
        $session=$this->session->userdata("user");
        // $sinhvien['thongtincoban'] 	= $this->Mhososinhvien->getThongtincoban("20A10010123");
        // $sinhvien['hanhchinh'] 	= $this->Mhososinhvien->getDonhanhchinh();
        // $sinhvien['chuongtrinh'] 	= $this->Mhososinhvien->getChuongtrinh();
        // $sinhvien['link'] 	= $this->Mhososinhvien->getLink($sinhvien['thongtincoban']['20A10010123'],$sinhvien['chuongtrinh'][0]['PK_sMaChuongTrinh']);
        $temp = array(
            'template'  => 'Vhososinhvien',
            'data'     	=> array(
                'session'   =>$session,
                'message' 	=> getMessages(),
                // 'sinhvien'  => $sinhvien,
            ),
        );
        // pr($temp);
        
        $this->load->view('layout/VContent',$temp);
	    }
    }
?>