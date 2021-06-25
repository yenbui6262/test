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
            
            if($Matcp = $this->input->post('suatcp')){
                $data['tcp']      = $this->Mchuongtrinh->gettieuchiphu($Matcp);
                $data['sua']      = true;
            }
            
            if($action = $this->input->post('action')){
                switch($action){
                    case 'insert'    : $this->addtieuchiphu();break;
                    case 'edit'      : $this->update();break;
                    case "pagination": $this->pagination();break;
                    case "search"    :$this->search();break;
                }
                return;
            };
            
            if($Matcp = $this->input->post('delete')){
                $data['tcp']      = $this->delete();
            }

            $filter = $this->session->userdata("filter");
            $temp = array(
                'template'  => 'Vchuongtrinh',
                'data'      => array(
                    'params'    => $this->get_params($page-1, $filter),
                    'matieuchi' => $filter['tentieuchi'],
                    'noidung' => $filter['noidung'],
                    'trangthai' => $filter['trangthai'],
                    'loaicheck' => $filter['loaicheck'],
                    'session'   => $session
                ),
            );
            // pr($temp);
            // exit(0);
            $this->load->view('layout/Vcontent', $temp);
        }

        public function addtieuchiphu(){
            $matcp          = $this->input->post('matcp');
            $matc           = $this->input->post('matc');
            $noidung        = $this->input->post('noidung');
            $trangthai      = $this->input->post('trangthai');
            $loaicheck      = $this->input->post('loaicheck');
            if($matc == 'tatca'){
                setMessages('warning','Vui lòng chọn tiêu chí!','Cảnh báo');
                return redirect(current_url());
            }
            if($trangthai == 'tatca'){
                setMessages('warning','Vui lòng chọn tiêu chí!','Cảnh báo');
                return redirect(current_url());
            }
            if($loaicheck == 'tatca'){
                setMessages('warning','Vui lòng chọn tiêu chí!','Cảnh báo');
                return redirect(current_url());
            }
            // mảng bao gồm các giá trị được gán cho các trường dữ liệu trong csdl
            $data = array(
                'PK_sMatieuchiphu'      => time().rand(1,1000),
                'FK_sMatieuchi'         => $matc,
                'sNoidung'              => $noidung,
                'sTrangthai'            => $trangthai,
                'sLoaicheck'            => $loaicheck
            );
        $row = $this->Mchuongtrinh->inserttieuchiphu($data);
        
        if($row > 0){
            setMessages('success','Thêm thành công','Thông báo');
        }else{
            setMessages('danger','Thêm thất bại','Thông báo');
        }
        redirect('dmtieuchiphu');
        }//end
        //xóa 
        public function delete(){
            // if ($this->input->post('delete')) {
                $Matcp  = $this->input->post('delete');
                $res = $this->Mchuongtrinh->checkTCP($Matcp);
                if(count($res) > 0){
                    setMessages('warning','Tiêu chí đã được sử dụng!','Thông báo');
                    return redirect(current_url());
                }
                $row    = $this->Mchuongtrinh->deletetieuchiphu($Matcp);
                
                if ($row>0){
                    setMessages('success','Xóa thành công','Thông báo');
                }
                else{
                    setMessages('danger','Xóa thất bại','Thông báo');
                }
                redirect('dmtieuchiphu');
            //}
        } //end
        public function update(){
            $Matcp      = $this->input->post('matcp');
            $data = array(
                'FK_sMatieuchi'         => $this->input->post('matc'),
                'sNoidung'              => $this->input->post('noidung'),
                'sTrangthai'            => $this->input->post('trangthai'),
                'sLoaicheck'            => $this->input->post('loaicheck')
            );
            if($data['FK_sMatieuchi'] == 'tatca'){
                setMessages('warning','Vui lòng chọn tiêu chí!','Cảnh báo');
                return redirect(current_url());
            }
            if($data['sTrangThai'] == 'tatca'){
                setMessages('warning','Vui lòng chọn tiêu chí!','Cảnh báo');
                return redirect(current_url());
            }
            if($data['sLoaicheck'] == 'tatca'){
                setMessages('warning','Vui lòng chọn tiêu chí!','Cảnh báo');
                return redirect(current_url());
            }

            $row = $this->Mchuongtrinh->updatetieuchiphu($Matcp, $data);
            if($row > 0){
                setMessages('success','Sửa thành công','Thông báo');
            }else{
                setMessages('danger','Sửa thất bại','Thông báo');
            }
            redirect('dmtieuchiphu');
        }

        private function pagination(){
            $filter     = $this->input->post("filter");

            $pageX      = $this->input->post("page");
            $res        = $this->get_params($pageX-1, $filter);
            if(!empty($res)){
                echo json_encode($res);
            }
        }

        private function search(){
            $filter = $this->input->post("filter");
            // luu vao sesssion
            $this->session->set_userdata("filter", $filter);
            // luu thong so vao session
            $dieukien = array(
                'tenct'     => $filter['tenct'],
                'mota'          => $filter['mota'],
                'thoigianbd'            => $filter['thoigianbd'],
                'thoigiankt'        => $filter['thoigiankt']
            );
            $res = $this->get_params(0, $dieukien);
            echo json_encode($res);
        }

        public function get_params($page, $dieukien){
            // init params
            $params = array();
            // So trang tren 1 page
            $limit_per_page = 50;
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
                $config['base_url']     = base_url().'chuongtrinh';
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