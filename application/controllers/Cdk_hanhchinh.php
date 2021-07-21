<?php 
class Cdk_hanhchinh extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mdk_hanhchinh');
    }
    public function index($page=1){
        $session = $this->session->userdata("user");
        $date = date("Y-m-d H:i:s");
        $hanhchinh  = $this->Mdk_hanhchinh->getHanhchinh();
        if($this->input->post("hanhchinh")){
            $post_data = $this->input->post('hanhchinh');
            if($post_data['type'] == "submit"){
                    $donhc=array(
                        'PK_sMaDangKy'      => time().$session['taikhoan'],
                        'FK_sMaSV'          => $session['taikhoan'],
                        'FK_sMaCanbo'       => null,
                        'FK_sMaHanhChinh'   => $post_data['Ma'],
                        'dTGThem'           => $date,
                        'iTrangThai'        => "0",
                        'tLydo'             => $post_data['lydo'],

                    );
                    // pr($donhc);exit();
                if($post_data['Ma'] == 0 ){
                    setMessages("warning", "Thông tin không được để trống");
                    return redirect(current_url());
                }
                if($this->Mdk_hanhchinh->findDon($donhc) > 0){
                    setMessages("warning", "Đã Đăng ký đơn");
                    return redirect(current_url());
                }
                $row=$this->Mdk_hanhchinh->insertHanhchinh($donhc);
                if($row>0){
                    setMessages("success", "Đăng ký thành công");
                } return redirect(current_url());
                
            }else if($post_data['type'] == "update"){
                    $Madk = $post_data['madangky'];
                    $donhc=array(
                        'FK_sMaHanhChinh'   => $post_data['suaMa'],
                        'dTGThem'           => $date,
                        'tLydo'             => $post_data['sualydo'],

                    );
                    // pr($donhc);exit();
                
                $row=$this->Mdk_hanhchinh->updateHanhchinh($Madk, $donhc);
                if($row>0){
                    setMessages("success", "Sửa thành công");
                } return redirect(current_url());

            }else if($post_data['type'] == "search"){
                $filterhc = array(
                    'tenhc'           => $this->input->post('tenhc'),
                    'mota'            => $this->input->post('mota'),
                    'trangthai'      => $this->input->post('trangthai'),
                );
                // luu vao sesssion
                $this->session->set_userdata("filterhc", $filterhc);redirect('dk_hanhchinh');
            }
        }
        if($this->input->post("delete")){
            //action=deletehc - huy dang ky
            $madk=$this->input->post("delete");

            $row=$this->Mdk_hanhchinh->deleteHanhchinh($madk);
            if($row>0){
                setMessages("success", "Xóa thành công");
            } return redirect(current_url());
        }
        
        $filterhc = $this->session->userdata("filterhc");
        $temp = array(
            'template'  => 'Vdk_hanhchinh',
            'data'     	=> array(
                'session'   => $session,
                'message' 	=> getMessages(),
                'params'    => $this->get_params($page-1, $filterhc),
                'tenhc'     => $filterhc['tenhc'],
                'mota'      => $filterhc['mota'],
                'trangthai' => $filterhc['trangthai'],
                'hanhchinh' => $hanhchinh,
            ),
        );
        // pr($temp);exit();
        $this->load->view('layout/VContent',$temp);
    }
    private function pagination(){
        $filterhc     = $this->input->post("filterhc");

        $pageX      = $this->input->post("page");
        $res        = $this->get_params($pageX-1, $filterhc);
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
        $total_records = $this->Mdk_hanhchinh->getTotalRecord($dieukien,$session['taikhoan']);
        if ($total_records > 0){
            // get current page records
            // ($page * $limit_per_page) vi tri ban ghi dau tien
            // $limit_per_page la so luong ban ghi lay ra
            // $params['hanhchinh']  = $this->Mdk_hanhchinh->getHanhchinh();
            $params['dondk'] 	= $this->Mdk_hanhchinh->getDon($limit_per_page, $page * $limit_per_page,$dieukien,$session['taikhoan']);
            
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