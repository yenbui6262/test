<?php
    class Cchuongtrinh extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mchuongtrinh');
        }

        public function index($page=1)
        {
            $session = $this->session->userdata("user");
            if($session['maquyen']!=1){
                $this->session->sess_destroy();
                return redirect(base_url().'403_Forbidden');
                
            }
            
            if($action = $this->input->post('action')){
                switch($action){
                    case 'insert'    : $this->addchuongtrinh();break;
                    case 'edit'      : $this->update();break;
                    case "search"    :$this->search();break;
                    case "reset"    :$this->reset();break;
                }
                return;
            };
            
            if($Mact = $this->input->post('delete')){
                $deletect      = $this->delete($Mact);
            }

            $filter = $this->session->userdata("filter");
            $temp = array(
                'template'  => 'Vchuongtrinh',
                'data'      => array(
                    'params'    => $this->get_params($page-1, $filter),
                    'message' => getMessages(),
                    'tenct' => $filter['tenct'],
                    'mota' => $filter['mota'],
                    'thoigianbd' => $filter['thoigianbd'],
                    'thoigiankt' => $filter['thoigiankt'],
                    'session'   => $session
                ),
            );
            // pr($temp);
            $this->load->view('layout/Vcontent', $temp);
        }

        public function addchuongtrinh(){
            $session = $this->session->userdata("user");
            $tenct        = $this->input->post('tenct');
            $mota      = $this->input->post('mota');
            $thoigianbd      = $this->input->post('thoigianbd');
            $thoigiankt      = $this->input->post('thoigiankt');
            if($thoigianbd == ''){
                setMessages('warning','Vui lòng chọn thời gian bắt đầu!','Cảnh báo');
                return redirect(current_url());
            }
            if($thoigiankt == ''){
                setMessages('warning','Vui lòng chọn thời gian kết thúc!','Cảnh báo');
                return redirect(current_url());
            }

            // mảng bao gồm các giá trị được gán cho các trường dữ liệu trong csdl
            $data = array(
                'PK_sMaChuongTrinh'      => time().rand(1,1000),
                'stenCT'              => $tenct,
                'tMota'              => $mota,
                'FK_sMaCB'              => $this->Mchuongtrinh->getmacb($session['taikhoan'])[0]['PK_sMaTK'],
                'dThoiGIanBD'            => $thoigianbd,
                'dThoiGIanKT'            => $thoigiankt  
            );
            // pr($data);
        $row = $this->Mchuongtrinh->insertchuongtrinh($data);
        
        if($row > 0){
            setMessages('success','Thêm thành công','Thông báo');
        }else{
            setMessages('danger','Thêm thất bại','Thông báo');
        }
        redirect('Chuongtrinh');
        }//end insert
        
        //delete 
        public function delete($Mact){

            $row    = $this->Mchuongtrinh->deletechuongtrinh($Mact);
            
            if ($row>0){
                setMessages('success','Xóa thành công','Thông báo');
            }
            else{
                setMessages('danger','Xóa thất bại','Thông báo');
            }
            redirect('Chuongtrinh');
        } //end delete

        // update
        public function update(){
            $Mact      = $this->input->post('mact');
            $tenct        = $this->input->post('tenct');
            $mota      = $this->input->post('mota');
            $thoigianbd      = $this->input->post('thoigianbd');
            $thoigiankt      = $this->input->post('thoigiankt');
            $data = array(
                'stenCT'              => $tenct,
                'tMota'              => $mota,
                'dThoiGIanBD'            => $thoigianbd,
                'dThoiGIanKT'            => $thoigiankt  
            );

            if($thoigianbd == ''){
                setMessages('warning','Vui lòng chọn thời gian bắt đầu!','Cảnh báo');
                return redirect(current_url());
            }
            if($thoigiankt == ''){
                setMessages('warning','Vui lòng chọn thời gian kết thúc!','Cảnh báo');
                return redirect(current_url());
            }

            $row = $this->Mchuongtrinh->updatechuongtrinh($Mact, $data);
            if($row > 0){
                setMessages('success','Sửa thành công','Thông báo');
            }else{
                setMessages('danger','Sửa thất bại','Thông báo');
            }
            redirect('Chuongtrinh');
        }

        private function pagination(){
            $filter     = $this->input->post("filter");

            $pageX      = $this->input->post("page");
            $res        = $this->get_params($pageX-1, $filter);
            if(!empty($res)){
                echo json_encode($res);
            }
        }
        private function reset(){

            $session = $this->session->userdata("user");
             
            $res = $this->get_params(0, NULL);
            $temp = array(
                'template'  => 'Vchuongtrinh',
                'data'      => array(
                    'params'    => $res,
                    'message' => getMessages(),
                    'tenct' => '',
                    'mota' => '',
                    'thoigianbd' => '',
                    'thoigiankt' => '',
                    'session'   => $session
                ),
            );
            // pr($temp);
            // exit(0);
            $this->load->view('layout/Vcontent', $temp);
            // echo json_encode($res);
        }
        private function search(){
            $filter = array(
                'tenct'           => $this->input->post('tenct'),
                'mota'            => $this->input->post('mota'),
                'thoigianbd'      => $this->input->post('thoigianbd'),
                'thoigiankt'      => $this->input->post('thoigiankt')
            );
            // luu vao sesssion
            $this->session->set_userdata("filter", $filter);
            // luu thong so vao session
            $session = $this->session->userdata("user");
             
            $res = $this->get_params(0, $filter);
            $temp = array(
                'template'  => 'Vchuongtrinh',
                'data'      => array(
                    'params'    => $res,
                    'message' => getMessages(),
                    'tenct' => $filter['tenct'],
                    'mota' => $filter['mota'],
                    'thoigianbd' => $filter['thoigianbd'],
                    'thoigiankt' => $filter['thoigiankt'],
                    'session'   => $session
                ),
            );
            // pr($temp);
            // exit(0);
            $this->load->view('layout/Vcontent', $temp);
            // echo json_encode($res);
        }

        public function get_params($page, $dieukien){
            // init params
            $params = array();
            // So trang tren 1 page
            $limit_per_page = 5;
            // lay bien page tu url, nhung load tu ajax thi khong can
            /*$page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;*/
            $page = $page;
            $params['stt'] = $limit_per_page * $page + 1;
            $total_records = $this->Mchuongtrinh->getTotalRecord($dieukien);
            if ($total_records > 0){
                // get current page records
                // ($page * $limit_per_page) vi tri ban ghi dau tien
                // $limit_per_page la so luong ban ghi lay ra
                $params['chuongtrinh']  = $this->Mchuongtrinh->getChuongtrinh($limit_per_page, $page * $limit_per_page,$dieukien);
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