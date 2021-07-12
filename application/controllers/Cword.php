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
		// $session = $this->session->userdata("user");

        //     $data     	= array(
        //         'session'	=> $session,
        //         'message' 	=> getMessages(),
        //         'thongtin'   => $this->Mcapbangdiem->getThongtincoban($session['taikhoan'])
        //     );
        // $data['thongtin']=$this->Mcapbangdiem->getThongtincoban($session['taikhoan']);

        // // $this->load->view('layout/VContent',$temp);
        // header("Content-type: application/vnd.ms-word");
        // header("Content-Disposition: attachment;Filename=HelloWorld.doc");
        // $this->parser->parse('Vword/Vcapbangdiem',$data);
        // $this->parser->parse('Vword/Vhuymonhoc',$data);
	    
	}
    public function capbangdiem(){
        $session = $this->session->userdata("user");

            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'])
            );
        $data['thongtin']=$this->Mword->getThongtincoban($session['taikhoan']);
        
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Donxincapbangdiem.doc");
        $this->parser->parse('Vword/Vcapbangdiem',$data);
    }
    public function huymonhoc(){
        $session = $this->session->userdata("user");

            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'])
            );
            
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Donxinhuymonhoc.doc");
        $data['thongtin']=$this->Mword->getThongtincoban($session['taikhoan']);
        $this->parser->parse('Vword/Vhuymonhoc',$data);

    }
    
    public function vayvonnganhang(){
        $session = $this->session->userdata("user");

            $data     	= array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'thongtin'   => $this->Mword->getThongtincoban($session['taikhoan'])
            );
            
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Donvayvonnganhang.doc");
        $data['thongtin']=$this->Mword->getThongtincoban($session['taikhoan']);
        $this->parser->parse('Vword/Vvayvonnganhang',$data);

    }
}