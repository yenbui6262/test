<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CHome extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MHome');
	}
	public function index()
	{
		$session = $this->session->userdata("user");

        $temp = array(
            'template'  => 'VHome',
            'data'     	=> array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                // 'tieuchi'   => $this->Mthongtincanhan->getTieuchi()
            ),
        );
        $this->load->view('layout/VContent',$temp);
	    
	}
}