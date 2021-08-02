<?php
    class Cthongtinchuongtrinh extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mthongtinchuongtrinh');
        }

        public function index($page=1)
        {
            $session = $this->session->userdata("user");
            if($session['maquyen']!=1 && $session['maquyen'] !=3){
                return redirect(base_url().'403_Forbidden');
            }

            if($action = $this->input->post('action')){
                switch($action){
                    case "search"   : $this->search();break;
                }
                return;
            };

            $mact=$this->session->userdata("filterthongtin");

            $temp = array(
                'template'  => 'Vthongtinchuongtrinh',
                'data'      => array(
                    'params'    => $this->get_params($page-1, ''),
                    'thongtincb'    => $this->Mthongtinchuongtrinh->getthongtincb($mact),
                    'message' => getMessages(),
                    'session'   => $session,
                ),
            );
            // pr($temp);
            $this->load->view('layout/Vcontent', $temp);
        }


        private function pagination(){
            $filter     = $this->input->post("filterct");

            $pageX      = $this->input->post("page");
            $res        = $this->get_params($pageX-1, $filter);
            if(!empty($res)){
                echo json_encode($res);
            }
        }

        public function get_params($page, $dieukien){
            
            $dieukien['mact'] = $this->session->userdata("filterthongtin");
            // init params
            $params = array();
            // So trang tren 1 page
            $limit_per_page = 25;
            // lay bien page tu url, nhung load tu ajax thi khong can
            /*$page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;*/
            $page = $page;
            $params['stt'] = $limit_per_page * $page + 1;
            $total_records = $this->Mthongtinchuongtrinh->getTotalRecord($dieukien);
            if ($total_records > 0){
                // get current page records
                // ($page * $limit_per_page) vi tri ban ghi dau tien
                // $limit_per_page la so luong ban ghi lay ra
                $params['sinhvienduocthamgia']  = $this->Mthongtinchuongtrinh->getsinhvienduocthamgia($limit_per_page, $page * $limit_per_page,$dieukien);
                //pr($params);
                $config['base_url']     = base_url().'Chuongtrinh';
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