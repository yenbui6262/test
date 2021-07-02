<?php 
class Cds_minhchung extends MY_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Mds_minhchung');
    }
    public function index($page=1)
        {
            $session = $this->session->userdata("user");
            if($session['maquyen']!=2){
                $this->session->sess_destroy();
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
                    $this->session->set_userdata("filterct", $filter);redirect('ds_minhchung');
                }
            };
            

            $filter = $this->session->userdata("filterct");
            $temp = array(
                'template'  => 'Vds_minhchung',
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
        private function pagination(){
            $filter     = $this->input->post("filterct");

            $pageX      = $this->input->post("page");
            $res        = $this->get_params($pageX-1, $filter);
            if(!empty($res)){
                echo json_encode($res);
            }
        }

        public function get_params($page, $dieukien){
            $session=$this->session->userdata('user');
            // init params
            $params = array();
            // So trang tren 1 page
            $limit_per_page = 5;
            // lay bien page tu url, nhung load tu ajax thi khong can
            /*$page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;*/
            $page = $page;
            $params['stt'] = $limit_per_page * $page + 1;
            $total_records = $this->Mds_minhchung->getTotalRecord($session['taikhoan'],$dieukien);
            if ($total_records > 0){
                // get current page records
                // ($page * $limit_per_page) vi tri ban ghi dau tien
                // $limit_per_page la so luong ban ghi lay ra
                $params['chuongtrinh']  = $this->Mds_minhchung->getChuongtrinh($limit_per_page, $page * $limit_per_page,$session['taikhoan'],$dieukien);
                //pr($params);
                $config['base_url']     = base_url().'ds_minhchung';
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