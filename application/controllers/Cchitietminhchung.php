<?php
    class Cchitietminhchung extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mchitietminhchung');
        }

        public function index($page=1)
        {
            $session = $this->session->userdata("user");
            if($session['maquyen']==3||$session['maquyen']==1||$session['sChucVu']!=''){
                
            }else{
                $this->session->sess_destroy();
                return redirect(base_url().'403_Forbidden');
            }

            if($this->input->post('chitietct')){
                $filtertkmc=array(
                    'mact'    =>$this->input->post('chitietct'),
                    'tenct'           => $this->Mchitietminhchung->gettenct($this->input->post('chitietct'))[0]['sTenCT'],
                    'sominhchung'      => $this->Mchitietminhchung->getsosinhvienthamgia($this->input->post('chitietct'))[0]['sosinhvien'], 
                );
                $this->session->set_userdata("filterqlmc", $filtertkmc);
                redirect('chitietminhchung');
            }elseif($this->input->post('chitietlop')){
                $ma = explode(",", $this->input->post('chitietlop'));
                $filtertkmc=array(
                    'mact'            => $ma[1],
                    'malop'           => $ma[0],
                    'tenct'           => $this->Mchitietminhchung->gettenct($ma[1])[0]['sTenCT'],
                    'lop'             => $this->Mchitietminhchung->gettenlop($ma[0])[0]['sTenLop'],
                    'sominhchung'     => $this->Mchitietminhchung->getsosinhvienthamgialop($ma[1],$ma[0])[0]['sosinhvien'],
                    'sosinhvienlop'   => $this->Mchitietminhchung->getsosinhvien($ma[0])[0]['sosinhvien']
                );
                // pr($filtertkmc);
                $this->session->set_userdata("filterqlmc", $filtertkmc);
                redirect('chitietminhchung');
            }elseif($this->input->post('chitietsinhvien')){
                $filtertkmc=array(
                    'masv'             => $this->input->post('chitietsinhvien'),
                );
                $this->session->set_userdata("filterqlmc", $filtertkmc);
                redirect('chitietminhchung');
            }


            $filter = $this->session->userdata("filterqlmc");
            if($action = $this->input->post('action')){
                if($action=='search'){
                    $dob = date("Y-m-d", strtotime($this->input->post('dob'))); 
                    $filter['filterhoten'] = $this->input->post('hoten');
                    $filter['filtermasv'] = $this->input->post('masv');
                    $filter['filterdob'] = $this->input->post('dob');
                    $filter['filtertenct'] = $this->input->post('tenct');
                    $filter['filterthoigianbd'] = $this->input->post('thoigianbd');
                    $filter['filterthoigiankt'] = $this->input->post('thoigiankt');
                }elseif($action=='update'){
                    /*CAp nhat khi admin an duyet */
                //    date_default_timezone_set('Asia/Ho_Chi_Minh');
                //    $now = date('Y-m-d');
                //    $id 	   = $this->input->post("id");
                //    $trangthai = $this->input->post("trangthai");
                //    $macb = $session['taikhoan'];
                //    $this->Mchitietminhchung->updateminhchung($id, $trangthai,$macb,$now);
                //    echo $this->db->affected_rows();
               }
            }else{
                $filter['filterhoten'] = '';
                $filter['filtermasv'] = '';
                $filter['filterdob'] = '';
                $filter['filtertenct'] = '';
                $filter['filterthoigianbd'] = '';
                $filter['filterthoigiankt'] = '';
            };
            if(!empty($filter['filterhoten'])){
                pr($filter);
            }
            $temp = array(
                'template'  => 'Vchitietminhchung',
                'data'      => array(
                    'params'        => $this->get_params($page-1, $filter),
                    'filterhoten'   => $filter['filterhoten'],
                    'filtermasv'    => $filter['filtermasv'],
                    'filterdob'     => $filter['filterdob'],
                    'filtertenct'   => $filter['filtertenct'],
                    'filterthoigianbd'    => $filter['filterthoigianbd'],
                    'filterthoigiankt'     => $filter['filterthoigiankt'],
                    'message'       => getMessages(),
                    'session'       => $session
                ),
            );
            // pr($temp['data']['filtertenct']);
            $this->load->view('layout/Vcontent', $temp);
        }
        
        private function pagination(){
            $filter     = $this->input->post("filterqlmc");

            $pageX      = $this->input->post("page");
            $res        = $this->get_params($pageX-1, $filter);
            if(!empty($res)){
                echo json_encode($res);
            }
        }

        public function get_params($page, $dieukien){
            // init params
            $params = array();
            // So trang tren 1 page
            $limit_per_page = 25;
            // lay bien page tu url, nhung load tu ajax thi khong can
            /*$page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;*/
            $page = $page;

            if(!empty($dieukien['malop'])){
                $params=array(
                    'stt' => $limit_per_page * $page + 1,
                    'tenct' => $dieukien['tenct'],
                    'lop' => $dieukien['lop'],
                    'sominhchung' => $dieukien['sominhchung'],
                    'sosinhvienlop' => $dieukien['sosinhvienlop'],
                    'action' => 1,
                );
                $total_records = $this->Mchitietminhchung->getTotalRecord($dieukien);
            }elseif(!empty($dieukien['mact'])){
                $params=array(
                    'stt' => $limit_per_page * $page + 1,
                    'tenct' => $dieukien['tenct'],
                    'lop' => '',
                    'sominhchung' => $dieukien['sominhchung'],
                    'action' => 1,
                );
                $total_records = $this->Mchitietminhchung->getTotalRecord($dieukien);
            }else{
                $params=array(
                    'stt' => $limit_per_page * $page + 1,
                    'tenct' =>  $this->Mchitietminhchung->gettensv($dieukien['masv'])[0]['sHoTen'],
                    'thongtinsv'=>  $this->Mchitietminhchung->gettensv($dieukien['masv'])[0],
                    'lop' => '',
                    'action' => 2,
                );
                $total_records = $this->Mchitietminhchung->getTotalsinhvien($dieukien);
            }

            if ($total_records > 0){
                // get current page records
                // ($page * $limit_per_page) vi tri ban ghi dau tien
                // $limit_per_page la so luong ban ghi lay ra
                if(!empty($dieukien['mact'])){
                    $params['minhchung']  = $this->Mchitietminhchung->getminhchung($limit_per_page, $page * $limit_per_page,$dieukien);
                }else{
                    $params['minhchung']  = $this->Mchitietminhchung->getlistsinhvien($limit_per_page, $page * $limit_per_page,$dieukien);
                }
                // pr($params);
                $config['base_url']     = base_url().'chitietminhchung';
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