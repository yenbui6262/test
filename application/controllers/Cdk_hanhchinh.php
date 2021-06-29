<?php 
class Cdk_hanhchinh extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mdk_hanhchinh');
    }
    public function index(){
        $session = $this->session->userdata("user");
        $masv = $session['taikhoan'];
        $mahc = $this->input->post("id");
        if($action = $this->input->post("action")){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date("Y-m-d");
            if($action == "add"){
                $donhc = array();
                    array_push($donhc,array(
                        'PK_sMaDangKy'      => time().rand(9999,9999),
                        'FK_sMaSV'          => $masv,
                        'FK_sMaCanbo'       => "admin",
                        'FK_sMaHanhChinh'   => $mahc,
                        'dTGThem'           =>$date,
                        'iTrangThai'=>"Chưa duyệt"

                    ));
                $this->db->insert_batch("tbl_dangkydon",$donhc);
                // setMessages("success", "Đăng ký hồ sơ thành công");
            }else{
                //action=deletehc - huy dang ky
                $this->db->where('FK_sMaHanhChinh',$mahc)
                        ->delete("tbl_dangkydon");
                
            }
            setMessages("success", "Cập nhật thành công");
        }
        
        $sinhvien['thongtincanhan']= $this->Mdk_hanhchinh->getTTcanhan($session['taikhoan']);
        $sinhvien['hanhchinh']= $this->Mdk_hanhchinh->getHanhchinh();
        $sinhvien['don']= $this->Mdk_hanhchinh->getTrangthai($masv);
        foreach($sinhvien['hanhchinh'] as $chimuc => $giatri){
            $sinhvien['don'][$chimuc] 	= $this->Mdk_hanhchinh->checkMahc($giatri['PK_sMaHanhChinh']);
        };
        
        $temp = array(
            'template'  => 'Vdk_hanhchinh',
            'data'     	=> array(
                'session'   => $session,
                'message' 	=> getMessages(),
                'sinhvien'  => $sinhvien,
            ),
        );
        
        // pr($temp);
        $this->load->view('layout/VContent',$temp);
    }
}
?>