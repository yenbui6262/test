<?php 
class Cduyet_minhchung extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mduyet_minhchung');
    }
    public function index(){
        $session=$this->session->userdata('user');
        $sinhvien['thongtincoban'] 	= $this->Mduyet_minhchung->getThongtincoban("20A10010123");
        $sinhvien['lop'] 	= $this->Mduyet_minhchung->getLop();
        $temp = array(
            'template'  => 'Vduyet_minhchung',
            'data'     	=> array(
                'session'   => $session,
                'message' 	=> getMessages(),
                'sinhvien'  =>$sinhvien,
            ),
        );
        
        // pr($temp);
        $this->load->view('layout/VContent',$temp);
    }
}
?>