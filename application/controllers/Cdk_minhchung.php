<?php 
class Cdk_minhchung extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mdk_minhchung');
    }
    public function index(){
        $session = $this->session->userdata("user");
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d");
        $sinhvien['chuongtrinh'] 	= $this->Mdk_minhchung->getChuongtrinh($date);
        $sinhvien['thongtincanhan']= $this->Mdk_minhchung->getTTcanhan($session['taikhoan']);
        $sinhvien['minhchung']= $this->Mdk_minhchung->getMinhchung($session['taikhoan']);
        
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
                $data['sTrangthai']="Chưa duyệt";
                $res=$this->db->where('PK_sMaTK',$masv)
                        ->update("tbl_taikhoan",$data);
                if($res>0){
                    setMessages("success", "Đăng ký hồ sơ thành công");
                }
				

            }else if($action=="update"){
                for ($k=0; $k <count($duongdan) ; ++$k) {
					//trường hợp mới thêm chương trình và chưa có minh chứng thì phải thêm minh chứng
                    if(empty($sinhvien['minhchung'][$k])){
                        $minhchung=array(
                        'PK_sMaMC'  => time().rand(1,1000).$k,
                        'FK_sMaSV'  => $masv,
                        'FK_sMaCT'  => $mact[$k],
                        'tLink'     => $duongdan[$k],
                        'sTrangthai'=>$trangthai

                        );
                        $this->db->insert("tbl_minhchung",$minhchung);
                    }
                    //Trường hợp đã có minh chứng và được quyền sửa đổi đường dẫn
                    else{
                        $minhchung = array(
                            'tLink'     => $duongdan[$k],
                            'FK_sMaCT'	=> $mact[$k]
                        );
                    }
					$this->db->where(array('FK_sMaSV'		=> $masv,
										   'FK_sMaCT'	    => $mact[$k]));
					$res=$this->db->update("tbl_minhchung", $minhchung);
				}
                if($res>0){
                    setMessages("success", "Cập nhật hồ sơ thành công");
                }
            }
            return redirect("dk_minhchung");
        }
        
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