<?php 
class Cdk_minhchung extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mdk_minhchung');
    }
    public function index(){
        $session = $this->session->userdata("user");
        $sinhvien['chuongtrinh'] 	= $this->Mdk_minhchung->getChuongtrinh();
        $sinhvien['link'] 	= $this->Mdk_minhchung->getLink($session['taikhoan'],$sinhvien['chuongtrinh'][0]['PK_sMaChuongTrinh']);
        
        $temp = array(
            'template'  => 'Vdk_minhchung',
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