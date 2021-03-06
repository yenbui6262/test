<?php
    class Cchuongtrinh extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mchuongtrinh');
            $this->load->library('form_validation');
        }

        public function index($page=1)
        {
            $session = $this->session->userdata("user");
            if($session['maquyen']!=1&&$session['maquyen']!=3){
                return redirect(base_url().'403_Forbidden');
            }
            if($action = $this->input->post('action')){
                switch($action){
                    case "search"    : 
                        $filter = array(
                        'tenct'           => $this->input->post('tenct'),
                        'mota'            => $this->input->post('mota'),
                        'thoigianbd'      => $this->input->post('thoigianbd'),
                        'thoigiankt'      => $this->input->post('thoigiankt')
                    );
                    // luu vao sesssion
                    $this->session->set_userdata("filterct", $filter);redirect('Chuongtrinh');
                    case "reset"     :unset($_SESSION['filterct']);redirect('Chuongtrinh');
                    case "delete"    : $this->delete();return;
                }
            };
            
            
            if($Mact = $this->input->post('sua')){
                $this->session->set_userdata("filtersua",  $Mact );
                redirect('suachuongtrinh');
            }

            if($Mact = $this->input->post('chitiet')){
                $this->session->set_userdata("filterthongtin",  $Mact );
                redirect('thongtinchuongtrinh');
            }
            
            $filter = $this->session->userdata("filterct");
            $temp = array(
                'template'  => 'Vchuongtrinh',
                'data'      => array(
                    'params'    => $this->get_params($page-1, $filter),
                    'message' => getMessages(),
                    'tenct' => $filter['tenct'],
                    'mota' => $filter['mota'],
                    'thoigianbd' => $filter['thoigianbd'],
                    'thoigiankt' => $filter['thoigiankt'],
                    'session'   => $session,
                ),
            );
            // pr($temp);
            $this->load->view('layout/Vcontent', $temp);
        }

        
        //delete 
        public function delete(){
            $filter = $this->session->userdata("filterct");
            $mact    = $this->input->post('filter');
            $delete    = $this->Mchuongtrinh->deletethamgia($mact['mact']);
            $row    = $this->Mchuongtrinh->deletechuongtrinh($mact['mact']);
            if($row==1){
                $row=$this->get_params(0, $filter);
            }else{
                $row=0;
            }
            echo json_encode($row);
        } //end delete

        public function get_params($page, $dieukien){

            // init params
            $params = array();
            // So trang tren 1 page
            $limit_per_page = 50;
            // lay bien page tu url, nhung load tu ajax thi khong can
            /*$page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;*/
            $page = $page;
            $params['stt'] = $limit_per_page * $page + 1;
            
            $params['khongthamgia'] = $this->Mchuongtrinh->khongthamgia($limit_per_page, $page * $limit_per_page,$dieukien);
            $params['thamgia'] = $this->Mchuongtrinh->thamgia($limit_per_page, $page * $limit_per_page,$dieukien);
            $params['tatca'] = $this->Mchuongtrinh->tatca($limit_per_page, $page * $limit_per_page,$dieukien);

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