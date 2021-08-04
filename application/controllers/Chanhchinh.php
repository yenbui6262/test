<?php
    class Chanhchinh extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mhanhchinh');
            $this->load->library('form_validation');
        }

        public function index($page=1)
        {
            $session = $this->session->userdata("user");
            if($session['maquyen']!=1 && $session['maquyen']!=4){
                return redirect(base_url().'403_Forbidden');
            }
            $check='';
            $action='';
            if($action = $this->input->post('action')){
                switch($action){
                    case 'insert'    : $check = $this->addhanhchinh();break;
                    case 'edit'      : $check = $this->update();$action=$this->input->post('mahc');break;
                    case "search"    : 
                        $filter = array(
                        'tenhc'           => $this->input->post('tenhc'),
                        'mota'            => $this->input->post('mota')
                    );
                    // luu vao sesssion
                    $this->session->set_userdata("filterhc", $filter);redirect('hanhchinh');
                    case "reset"     :unset($_SESSION['filterhc']);redirect('hanhchinh');
                }
            };
            
            if($mahc = $this->input->post('delete')){
                $deletect      = $this->delete($mahc);
            }

            $filter = $this->session->userdata("filterhc");
            $temp = array(
                'template'  => 'Vhanhchinh',
                'data'      => array(
                    'params'    => $this->get_params($page-1, $filter),
                    'message' => getMessages(),
                    'tenhc' => $filter['tenhc'],
                    'mota' => $filter['mota'],
                    'session'   => $session,
                    'check'     => $check,
                    'action'    => $action
                ),
            );
            // pr($temp);
            $this->load->view('layout/Vcontent', $temp);
        }

        public function addhanhchinh(){
            $session = $this->session->userdata("user");
            $tenhc        = $this->input->post('tenhc');
            $mota      = $this->input->post('mota');

            if(empty($tenhc))
				return 'Nhập tên thủ tục';
            if(empty($mota))
                return 'Nhập mô tả';

            // mảng bao gồm các giá trị được gán cho các trường dữ liệu trong csdl
            $data = array(
                'PK_sMaHanhChinh'      => time().rand(1,1000),
                'sTenHanhChinh'        => $tenhc,
                'tMota'                => $mota
            );
            // pr($data);
        $row = $this->Mhanhchinh->inserthanhchinh($data);
        
        if($row > 0){
            setMessages('success','Thêm thành công','Thông báo');
        }else{
            setMessages('danger','Thêm thất bại','Thông báo');
        }
        redirect('hanhchinh');
        }//end insert
        
        //delete 
        public function delete($mahc){

            $row    = $this->Mhanhchinh->deletehanhchinh($mahc);
            
            if ($row>0){
                setMessages('success','Xóa thành công','Thông báo');
            }
            else{
                setMessages('danger','Xóa thất bại','Thông báo');
            }
            redirect('hanhchinh');
        } //end delete

        // update
        public function update(){
            $mahc      = $this->input->post('mahc');
            $tenhc        = $this->input->post('tenhc');
            $mota      = $this->input->post('mota');
            $data = array(
                'sTenHanhChinh'      => $tenhc,
                'tMota'              => $mota,
            );
            if(empty($tenhc))
				return 'Nhập tên thủ tục';
            if(empty($mota))
                return 'Nhập mô tả';
            $row = $this->Mhanhchinh->updatehanhchinh($mahc, $data);
            if($row > 0){
                setMessages('success','Sửa thành công','Thông báo');
            }else{
                setMessages('danger','Sửa thất bại','Thông báo');
            }
            redirect('hanhchinh');
        }

        private function pagination(){
            $filter     = $this->input->post("filterhc");

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
            $total_records = $this->Mhanhchinh->getTotalRecord($dieukien);
            if ($total_records > 0){
                // get current page records
                // ($page * $limit_per_page) vi tri ban ghi dau tien
                // $limit_per_page la so luong ban ghi lay ra
                $params['hanhchinh']  = $this->Mhanhchinh->gethanhchinh($limit_per_page, $page * $limit_per_page,$dieukien);
                //pr($params);
                $config['base_url']     = base_url().'hanhchinh';
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