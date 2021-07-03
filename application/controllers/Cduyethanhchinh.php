<?php
    class Cduyethanhchinh extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mduyethanhchinh');
        }

        public function index($page=1)
        {
            $session = $this->session->userdata("user");
            if($session['maquyen']==3||$session['maquyen']==1){
                
            }else{
                $this->session->sess_destroy();
                return redirect(base_url().'403_Forbidden');
            }

            if($Mamc = $this->input->post('delete')){
                $deletehc      = $this->delete($Mamc);
            }
            if($Mamc = $this->input->post('edit')){
                $duyethc      = $this->editduyet($Mamc);
            }

            if($action = $this->input->post('action')){
                if($action=='search'){
                    $filterqlhc = array(
                        'hoten'    => $this->input->post('hoten'),
                        'tenhc'    => $this->input->post('tenhc'),
                        'trangthai'=> $this->input->post('trangthai'),
                        'lop'      => $this->input->post('lop')
                    );
                    // luu vao sesssion
                    $this->session->set_userdata("filterqlhc", $filterqlhc);
                    redirect("quanlyhanhchinh");
                }elseif($action=='reset'){
                    unset($_SESSION['filterqlhc']);
                    redirect("quanlyhanhchinh");
                }
            };
            $filter = $this->session->userdata("filterqlhc");
            
            $temp = array(
                'template'  => 'Vduyethanhchinh',
                'data'      => array(
                    'params'    => $this->get_params($page-1, $filter),
                    'message' => getMessages(),
                    'hoten' => $filter['hoten'],
                    'lop' => $filter['lop'],
                    'trangthai' => $filter['trangthai'],
                    'tenhc' => $filter['tenhc'],
                    'session'   => $session
                ),
            );
            // pr($temp['data']['params']);
            $this->load->view('layout/Vcontent', $temp);
        }
        
        //delete 
        public function delete($Madon){

            $row    = $this->Mduyethanhchinh->deletedondangky($Madon);
            
            if ($row>0){
                setMessages('success','Xóa thành công','Thông báo');
            }
            else{
                setMessages('danger','Xóa thất bại','Thông báo');
            }
            redirect('quanlyhanhchinh');
        } //end delete

        //edit 
        public function editduyet($Madon){

            $trangthai    = $this->Mduyethanhchinh->gettrangthai($Madon);
            if($trangthai==0){
                $trangthai=1;
            }else{
                $trangthai=0;
            }
            $row    = $this->Mduyethanhchinh->edittrangthai($Madon,$trangthai);
            
            if ($row>0&&$trangthai==1){
                setMessages('success','Duyệt thành công','Thông báo');
            }elseif ($row>0&&$trangthai==0) {
                setMessages('success','Hủy duyệt thành công','Thông báo');
            }elseif($row=0&&$trangthai==1){
                setMessages('danger','Duyệt thất bại','Thông báo');
            }else{
                setMessages('danger','Hủy duyệt thất bại','Thông báo');
            }
            redirect('quanlyhanhchinh');
        } //end edit

        private function pagination(){
            $filter     = $this->input->post("filterqlhc");

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
            $params['tenhc'] = $this->Mduyethanhchinh->gethanhchinh();
            $params['lop'] = $this->Mduyethanhchinh->getlop();
            $total_records = $this->Mduyethanhchinh->getTotalRecord($dieukien);
            if ($total_records > 0){
                // get current page records
                // ($page * $limit_per_page) vi tri ban ghi dau tien
                // $limit_per_page la so luong ban ghi lay ra
                $params['hanhchinh']  = $this->Mduyethanhchinh->getdondangky($limit_per_page, $page * $limit_per_page,$dieukien);
                // pr($params);
                $config['base_url']     = base_url().'quanlyhanhchinh';
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