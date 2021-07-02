<?php 
class Cdk_hanhchinh extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mdk_hanhchinh');
    }
    public function index($page=1){
        $session = $this->session->userdata("user");
        $masv = $session['taikhoan'];
        $mahc = $this->input->post("id");
        if($action = $this->input->post("action")){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date("Y-m-d");
            if($action == "add"){
                    $donhc=array(
                        'PK_sMaDangKy'      => time().rand(1,10000),
                        'FK_sMaSV'          => $masv,
                        'FK_sMaCanbo'       => "admin",
                        'FK_sMaHanhChinh'   => $mahc,
                        'dTGThem'           =>$date,
                        'iTrangThai'        =>"0"

                    );
                $row=$this->Mdk_hanhchinh->insertHanhchinh($donhc);
            }else if($action == "deletehc"){
                //action=deletehc - huy dang ky
                $row=$this->Mdk_hanhchinh->deleteHanhchinh($mahc,$session['taikhoan']);
                
            }
            if($row>0){
                setMessages("success", "Cập nhật thành công");
            }
            
            if($action == "search"){
                $filter = array(
                    'tenhc'           => $this->input->post('tenhc'),
                    'mota'            => $this->input->post('mota'),
                    'trangthai'      => $this->input->post('trangthai'),
                );
                // luu vao sesssion
                $this->session->set_userdata("filterct", $filter);redirect('dk_hanhchinh');
            }
        }
        
        $filter = $this->session->userdata("filterct");
        $temp = array(
            'template'  => 'Vdk_hanhchinh',
            'data'     	=> array(
                'session'   => $session,
                'message' 	=> getMessages(),
                'params'    => $this->get_params($page-1, $filter),
                'tenhc' => $filter['tenhc'],
                'mota' => $filter['mota'],
                'trangthai' => $filter['trangthai'],
            ),
        );
        
        // pr($temp);
        $this->load->view('layout/VContent',$temp);
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
        $session = $this->session->userdata("user");
        // init params
        $params = array();
        // So trang tren 1 page
        $limit_per_page = 25;
        // lay bien page tu url, nhung load tu ajax thi khong can
        /*$page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;*/
        $page = $page;
        $params['stt'] = $limit_per_page * $page + 1;
        $total_records = $this->Mdk_hanhchinh->getTotalRecord($dieukien);
        if ($total_records > 0){
            // get current page records
            // ($page * $limit_per_page) vi tri ban ghi dau tien
            // $limit_per_page la so luong ban ghi lay ra
            $params['hanhchinh']  = $this->Mdk_hanhchinh->getHanhchinh($limit_per_page, $page * $limit_per_page,$dieukien);
            foreach($params['hanhchinh'] as $chimuc => $giatri){
                $params['dondk'][$chimuc] 	= $this->Mdk_hanhchinh->checkMahc($session['taikhoan'],$giatri['PK_sMaHanhChinh']);
            };
            //pr($params);
            $config['base_url']     = base_url().'dk_hanhchinh';
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