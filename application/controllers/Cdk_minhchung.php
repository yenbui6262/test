<?php 
class Cdk_minhchung extends MY_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Mdk_minhchung');
    }
    public function index($page=1){
        $session = $this->session->userdata("user");
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d");
        if($this->input->post('minhchung')){
            $post_data = $this->input->post('minhchung');
            if($post_data['type'] == "submit"){
                $data_insert = array(
                    'PK_sMaMC'  => $post_data['ichuongtrinh'].$session['taikhoan'],  
                    'FK_sMaSV'  => $session['taikhoan'],
                    'FK_sMaCT'  => $post_data['ichuongtrinh'],
                    'tLink'     => $post_data['ilinkdrive'],
                    'iTrangThai'=> 1,
                );
                // pr($data_insert);exit();
                if($post_data['ichuongtrinh'] == 0 || $post_data['ilinkdrive'] == null ){
                    setMessages("warning", "Thông tin không được để trống");
                    return redirect(current_url());
                }
                if($this->Mdk_minhchung->findMC($data_insert)){
                    setMessages("warning", "Đã tồn tại minh chứng");
                    return redirect(current_url());
                }
                $res = $this->Mdk_minhchung->insertMinhChung($data_insert);
                if($res > 0){
                    setMessages("success", "Thêm minh chứng thành công");
                    return redirect(current_url());
                }
                setMessages("danger", "Thêm minh chứng thất bại");
                return redirect(current_url());
            }else if($post_data['type'] =='fix'){
                $mamc=$post_data['chuongtrinh'].$session['taikhoan'];
                $data_insert = array(
                    'tLink'     => $post_data['linkdrive']
                );
                // pr($data_insert);exit();
                if($mamc == 0 || $post_data['linkdrive'] == null ){
                    setMessages("warning", "Thông tin không được để trống");
                    return redirect(current_url());
                }
                $res = $this->Mdk_minhchung->updateMinhchung($mamc,$data_insert);
                if($res > 0){
                    setMessages("success", "Sửa minh chứng thành công");
                    return redirect(current_url());
                }
                setMessages("danger", "Sửa minh chứng thất bại");
                return redirect(current_url());
            }else if($post_data['type'] =='search'){
                $filter = array(
                    'thoigianbd'      => $this->input->post('thoigianbd'),
                    'thoigiankt'      => $this->input->post('thoigiankt'),
                    'trangthai'       => $this->input->post('trangthai'),
                    'tenchuongtrinh'  => $this->input->post('tenchuongtrinh')
                );
                $this->session->set_userdata("filterct", $filter);redirect('dk_minhchung');
            }
        }
        if($this->input->post('delete')){
            $mamc=$this->input->post('delete');
            // pr($mamc);exit();
            $res = $this->Mdk_minhchung->deleteMinhchung($mamc);
            if($res > 0){
                setMessages("success", "Xóa minh chứng thành công");
                return redirect(current_url());
            }
            setMessages("danger", "Xóa minh chứng thất bại");
            return redirect(current_url());
        }
        $sinhvien['chuongtrinh'] = $this->Mdk_minhchung->getChuongTrinh($date);
        $sinhvien['canbo'] = $this->Mdk_minhchung->getCanBo();
        $filter = $this->session->userdata("filterct");
        $temp = array(
            'template'  => 'Vdk_minhchung',
            'data'     	=> array(
                'session'       => $session,
                'message' 	    => getMessages(),
                'params'        => $this->get_params($page-1, $filter),
                'thoigianbd'    => $filter['thoigianbd'],
                'thoigiankt'    => $filter['thoigiankt'],
                'trangthai'     => $filter['trangthai'],
                'tenchuongtrinh'=> $filter['tenchuongtrinh'],
                'sinhvien'      => $sinhvien,
                'dTGDuyet'      => $this->Mdk_minhchung->getTGduyet($session['taikhoan']),
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
        $total_records = $this->Mdk_minhchung->getTotalRecord($dieukien,$session['taikhoan']);
        if ($total_records > 0){
            // get current page records
            // ($page * $limit_per_page) vi tri ban ghi dau tien
            // $limit_per_page la so luong ban ghi lay ra
            $params['minhchung']  = $this->Mdk_minhchung->getMinhchung($limit_per_page, $page * $limit_per_page,$dieukien,$session['taikhoan']);
            //pr($params);
            $config['base_url']     = base_url().'dk_minhchung';
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