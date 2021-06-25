
<?php 

class Cdoimatkhau extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('canhan/Mdoimatkhau');
    }

    public function index(){
        $session = $this->session->userdata("user");
        $quyen   = $session['maquyen'];
        
        if($action = $this->input->post("action")){
            switch($action){
                case "changePass": $this->changePass(); break;
            }
            return;
        }
        // pagination
        $temp = array(
            'template'  => 'canhan/Vdoimatkhau',
            'data'      => array(
                'session'       => $session,
                'message'       => getMessages(),
                'taikhoan'      => $session['taikhoan'],
                'quyen'         => $quyen,
            )
        );
        // pr($temp);
        $this->load->view("layout/VContent", $temp);
    }

    private function changePass(){
        $acc = $this->session->userdata("user")['taikhoan'];
        $oldpass = sha1($this->input->post("oldPass"));
        $newpass = sha1($this->input->post("newPass"));
        $repass = sha1($this->input->post("rePass"));
        $taikhoan = array(
            'PK_sMaTK' 	=> $acc,
            'sMatKhau'		=> $oldpass
        );
        // pr($taikhoan);
        $checkPass = $this->Mdoimatkhau->checkPass($taikhoan);
        if(!$checkPass){
            echo "Mật khẩu cũ không chính xác";
            return;
        }
        $this->Mdoimatkhau->changePass($newpass, $acc);
        $session = $this->session->userdata("user");
        $this->session->set_userdata('user', $session);
        echo "Đổi mật khẩu thành công";
    }
}
