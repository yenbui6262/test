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
		$data['user'] = getSession()[0];
		$data['message'] = getMessages();
        $data['url'] = base_url();
		$temp['data'] = $data;
		$temp['template'] = "VHome";
		$this->load->view('layout/VContent',$temp);
	}
}