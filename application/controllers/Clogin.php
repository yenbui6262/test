<?php 

	class Clogin extends CI_Controller {

	    public function __construct() {
	    	parent::__construct();
	    	$this->load->model('Mlogin');
	    }

	    public function index(){

	    	$this->session->unset_userdata('user');
	    	$data = array(
	    		'url' 		=> base_url(),
	    		'message' 	=> getMessages()
	    	);
	    	if($this->input->post("dangnhap")){
	    		$data['tb'] 	= $this->check();
	    		$data['user']  	= $this->input->post('username');
	    	}
	    	$this->parser->parse('Vlogin',$data);
	    }

	    public function check(){
	    	$user       = $this->input->post('username');
	    	$password   = $this->input->post('password');

	    	$check_user = $this->Mlogin->get_many_where('tbl_taikhoan', array('sTenTK' => $user, 'sMatKhau' => sha1($password)));

	    	if(empty($check_user)){
	    		return "Sai tên tài khoản hoặc mật khẩu";
	    	}

    		$session = array(
    			'taikhoan'    	=> $check_user[0]['PK_sMaTK'],
    			'maquyen' 		=> $check_user[0]['FK_sMaQuyen'],
                'sHoten' 		=> $check_user[0]['sHoTen'],
				'sMatKhau'		=> $check_user[0]['sMatKhau'],
    		);


    		/*pr($session);*/
    		$this->session->set_userdata('user', $session);
			setMessages('success','Đăng nhập thành công','Thông báo');
    		if($session['maquyen'] == 2){
    			//la sinh vien
    			return redirect('thongtincanhan');
    		}else{
    			// Khong phai la sinh vien
    			return redirect('Chuongtrinh');
    		}
	    }

	    public function logout(){
	    	$this->session->sess_destroy();
    		return redirect(base_url());
	    }
	}
?>