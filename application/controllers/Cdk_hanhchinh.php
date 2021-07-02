<?php 
class Cdk_hanhchinh extends MY_Controller {
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
                    $donhc=array(
                        'PK_sMaDangKy'      => time().rand(9999,9999),
                        'FK_sMaSV'          => $masv,
                        'FK_sMaCanbo'       => "admin",
                        'FK_sMaHanhChinh'   => $mahc,
                        'dTGThem'           =>$date,
                        'iTrangThai'        =>"0"

                    );
                $row=$this->Mdk_hanhchinh->insertHanhchinh($donhc);
            }else if($action == "deletehc"){
                //action=deletehc - huy dang ky
                $row=$this->Mdk_hanhchinh->deleteHanhchinh($mahc);
                
            }
            if($row>0){
                setMessages("success", "Cập nhật thành công");
            }
            
        }
        
        $sinhvien['thongtincanhan']= $this->Mdk_hanhchinh->getTTcanhan($session['taikhoan']);
        $sinhvien['hanhchinh']= $this->Mdk_hanhchinh->getHanhchinh($session['taikhoan']);
        
        $sinhvien['dondk']= $this->Mdk_hanhchinh->getDon($session['taikhoan']);
        
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