<?php
    class Cxacnhanthamgia extends MY_Controller {
        public function __construct() {
	    	parent::__construct();
	    	$this->load->model('Mxacnhanthamgia');
	    }
        public function index($page=1)
        {
            $session = $this->session->userdata("user");
            $check='';
            if($action = $this->input->post('action')){
                if($action=='search'){
                    $filterxn = array(
                        'tenct'           => $this->input->post('tenct'),
                        'mota'            => $this->input->post('mota'),
                        'trangthai'      => $this->input->post('trangthai'),
                    );
                    // luu vao sesssion
                    $this->session->set_userdata("filterxn", $filterxn);redirect('xacnhanthamgia');
                }elseif($action=='reset'){
                    unset($_SESSION['filterxn']);redirect('xacnhanthamgia');
                }else if($action=='update'){
                    /*CAp nhat khi admin an duyet */
                    $id 	    = $this->input->post("id");
                    $trangthai  = $this->input->post("trangthai");
                    $lydo       = $this->input->post("lydo");
                    $ttt = array(
                        'id'=> $id,
                        'trangthai'=>$trangthai,
                        'lydo'=>$lydo,
                    );
                    // pr($ttt);exit();
                    $this->Mxacnhanthamgia->updatexn($id, $trangthai,$lydo);
                }
            };
            
            $filterxn = $this->session->userdata("filterxn");
            $temp = array(
                'template'  => 'Vxacnhanthamgia',
                'data'      => array(
                    'params'    => $this->get_params($page-1, $filterxn),
                    'message' => getMessages(),
                    'tenct' => $filterxn['tenct'],
                    'mota' => $filterxn['mota'],
                    'trangthai' => $filterxn['trangthai'],
                    'session'   => $session,
                ),
            );
            // pr($temp);
            $this->load->view('layout/Vcontent', $temp);
        }

        private function pagination(){
            $filterxn     = $this->input->post("filterxn");

            $pageX      = $this->input->post("page");
            $res        = $this->get_params($pageX-1, $filterxn);
            if(!empty($res)){
                echo json_encode($res);
            }
        }

        public function get_params($page, $dieukien){
            $session = $this->session->userdata("user");
            // init params
            $params = array();
            // So trang tren 1 page
            $limit_per_page = 25;
            // lay bien page tu url, nhung load tu ajax thi khong can
            /*$page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;*/
            $page = $page;
            $params['stt'] = $limit_per_page * $page + 1;
            $total_records = $this->Mxacnhanthamgia->getTotalRecord($dieukien, $session['taikhoan']);
            if ($total_records > 0){
                // get current page records
                // ($page * $limit_per_page) vi tri ban ghi dau tien
                // $limit_per_page la so luong ban ghi lay ra
                $params['chuongtrinh']  = $this->Mxacnhanthamgia->getChuongtrinh($limit_per_page, $page * $limit_per_page,$dieukien, $session['taikhoan']);
                //pr($params);
                $config['base_url']     = base_url().'xacnhanthamgia';
                $config['total_rows']   = $total_records;
                $config['per_page']     = $limit_per_page;
                $config['uri_segment']  = 2;
                 
                // custom paging configuration
                $config['num_links'] = 2;
                $config['use_page_numbers'] = TRUE;
                $config['reuse_query_string'] = TRUE;
                 
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                 
                $config['first_link'] = 'Trang đầu';
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                 
                $config['last_link'] = 'Trang cuối';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                 
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
     
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
     
                $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0)">';
                $config['cur_tag_close'] = '</a></li>';
     
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                 
                $this->pagination->initialize($config);
                // build paging links
                $params["links"] = $this->pagination->create_links();
            }
            return $params;
        }
	    
    }
?>