<?php
    class Cthemchuongtrinh extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mthemchuongtrinh');
            $this->load->library('form_validation');
        }

        public function index()
        {
            $session = $this->session->userdata("user");
            if($session['maquyen']!=1 && $session['maquyen'] !=3){
                return redirect(base_url().'403_Forbidden');
            }

            if($themct = $this->input->post('themct')){
                unset($_SESSION['filtersua']);
                redirect('themchuongtrinh');
            }
            $check = '';
            if($action = $this->input->post('action')){
                switch($action){
                    case 'taoct'    : $check=$this->addchuongtrinh();break;
                    case 'suact'    : $this->updatechuongtrinh();break;
                    case "search"   : $this->search();return;
                }
            };

            if($sua=$this->session->userdata("filtersua")){
                $action = "sua";
                $thongtincb = $this->Mthemchuongtrinh->getthongtincb($sua);
                $sinhvienduocthamgia=$this->Mthemchuongtrinh->getsinhvienduocthamgia($sua);
                $svdtg = '';
                foreach ($sinhvienduocthamgia as $key => $value){
                    $svdtg[] = $value['PK_sMaTK'];
                }
                $sinhvien=$this->Mthemchuongtrinh->getsinhvien($sua,$svdtg,'');
            }else{
                $action = "them";
                $sinhvienduocthamgia='';
                $thongtincb='';
                $sinhvien=$this->Mthemchuongtrinh->getsinhvien();
            }

            $filter = $this->session->userdata("filterct");
            $temp = array(
                'template'  => 'Vthemchuongtrinh',
                'data'      => array(
                    'sinhvienduocthamgia'    => $sinhvienduocthamgia,
                    'sinhvien'    => $sinhvien,
                    'thongtincb'    => $thongtincb,
                    'message' => getMessages(),
                    'filter' => $filter,
                    'session'   => $session,
                    'action'   => $action,
                    'check'    =>$check
                ),
            );
            // pr($temp);
            $this->load->view('layout/Vcontent', $temp);
        }

        public function addchuongtrinh(){
            $session         = $this->session->userdata("user");
            $tenct           = $this->input->post('tenct');
            $mota            = $this->input->post('mota');
            $thoigianbd      = $this->input->post('thoigianbd');
            $thoigiankt      = $this->input->post('thoigiankt');
            $thoigiandk      = $this->input->post('thoigiandk');

            $svthamgia       = $this->input->post('checksv');

            if(empty($tenct))
				return 'Nhập tên chương trình';
            if(empty($mota))
                return 'Nhập mô tả';
            if(empty($thoigianbd))
                return 'Nhập thời gian bắt đầu';
            if(empty($thoigiankt))
                return 'Nhập thời gian kết thúc';
            if($thoigianbd>$thoigiankt)
                return 'Thời gian không hợp lệ';
            // mảng bao gồm các giá trị được gán cho các trường dữ liệu trong csdl
            $data = array(
                'PK_sMaChuongTrinh'      => time().rand(1,1000),
                'stenCT'              => $tenct,
                'tMota'              => $mota,
                'FK_sMaCB'              => $this->Mthemchuongtrinh->getmacb($session['taikhoan'])[0]['PK_sMaTK'],
                'dThoiGIanBD'            => $thoigianbd,
                'dThoiGIanKT'            => $thoigiankt,
                'dThoiGianXN'            => $thoigiandk
            );

            $row = $this->Mthemchuongtrinh->insertchuongtrinh($data);

            if($row > 0){
                foreach ($svthamgia as $key => $value){
                    $data1 = array(
                        'sMaDS'      => $data['PK_sMaChuongTrinh'].$value,
                        'sMaCT'      => $data['PK_sMaChuongTrinh'],
                        'sMaTK'      => $value,
                        'iTrangThai' => '1'
                    );
                    $row = $this->Mthemchuongtrinh->insertthamgia($data1);
                }
                setMessages('success','Thêm thành công','Thông báo');
            }else{
                setMessages('danger','Thêm thất bại','Thông báo');
            }
            redirect('Chuongtrinh');
        }//end insert
        

        // update
        public function updatechuongtrinh(){
            $sua             = $this->session->userdata("filtersua");
            $session         = $this->session->userdata("user");
            $tenct           = $this->input->post('tenct');
            $mota            = $this->input->post('mota');
            $thoigianbd      = $this->input->post('thoigianbd');
            $thoigiankt      = $this->input->post('thoigiankt');
            $thoigiandk      = $this->input->post('thoigiandk');

            $svthamgia       = $this->input->post('checksv');

            if(empty($tenct))
				return 'Nhập tên chương trình';
            if(empty($mota))
                return 'Nhập mô tả';
            if(empty($thoigianbd))
                return 'Nhập thời gian bắt đầu';
            if(empty($thoigiankt))
                return 'Nhập thời gian kết thúc';
            if($thoigianbd>$thoigiankt)
                return 'Thời gian không hợp lệ';
            // mảng bao gồm các giá trị được gán cho các trường dữ liệu trong csdl
            $data = array(
                'stenCT'              => $tenct,
                'tMota'              => $mota,
                'FK_sMaCB'              => $this->Mthemchuongtrinh->getmacb($session['taikhoan'])[0]['PK_sMaTK'],
                'dThoiGIanBD'            => $thoigianbd,
                'dThoiGIanKT'            => $thoigiankt,
                'dThoiGianXN'            => $thoigiandk
            );

            $row = $this->Mthemchuongtrinh->updatechuongtrinh($sua,$data);
            if($row > 0){
                $xoa=$this->Mthemchuongtrinh->deletethamgia($sua,$svthamgia);
                foreach ($svthamgia as $key => $value){
                    $data1 = array(
                        'sMaDS'      => $sua.$value,
                        'sMaCT'      => $sua,
                        'sMaTK'      => $value,
                        'iTrangThai' => '1'
                    );
                    $check  = $this->Mthemchuongtrinh->checkthamgia($data1);
                    if($check>0){
                        $aaa    = $this->Mthemchuongtrinh->updatethamgia($data1);
                    }else{
                        $bbb    = $this->Mthemchuongtrinh->insertthamgia($data1);
                    }
                }
                setMessages('success','Sửa thành công','Thông báo');
            }else{
                setMessages('danger','Sửa thất bại','Thông báo');
            }
            redirect('Chuongtrinh');
        }

        private function search(){
            $masv = $this->session->userdata("filtersua");
            $filter = $this->input->post("filter");
            // luu thong so vao session
            $res['dssv'] = $this->Mthemchuongtrinh->getsinhvien($masv,$filter['masvcdtg'],$filter);
            echo json_encode($res);
        }
        
    }
?>