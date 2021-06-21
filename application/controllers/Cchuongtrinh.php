
<?php 

class Cchuongtrinh extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mchuongtrinh");
    }
    public function index(){
        $session = $this->session->userdata("user");

        $temp = array(
            'template'  => 'Vchuongtrinh',
            'data'     	=> array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'tieuchi'   => $this->Mchuongtrinh->getTieuchi()
            ),
        );
        $this->load->view('layout/VContent',$temp);
    }
    public function turnoff($ma_tieuchi)
    {
        $row = $this->Mchuongtrinh->tatsTrangthai($ma_tieuchi);
        if($row>0){
            setMessages('success','Đổi trạng thái thành công','Thông báo');
        }else{
            setMessages('danger','Đổi trạng thái thất bại','Thông báo');
        }
    }
    public function turnon($ma_tieuchi)
    {
        $row = $this->Mchuongtrinh->batsTrangthai($ma_tieuchi);
        if($row>0){
            setMessages('success','Đổi trạng thái thành công','Thông báo');
        }else{
            setMessages('danger','Đổi trạng thái thất bại','Thông báo');
        }
    }
}
