<?php
    class Cchitietsinhvien extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mchitietsinhvien');
        }

        public function index($page=1)
        {
            $session = $this->session->userdata("user");
            if($session['maquyen']==3||$session['maquyen']==1){
                
            }else{
                $this->session->sess_destroy();
                return redirect(base_url().'403_Forbidden');
            }

            if(!empty($this->input->get('lop'))){
                $filter = array(
                    'tenct'           => $this->input->get('tenct'),
                    'lop'             => $this->input->get('lop'),
                    'sosinhvien'      => $this->Mchitietsinhvien->getsosinhvien($this->input->get('lop'))[0]['sosinhvien'],
                    'sominhchung'     => $this->input->get('sominhchung')
                );
                 // luu vao sesssion
                $this->session->set_userdata("filterqlmc", $filter);
            }

            if($Mamc = $this->input->post('delete')){
                $deletect      = $this->delete($Mamc);
            }

            if($action = $this->input->post('action')){
                if($action=='search'){
                    $filtermc = $this->session->userdata("filterqlmc");
                    $filtermc['hoten'] = $this->input->post('hoten');
                    // luu vao sesssion
                    $this->session->set_userdata("filterqlmc", $filtermc);
                    redirect("quanlyminhchung");
                }
            };
            $filter = $this->session->userdata("filterqlmc");
            if(empty($filter['hoten'])){
                $filter['hoten']='';
            }
            if(empty($filter['lop'])){
                redirect("thongkeminhchung");
            }
            $temp = array(
                'template'  => 'Vquanlyminhchung',
                'data'      => array(
                    'params'    => $this->get_params($page-1, $filter),
                    'message' => getMessages(),
                    'tenct' => $filter['tenct'],
                    'hoten' => $filter['hoten'],
                    'lop' => $filter['lop'],
                    'sominhchung' => $filter['sominhchung'],
                    'sosinhvien' => $filter['sosinhvien'],
                    'session'   => $session
                ),
            );
            // pr($temp['data']['params']);
            $this->load->view('layout/Vcontent', $temp);
        }
        
        //delete 
        public function delete($Mamc){

            $row    = $this->Mchitietsinhvien->deleteminhchung($Mamc);
            
            if ($row>0){
                setMessages('success','Xóa thành công','Thông báo');
            }
            else{
                setMessages('danger','Xóa thất bại','Thông báo');
            }
            redirect('quanlyminhchung');
        } //end delete

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
            $params['stt'] = $limit_per_page * $page + 1;
            $total_records = $this->Mchitietsinhvien->getTotalRecord($dieukien);
            if ($total_records > 0){
                // get current page records
                // ($page * $limit_per_page) vi tri ban ghi dau tien
                // $limit_per_page la so luong ban ghi lay ra
                $params['minhchung']  = $this->Mchitietsinhvien->getminhchung($limit_per_page, $page * $limit_per_page,$dieukien);
                // pr($params);
                $config['base_url']     = base_url().'quanlyminhchung';
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