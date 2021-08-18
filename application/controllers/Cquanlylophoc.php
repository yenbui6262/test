<?php
    class Cquanlylophoc extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mquanlylophoc');
            $this->load->library('Excel');
        }

        public function index($page=1)
        {
            $session = $this->session->userdata("user");
            if($session['maquyen']!=1){
                return redirect(base_url().'403_Forbidden');
            }

            if($action = $this->input->post('action')){
                switch($action){
                    case "search"   : $this->search();break;
                    case "delete"   : $this->delete();break;
                    case "insert"   : $this->insert();break;

                }
                return;
            };
            $temp = array(
                'template'  => 'Vquanlylophoc',
                'data'      => array(
                    'params'    => $this->get_params($page-1, ''),
                    'message' => getMessages(),
                    'session'   => $session,
                ),
            );
            // pr($temp);
            $this->load->view('layout/Vcontent', $temp);
        }

        
        //delete 
        public function delete(){
            $filter['malop'] = $this->input->post("malop");
            $filter['tenlop'] = $this->input->post("tenlop");
            $abc = $this->Mquanlylophoc->updatetaikhoan($filter['malop']);
            $kq=$this->Mquanlylophoc->deletelophoc($filter['malop']);

            if($kq==1){
                $res = $this->get_params(0, $filter);
            }else{
                $res = 1;
            }
            echo json_encode($res);
        }

         //delete 
         public function insert(){
            $data['PK_sMaLop'] = $this->input->post("tenlop");
            $data['sTenLop'] = $this->input->post("tenlop");
            if(empty($data['sTenLop'])){
                setMessages("warning", "Thông tin không được để trống");
                redirect('quanlylophoc');
            }
            $check = $this->Mquanlylophoc->checklophoc($data['sTenLop']);
            if(empty($check)){
                $res=$this->Mquanlylophoc->insertlophoc($data);
                setMessages("success", "Thêm thành công");
            }else{
                setMessages("warning", "Đã tồn tại lớp này");
            }
            redirect('quanlylophoc');
        }

        private function search(){
            $filter['tenlop'] = $this->input->post("filter");
            $res = $this->get_params(0, $filter);
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

            $total_records = $this->Mquanlylophoc->getTotalRecord($dieukien);
            if ($total_records > 0){
                // get current page records
                // ($page * $limit_per_page) vi tri ban ghi dau tien
                // $limit_per_page la so luong ban ghi lay ra
                $params['lophoc']  = $this->Mquanlylophoc->getlophoc($limit_per_page, $page * $limit_per_page,$dieukien);
                //pr($params);
                $config['base_url']     = base_url().'quanlytaikhoan';
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