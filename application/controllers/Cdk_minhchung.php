<?php 
class Cdk_minhchung extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mdk_minhchung');
    }
    public function index(){
        $session = $this->session->userdata("user");
        
        if($action=$this->input->post("action")){
            $session    = $this->session->userdata('user');
            $mact       = $this->input->post('chuongtrinh');
            $masv       = $session['taikhoan'];
            $duongdan  = $this->input->post('duongdan');

            // echo $minhchung;exit();
            $trangthai  = "Chưa duyệt";
            if($action=="addminhchung"){
                $minhchung = array();
                for ($k=0; $k <count($duongdan) ; ++$k) {
                    array_push($minhchung,array(
                        'PK_sMaMC'  => time().rand(1,1000).$k,
                        'FK_sMaSV'  => $masv,
                        'FK_sMaCT'  => $mact[$k],
                        'tLink'     => $duongdan[$k],
                        'sTrangthai'=>$trangthai

                    ));
                }
                // pr($minhchung);
                // exit();
                $this->db->insert_batch("tbl_minhchung",$minhchung);
                $data=array(
                    'sTrangthai'=>"Chưa duyệt"
                );
                $this->db->where('PK_sMaTK',$masv)
                        ->update("tbl_taikhoan",$data);
				setMessages("success", "Đăng ký hồ sơ thành công");
            }
            if($action=="update"){
                echo "update";
                exit();
            }
            return redirect("dk_minhchung");
        }
        

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d");
        $sinhvien['chuongtrinh'] 	= $this->Mdk_minhchung->getChuongtrinh($date);
        $sinhvien['thongtincanhan']= $this->Mdk_minhchung->getTTcanhan($session['taikhoan']);
        foreach($sinhvien['chuongtrinh'] as $chimuc => $giatri){
            $sinhvien['link'][$chimuc] 	= $this->Mdk_minhchung->getLink($session['taikhoan'],$sinhvien['chuongtrinh'][$chimuc]['PK_sMaChuongTrinh']);
            
        };

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