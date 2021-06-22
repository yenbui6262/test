<?php
    class Cthongtincanhan extends CI_Controller {
        public function __construct() {
	    	parent::__construct();
	    	$this->load->model('Mthongtincanhan');
	    }
        public function index(){

        $session = $this->session->userdata("user");
        $sinhvien['thongtincoban'] 	= $this->Mthongtincanhan->getThongtincoban($session['taikhoan']);
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