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
            if($session['maquyen']!=1&&$session['maquyen']!=3){
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
                    case 'suact'    : $check=$this->updatechuongtrinh();break;
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
            }else{
                $action = "them";
                $sinhvienduocthamgia='';
                $thongtincb='';
            }

            $filter = $this->session->userdata("filterct");
            $temp = array(
                'template'  => 'Vthemchuongtrinh',
                'data'      => array(
                    'sinhvienduocthamgia'    => $sinhvienduocthamgia,
                    'thongtincb'    => $thongtincb,
                    'lop' => $this->Mthemchuongtrinh->getlop(),
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

            if(!($tenct))
				return 'Nh???p t??n ch????ng tr??nh';
            if(!($mota))
                return 'Nh???p m?? t???';
            if(!($thoigianbd))
                return 'Nh???p th???i gian b???t ?????u';
            if(!($thoigiankt))
                return 'Nh???p th???i gian k???t th??c';
            if($thoigianbd>$thoigiankt)
                return 'Th???i gian kh??ng h???p l???';
            // m???ng bao g???m c??c gi?? tr??? ???????c g??n cho c??c tr?????ng d??? li???u trong csdl
            $macb = $this->Mthemchuongtrinh->getmacb($session['taikhoan']);
            $data = array(
                'PK_sMaChuongTrinh'      => time().rand(1,1000),
                'stenCT'              => $tenct,
                'tMota'              => $mota,
                'FK_sMaCB'              => $macb[0]['PK_sMaTK'],
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
                setMessages('success','Th??m th??nh c??ng','Th??ng b??o');
            }else{
                setMessages('danger','Th??m th???t b???i','Th??ng b??o');
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

            if(!($tenct))
				return 'Nh???p t??n ch????ng tr??nh';
            if(!($mota))
                return 'Nh???p m?? t???';
            if(!($thoigianbd))
                return 'Nh???p th???i gian b???t ?????u';
            if(!($thoigiankt))
                return 'Nh???p th???i gian k???t th??c';
            if($thoigianbd>$thoigiankt)
                return 'Th???i gian kh??ng h???p l???';
            // m???ng bao g???m c??c gi?? tr??? ???????c g??n cho c??c tr?????ng d??? li???u trong csdl
            $macb = $this->Mthemchuongtrinh->getmacb($session['taikhoan']);
            $data = array(
                'stenCT'              => $tenct,
                'tMota'              => $mota,
                'FK_sMaCB'              => $macb[0]['PK_sMaTK'],
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
                    }else{
                        $bbb    = $this->Mthemchuongtrinh->insertthamgia($data1);
                    }
                }
                setMessages('success','S???a th??nh c??ng','Th??ng b??o');
            }else{
                setMessages('danger','S???a th???t b???i','Th??ng b??o');
            }
            redirect('Chuongtrinh');
        }

        private function search(){
            $filter = $this->input->post("filter");
            // pr($filter);
            // luu thong so vao session
            $res['dssv'] = $this->Mthemchuongtrinh->searchsinhvien($filter);
            echo json_encode($res);
        }
        
    }
?>