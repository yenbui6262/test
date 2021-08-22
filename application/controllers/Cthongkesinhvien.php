<?php
    class Cthongkesinhvien extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mthongkesinhvien');
            $this->load->library('Excel');
        }

        public function index($page=1)
        {
            $session = $this->session->userdata("user");
            // pr($session);
            if($session['maquyen']==3||$session['maquyen']==1){
                
            }else{
                $this->session->sess_destroy();
                return redirect(base_url().'403_Forbidden');
            }
            if($chitiet = $this->input->post('chitiet')){
                $this->session->set_userdata("filterctsv", $chitiet);
                redirect("chitietsinhvien");
            }
            if($action = $this->input->post('export'))
            {
                if($action =='export'){
            	    $this->xuatExcel();
                }else{
            	    $this->xuatMauExcel();
                }
            }
            
            if($this->input->post('submit'))
            {
            	$this->importhoso();
            }
            if($action = $this->input->post('action')){
                switch($action){
                    case "search":
                        $filtertksv = array(
                            'lop'      => $this->input->post('lop'),
                            'chucvu'      => $this->input->post('chucvu'),
                            'ngaysinh'      => $this->input->post('ngaysinh'),
                            'gioitinh'      => $this->input->post('gioitinh'),
                            'tinhtt'      => $this->input->post('tinhtt'),
                            'huyentt'      => $this->input->post('huyentt'),
                            'xatt'      => $this->input->post('xatt'),
                            'tinhht'      => $this->input->post('tinhht'),
                            'huyenht'      => $this->input->post('huyenht'),
                            'xaht'      => $this->input->post('xaht'),
                        );
                        // pr($filtertksv);
                        // luu vao sesssion
                        $this->session->set_userdata("filtertksv", $filtertksv);
                        redirect("thongkesinhvien");
                    case "reset":
                        unset($_SESSION['filtertksv']);
                        redirect("thongkesinhvien");
                    case "gethuyen":
                        $matinh = $this->input->post("matinh");
                        $res=$this->Mthongkesinhvien->gethuyen_theotinh($matinh);
                        echo json_encode($res);
                        break;
                    case "getxa":
                        $mahuyen = $this->input->post("mahuyen");
                        $res=$this->Mthongkesinhvien->getxa_theohuyen($mahuyen);
                        echo json_encode($res);
                        break;
                    case "capcanbolop":
                        $chucvu = $this->input->post("chucvu");
                        $matk = $this->input->post("matk");
                        $res = $this->Mthongkesinhvien->capcanbolop($matk,$chucvu);
                        $taikhoan = $this->Mthongkesinhvien->gettaikhoan($matk);
                        echo json_encode($taikhoan);
                        break;
                    case "xoacanbolop":
                        $matk = $this->input->post("matk");
                        $res = $this->Mthongkesinhvien->xoacanbolop($matk);
                        $taikhoan = $this->Mthongkesinhvien->gettaikhoan($matk);
                        echo json_encode($taikhoan);
                        break;
                }
                return;
            }

            $filter = $this->session->userdata("filtertksv");

            $huyentt_list = '';
            $huyenht_list = '';
            $xatt_list    = '';
            $xaht_list    = '';

            if(!empty($filter['tinhtt'])){
                // lấy huyện
                $huyentt_list 	= $this->Mthongkesinhvien->getListhuyen($filter['tinhtt']);   

            }
            if(!empty($filter['huyentt'])){
                // lấy xã
                $xatt_list 	    = $this->Mthongkesinhvien->getListxa($filter['huyentt']);
            }
            if(!empty($filter['tinhht'])){
                // lấy huyện
                $huyenht_list 	= $this->Mthongkesinhvien->getListhuyen($filter['tinhht']);  
            }
            if(!empty($filter['huyenht'])){
                // lấy xã
                $xaht_list 	    = $this->Mthongkesinhvien->getListxa($filter['huyenht']);
            }

            $uutien	= $this->Mthongkesinhvien->getListuutien();


            $tinh_list	    = $this->Mthongkesinhvien->getListtinh();
            $temp = array(
                'template'  => 'Vthongkesinhvien',
                'data'      => array(
                    'params'    => $this->get_params($page-1, $filter),
                    'message' => getMessages(),
                    'filter' => $filter,
                    'tinh'      => $tinh_list,
                    'uutien'    => $uutien,
                    'huyentt'   => $huyentt_list,
                    'xatt'      => $xatt_list,
                    'huyenht'   => $huyenht_list,
                    'xaht'      => $xaht_list,
                    'session'   => $session
                ),
            );
            // pr($temp['data']['params']['sinhvien']);
            $this->load->view('layout/Vcontent', $temp);
        }
        
        public function get_params($page, $dieukien){
            $session = $this->session->userdata("user");
            // init params
            $params = array();
            // So trang tren 1 page
            $limit_per_page = 50;
            // lay bien page tu url, nhung load tu ajax thi khong can
            /*$page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;*/
            $page = $page;
            $params['stt'] = $limit_per_page * $page + 1;
            $params['lop'] = $this->Mthongkesinhvien->getlop();
            $total_records = $this->Mthongkesinhvien->getTotalsinhvien($dieukien);

            if ($total_records > 0){
                // get current page records
                // ($page * $limit_per_page) vi tri ban ghi dau tien
                // $limit_per_page la so luong ban ghi lay ra
                $params['sinhvien']  = $this->Mthongkesinhvien->getlistsinhvien($limit_per_page, $page * $limit_per_page,$dieukien);
                // pr($params);
                $config['base_url']     = base_url().'thongkesinhvien';
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


        public function xuatMauExcel()
        {
            $objPHPExcel = new PHPExcel();
            $filename   = 'Mẫu nhập danh sách hồ sơ sinh viên';
            $objPHPExcel->getProperties()->setCreator("HOU")->setLastModifiedBy("Administrator");
            $objPHPExcel->getDefaultStyle()->getFont()->setName('Times new Roman')->setSize(11);
            // lui xuong duoi title 1 dong
            $array_content = array(
                "A1" => "TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI",
                "A2" => "KHOA KINH TẾ",
                "A4" => "DANH SÁCH HỒ SƠ SINH VIÊN",
                "A6" => "STT",
                "B6" => "Mã sinh viên",
                "C6" => "Số điện thoại",
                "D6" => "Số tài khoản",
                "E6" => "Chi nhánh",
                "A7" => "1",
                "B7" => "20A10xxxxxx",
                "C7" => "03xxxxxxxx",
                "D7" => "101xxxxxxx",
                "E7" => "Hoàn Kiếm",
            );


            $array_align = array(
                "A1:E6"
            );
            $array_bold = array(
                "A1:E6"
            );
            $style_array = array(
                'borders' 					=> array(
                    'allborders' 			=> array(
                        'style' 			=> PHPExcel_Style_Border::BORDER_THIN
                    ) 
                )
            );
            foreach (range('A', 'E') as $column) {
                $objPHPExcel->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
            }
	    	foreach ($array_align as $key => $cell) {
	            $objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	            $objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	        }
	        foreach ($array_bold as $cells) {
				$objPHPExcel->getActiveSheet()->getStyle($cells)->getFont()->setBold(true);
			}
			foreach($array_content as $key => $value){
	            $objPHPExcel->getActiveSheet()->setCellValue($key,$value);
	        }
            $start--;
			$objPHPExcel->getActiveSheet()->mergeCells('A1:C1');	
			$objPHPExcel->getActiveSheet()->mergeCells('A2:C2');	
			$objPHPExcel->getActiveSheet()->mergeCells('A4:E4');	
			$objPHPExcel->getActiveSheet()->getStyle('A6:E7')->applyFromArray($style_array);	
	        $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	    	$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$objPHPExcel->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
            $objPHPExcel->getActiveSheet()
                    ->getPageMargins()->setTop(0.5);
            $objPHPExcel->getActiveSheet()
                ->getPageMargins()->setRight(0.25);
            $objPHPExcel->getActiveSheet()
                ->getPageMargins()->setLeft(0.25);
            $objPHPExcel->getActiveSheet()
                ->getPageMargins()->setBottom(0.5);

		    ob_end_clean();
		    header("Content-type: application/vnd.ms-excel");
		    header("Content-Disposition: attachment;filename=".$filename.".xls");
		    header("Cache-Control: max-age=0");

		    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		    $objWriter->save('php://output');
	        exit();   
        }
        public function xuatExcel()
        {
            $filter = $this->session->userdata("filtertksv");
            $dshs = $this->Mthongkesinhvien->getExcel($filter);
            // pr($dshs);
        	$objPHPExcel = new PHPExcel();
	        $filename   = 'Danh sách hồ sơ sinh viên';
	        $objPHPExcel->getProperties()->setCreator("HOU")->setLastModifiedBy("Administrator");
	        $objPHPExcel->getDefaultStyle()->getFont()->setName('Times new Roman')->setSize(11);
		    // lui xuong duoi title 1 dong
            $array_content = array(
                "A1" => "TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI",
                "A2" => "KHOA KINH TẾ",
                "A4" => "DANH SÁCH THỐNG KÊ SINH VIÊN",
                "A6" => "STT",
                "B6" => "Mã sinh viên",
                "C6" => "Họ tên",
                "D6" => "Ngày sinh",
                "E6" => "Giới tính",
                "F6" => "Lớp",
                "G6" => "Chức vụ",
                "H6" => "Điạ chỉ thường trú",
                "I6" => "Điạ chỉ hiện tại"
            );
            $start=7;
	        $index = 1;
	        foreach ($dshs as $tk) {
                if($tk['iGioiTinh']==1){
                    $tk['iGioiTinh']='Nam';
                }else{
                    $tk['iGioiTinh']='Nữ';
                }
                if(!empty($tk['dNgaySinh'])){
                    $tk['dNgaySinh'] = date("d/m/Y", strtotime($tk['dNgaySinh']));
                }else{
                    $tk['dNgaySinh']='';
                }
	            $array_content['A' . $start]    = $index++;
	            $array_content['B' . $start]    = $tk['sTenTK'];
	            $array_content['C' . $start]    = $tk['sHoTen'];
	            $array_content['D' . $start]    = $tk['dNgaySinh'];
	            $array_content['E' . $start]    = $tk['iGioiTinh'];
	            $array_content['F' . $start]    = $tk['sTenLop'];
	            $array_content['G' . $start]    = $tk['sChucvu'];
                if( !($tk['xatt'] )|| !($tk['xaht'] )){
                    $array_content['H' . $start]    = '';
                    $array_content['I' . $start]    = '';
                }else{
                    $array_content['H' . $start]    = $tk['xatt'].', '.$tk['huyentt'].', '.$tk['tinhtt'];
                    $array_content['I' . $start]    = $tk['xaht'].', '.$tk['huyenht'].', '.$tk['tinhht'];
                }
                
                $start++;
            }


		    $array_align = array(
	            "A1:I6"
	        );
	        $array_bold = array(
	        	"A1:I6"
	        );
            $style_array = array(
	    		'borders' 					=> array(
	    			'allborders' 			=> array(
	    				'style' 			=> PHPExcel_Style_Border::BORDER_THIN
	    			) 
	    		)
	    	);
	        foreach (range('A', 'I') as $column) {
	    		$objPHPExcel->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
	    	}
	    	foreach ($array_align as $key => $cell) {
	            $objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	            $objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	        }
	        foreach ($array_bold as $cells) {
				$objPHPExcel->getActiveSheet()->getStyle($cells)->getFont()->setBold(true);
			}
			foreach($array_content as $key => $value){
	            $objPHPExcel->getActiveSheet()->setCellValue($key,$value);
	        }
            $start--;
            $objPHPExcel->getActiveSheet()->mergeCells('A1:C1');	
			$objPHPExcel->getActiveSheet()->mergeCells('A2:C2');	
			$objPHPExcel->getActiveSheet()->mergeCells('A4:I4');
			$objPHPExcel->getActiveSheet()->getStyle('A6:I'.$start)->applyFromArray($style_array);	
	        $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	    	$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$objPHPExcel->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
            $objPHPExcel->getActiveSheet()
                    ->getPageMargins()->setTop(0.5);
            $objPHPExcel->getActiveSheet()
                ->getPageMargins()->setRight(0.25);
            $objPHPExcel->getActiveSheet()
                ->getPageMargins()->setLeft(0.25);
            $objPHPExcel->getActiveSheet()
                ->getPageMargins()->setBottom(0.5);

		    ob_end_clean();
		    header("Content-type: application/vnd.ms-excel");
		    header("Content-Disposition: attachment;filename=".$filename.".xls");
		    header("Cache-Control: max-age=0");

		    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		    $objWriter->save('php://output');
	        exit();   
        }
        public function importhoso()
        {
            // echo ("123");exit();
            $giatri=array();
            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
            $objPHPExcel = PHPExcel_IOFactory::load($_FILES['importhoso']['tmp_name']);

            $hoso=$objPHPExcel->getActiveSheet()->toArray(null,true,true,true,true);
            
            $k=7;
            while(!empty($hoso[$k]['A'])){
                $tunghoso = array(
                    'sSDT'      => $hoso[$k]['C'],
                    'sSTK'      => $hoso[$k]['D'],
                    'sChiNhanh' => $hoso[$k]['E'],
                );
				
				//check tai khoan theo ma sv;
                $checktk = $this->Mthongkesinhvien->checktaikhoan($hoso[$k]['B']);
                $kq=0;
                $row=0;
                if(!empty($checktk)){
                    $tunghoso['FK_sMaTK'] = $checktk[0]['PK_sMaTK'];
                    $qq= $this->Mthongkesinhvien->checkhoso($tunghoso);
                    if($qq==0){
                        $tunghoso['PK_sMaHoSo']=time().$tunghoso['FK_sMaTK'];
                        $kq= $this->Mthongkesinhvien->inserthoso($tunghoso);
                        $kq=1;
                    }else{
                        $row = $this->Mthongkesinhvien->updatehoso($tunghoso,array('FK_sMaTK'=> $tunghoso['FK_sMaTK']));
                        $row = 1;
                    }
                }
				
                $k++;
            }
            
            if ($kq > 0||$row ==1) 
            {
                setMessages("success", "Thêm thành công", "Thêm thành công");
                redirect('Cthongkesinhvien');
            } 
            else 
            {
                setMessages("error", "Thêm thất bại", "Thêm thất bại");
                redirect('Cthongkesinhvien');
            }
            exit();
        }
        
    }
?>