<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cword extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mword');
	}
	public function index()
	{
		// $madangky= $this->input->get('madangky');
        // $data = $this->Mword->gethanhchinh($madangky);
        // if($data['maudon']){
        //     $this->$data['maudon']();exit();
        // }else{
        //     echo "mẫu không có sẵn";exit();
        // }
	}
    public function capbangdiem(){
        $session = $this->session->userdata("user");
        $madangky= $this->input->get('madangky');
        $data     	= array(
            'session'	=> $session,
            'message' 	=> getMessages(),
            'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'], $madangky)
        );
        // $data['thongtin']=$this->Mword->getThongtincoban($session['taikhoan']);
        
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Donxincapbangdiem.doc");
        $this->parser->parse('Vword/Vcapbangdiem',$data);
    }
    public function nghihocvabaoluu(){
        $session = $this->session->userdata("user");
        $madangky= $this->input->get('madangky');
            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'], $madangky)
            );
            
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Donxinnghihocvabaoluu.doc");
        // pr($data);exit();
        $this->parser->parse('Vword/Vnghihocvabaoluu',$data);

    }
    public function huymonhoc(){
        $session = $this->session->userdata("user");
        $madangky= $this->input->get('madangky');
            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'], $madangky)
            );
            
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Donxinhuymonhoc.doc");
        // pr($data);exit();
        $this->parser->parse('Vword/Vhuymonhoc',$data);

    }
    
    public function vayvonnganhang(){
        $session = $this->session->userdata("user");
        $madangky= $this->input->get('madangky');
            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'], $madangky)
            );
            
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Donvayvonnganhang.doc");
        // $data['thongtin']=$this->Mword->getThongtincoban($session['taikhoan']);
        $this->parser->parse('Vword/Vvayvonnganhang',$data);

    }

    public function phuckhaobaithi(){
        $session = $this->session->userdata("user");
        $madangky= $this->input->get('madangky');
            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'], $madangky)
            );
            
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Donxinphuckhaobaithi.doc");
        // $data['thongtin']=$this->Mword->getThongtincoban($session['taikhoan']);
        $this->parser->parse('Vword/Vphuckhaobaithi',$data);

    }
    public function miengiamhocphi(){
        $session = $this->session->userdata("user");
        $madangky= $this->input->get('madangky');
            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'], $madangky)
            );
            
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Donxinmiengiamhocphi.doc");
        // $data['thongtin']=$this->Mword->getThongtincoban($session['taikhoan']);
        $this->parser->parse('Vword/Vmiengiamhocphi',$data);

    }
    public function vethangxebuyt(){
        $session = $this->session->userdata("user");
        $madangky= $this->input->get('madangky');
            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'], $madangky)
            );
            
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Donlamthevethangxebuyt.doc");
        // $data['thongtin']=$this->Mword->getThongtincoban($session['taikhoan']);
        $this->parser->parse('Vword/Vvethangxebuyt',$data);

    }
    public function xacnhandansu(){
        $session = $this->session->userdata("user");
        $madangky= $this->input->get('madangky');
            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'], $madangky)
            );
            
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Donxacnhandansu.doc");
        // $data['thongtin']=$this->Mword->getThongtincoban($session['taikhoan']);
        $this->parser->parse('Vword/Vxacnhandansu',$data);

    }
    public function thoihoc(){
        $session = $this->session->userdata("user");
        $madangky= $this->input->get('madangky');
            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'], $madangky)
            );
            
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Donxinthoihoc.doc");
        // pr($data);exit();
        $this->parser->parse('Vword/Vthoihoc',$data);

    }
    public function hoctiep(){
        $session = $this->session->userdata("user");
        $madangky= $this->input->get('madangky');
            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'], $madangky)
            );
            
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Donxinhoctiep.doc");
        // pr($data);exit();
        $this->parser->parse('Vword/Vhoctiep',$data);

    }
    public function caplaiATM(){
        $session = $this->session->userdata("user");
        $madangky= $this->input->get('madangky');
            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'], $madangky)
            );
            
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=GiaydenghicaplaitheATM.doc");
        // pr($data);exit();
        $this->parser->parse('Vword/VcaplaiATM',$data);

    }
    public function xacnhanSV(){
        $session = $this->session->userdata("user");
        $madangky= $this->input->get('madangky');
            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'], $madangky)
            );
            
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Giayxacnhansv.doc");
        // pr($data);exit();
        $this->parser->parse('Vword/VxacnhanSV',$data);

    }
    public function chungchiGDQP(){
        $session = $this->session->userdata("user");
        $madangky= $this->input->get('madangky');
            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'], $madangky)
            );
            
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=DonxincaplaichungchiGDQP.doc");
        // pr($data);exit();
        $this->parser->parse('Vword/VchungchiGDQP',$data);

    }
    public function kiemtradiem(){
        $session = $this->session->userdata("user");
        $madangky= $this->input->get('madangky');
            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'], $madangky)
            );
            
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Donxinkiemtradiem.doc");
        // pr($data);exit();
        $this->parser->parse('Vword/Vkiemtradiem',$data);

    }
}