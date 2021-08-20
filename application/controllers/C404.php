<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C404 extends CI_Controller {
	public function __construct() {
		parent:: __construct();
	}
	public function index()
	{
		//$this->session->sess_destroy();
		$data['url'] 	= base_url();
		$this->parser->parse('errors/V404', $data);
	}

}
