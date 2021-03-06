<?php
    class Cthongkeminhchung extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mthongkeminhchung');
        }

        public function index($page=1)
        {
            $session = $this->session->userdata("user");
            // pr($session);
            if($session['maquyen']==3||$session['maquyen']==1||$session['sChucVu']!=''){
                
            }else{
                $this->session->sess_destroy();
                return redirect(base_url().'403_Forbidden');
            }

            if($reset = $this->input->post('reset')){
                if($reset=='reset'){
                    unset($_SESSION['filterthongke']);
                    redirect("thongkeminhchung");
                }
            };
            $action = $this->input->post('action');
            switch($action){
                case 'get_dstheosinhvien':{
                    $filter = array(
                        'action'           => 'get_dstheosinhvien',
                        'lop'      => $this->input->post('lop'),
                        'tenct'      => '',
                        'thoigianbd'      => '',
                        'thoigiankt'      => ''
                    );
                    // luu vao sesssion
                    $this->session->set_userdata("filterthongke", $filter);
                    $this->get_dstheosinhvien($page,$filter);
                    break;
                }
                case 'get_dstheolop':{
                    $filter = array(
                        'action'           => 'get_dstheolop',
                        'lop'      => $this->input->post('lop'),
                        'tenct'      => $this->input->post('tenct'),
                        'thoigianbd'      => $this->input->post('thoigianbd'),
                        'thoigiankt'      => $this->input->post('thoigiankt')
                    );
                    // luu vao sesssion
                    $this->session->set_userdata("filterthongke", $filter);
                    $this->get_dstheolop($page,$filter);
                    break;
                }
                case 'get_dstheochuongtrinh':{
                    $filter = array(
                        'action'           => 'get_dstheochuongtrinh',
                        'lop'      => '',
                        'tenct'      => $this->input->post('tenct'),
                        'thoigianbd'      => $this->input->post('thoigianbd'),
                        'thoigiankt'      => $this->input->post('thoigiankt')
                    );
                    // luu vao sesssion
                    $this->session->set_userdata("filterthongke", $filter);
                    // pr($filter);
                    $this->get_dstheochuongtrinh($page,$filter);
                    break;
                }
            }

            $filter = $this->session->userdata("filterthongke");
            
            $temp = array(
                'template'  => 'Vthongkeminhchung',
                'data'      => array(
                    'params'    => $this->get_params($page-1, $filter),
                    'message' => getMessages(),
                    'tenct' => $filter['tenct'],
                    'lop' => $filter['lop'],
                    'thoigianbd'      => $filter['thoigianbd'],
                    'thoigiankt'      => $filter['thoigiankt'],
                    'action' => $filter['action'],
                    'session'   => $session
                ),
            );
            // pr($temp['data']);
            $this->load->view('layout/Vcontent', $temp);
        }


        public function get_dstheosinhvien($page,$filter){
            $data1 = $this->get_params($page-1, $filter);
            // pr($data1);
            echo json_encode($data1);
            exit();
        }

        public function get_dstheolop($page,$filter){
            $data1 = $this->get_params($page-1, $filter);
            // pr($data1);
            echo json_encode($data1);
            exit();
        }

        public function get_dstheochuongtrinh($page,$filter){
            $data1 = $this->get_params($page-1, $filter);
            // pr($data1);
            echo json_encode($data1);
            exit();
        }

        public function get_params($page, $dieukien){
            $session = $this->session->userdata("user");
            $chucvu = $this->Mthongkeminhchung->getchucvu($session['taikhoan']);
            $lop = $chucvu[0]['sFK_lop'];
            // init params
            $params = array();
            // So trang tren 1 page
            $limit_per_page = 50;
            // lay bien page tu url, nhung load tu ajax thi khong can
            /*$page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;*/
            $page = $page;
            $params['stt'] = $limit_per_page * $page + 1;
            $params['tenct'] = $this->Mthongkeminhchung->getchuongtrinh();
            $params['lop'] = $this->Mthongkeminhchung->getlop();
            if(!empty($dieukien['action'])&&$dieukien['action']=='get_dstheosinhvien'){
                $total_records = $this->Mthongkeminhchung->getTotalsinhvien($dieukien,$session['maquyen'],$lop);
            }elseif($dieukien['action']=='get_dstheolop'){
                $total_records = $this->Mthongkeminhchung->getTotalRecord($dieukien,$session['maquyen'],$lop);
            }elseif($dieukien['action']=='get_dstheochuongtrinh'){
                $total_records = $this->Mthongkeminhchung->getTotalchuongtrinh($dieukien,$session['maquyen'],$lop);
            }else{
                $total_records = 0;
            }
            if ($total_records > 0){
                // get current page records
                // ($page * $limit_per_page) vi tri ban ghi dau tien
                // $limit_per_page la so luong ban ghi lay ra
                if($dieukien['action']=='get_dstheosinhvien'){
                    $params['minhchung']  = $this->Mthongkeminhchung->getlistsinhvien($limit_per_page, $page * $limit_per_page,$dieukien,$session['maquyen'],$lop);
                    $params['soluongdaduyet']  = $this->Mthongkeminhchung->sodaduyettheosinhvien($limit_per_page, $page * $limit_per_page,$dieukien);
                    $params['soluongcbdaduyet']  = $this->Mthongkeminhchung->socbdaduyettheosinhvien($limit_per_page, $page * $limit_per_page,$dieukien);
                    // pr( $params['soluongdaduyet']);
                }elseif($dieukien['action']=='get_dstheolop'){
                    $params['minhchung']  = $this->Mthongkeminhchung->getminhchung($limit_per_page, $page * $limit_per_page,$dieukien,$session['maquyen'],$lop);
                    $params['soluongdaduyet']  = $this->Mthongkeminhchung->sodaduyettheolop($limit_per_page, $page * $limit_per_page,$dieukien);
                    $params['soluongcbdaduyet']  = $this->Mthongkeminhchung->socbdaduyettheolop($limit_per_page, $page * $limit_per_page,$dieukien);
                }elseif($dieukien['action']=='get_dstheochuongtrinh'){
                    $params['minhchung'] = $this->Mthongkeminhchung->getlistchuongtrinh($limit_per_page, $page * $limit_per_page,$dieukien,$session['maquyen'],$lop);
                    $params['soluongdaduyet']  = $this->Mthongkeminhchung->sodaduyettheochuongtrinh($limit_per_page, $page * $limit_per_page,$dieukien);
                    $params['soluongcbdaduyet']  = $this->Mthongkeminhchung->socbdaduyettheochuongtrinh($limit_per_page, $page * $limit_per_page,$dieukien);
                }
                // pr($params);
                $config['base_url']     = base_url().'thongkeminhchung';
                $config['total_rows']   = $total_records;
                $config['per_page']     = $limit_per_page;
                $config['uri_segment']  = 2;
                 
                // custom paging configuration
                $config['num_links'] = 2;
                $config['use_page_numbers'] = TRUE;
                $config['reuse_query_string'] = TRUE;
                 
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                 
                $config['first_link'] = 'Trang ?????u';
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                 
                $config['last_link'] = 'Trang cu???i';
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