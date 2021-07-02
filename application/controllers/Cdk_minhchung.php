<?php 
class Cdk_minhchung extends MY_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Mdk_minhchung');
    }
    public function index(){
        $session = $this->session->userdata("user");
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d");
        $sinhvien['chuongtrinh'] 	= $this->Mdk_minhchung->getChuongtrinh($date);
        foreach($sinhvien['chuongtrinh'] as $chimuc => $giatri){
            $sinhvien['dieukien'][$chimuc] 	= $this->Mdk_minhchung->dieukien($session['taikhoan'],$giatri['PK_sMaChuongTrinh'],$date);

        }
        if($this->input->post("action")=="update"){
            $session    = $this->session->userdata('user');
            $mact       = $this->input->post('chuongtrinh');
            $masv       = $session['taikhoan'];
            $duongdan  = $this->input->post('duongdan');
            $mamc       = $this->input->post('minhchung');
            for ($k=0; $k <count($duongdan) ; ++$k){
                if(empty($sinhvien['dieukien'][$k])){
                    $minhchung=array(
                        'PK_sMaMC'  => time().rand(1,10000).$k,
                        'FK_sMaSV'  => $masv,
                        'FK_sMaCT'  => $mact[$k],
                        'tLink'     => $duongdan[$k],

                    );
                    $res=$this->Mdk_minhchung->insertMinhchung($masv,$minhchung);
                }
                else{
                    $mamc[$k] = $sinhvien['dieukien'][$k][0]['PK_sMaMC'];
                    $res=$this->Mdk_minhchung->updateMinhchung($mamc[$k], $duongdan[$k]);
                }
            }
            
                setMessages("success", "Cập nhật hồ sơ thành công");
            
            redirect('dk_minhchung');
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