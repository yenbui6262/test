<?php
    class Chososinhvien extends MY_Controller {
        public function __construct() {
	    	parent::__construct();
	    	$this->load->model('Mhososinhvien');
	    }
        public function index(){
            
        $session = $this->session->userdata("user");
        // pr($session);
        $sinhvien['thongtincoban'] 	= $this->Mhososinhvien->getThongtincoban($session['taikhoan']);
        $sinhvien['lop'] 	= $this->Mhososinhvien->getLop();

       
       $temp = array(
            'template'  => 'Vhososinhvien',
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