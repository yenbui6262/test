<?php
    class Cquanlytaikhoan extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mquanlytaikhoan');
            $this->load->library('Excel');
        }

        public function index($page=1)
        {
            $session = $this->session->userdata("user");
            if($session['maquyen']!=1){
                return redirect(base_url().'403_Forbidden');
            }

            if($this->input->post('importTK'))
            {
            	$this->importtaikhoan();
            }
            if($this->input->post('export'))
            {
            	$this->xuatExcel();
            }
            if($action = $this->input->post('action')){
                switch($action){
                    case "search"   : $this->search();break;
                    case "delete"   : $this->delete();break;

                }
                return;
            };
            $temp = array(
                'template'  => 'Vquanlytaikhoan',
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
            $filter['matk'] = $this->input->post("matk");
            $filter['masv'] = $this->input->post("masv");
            $checkhs = $this->Mquanlytaikhoan->checkhoso($filter['matk']);
            if(!empty($checkhs)){
                // delete lien he
                $this->Mquanlytaikhoan->deletelienhe($checkhs[0]['PK_sMaHoSo']);
                // delete ho so
                $this->Mquanlytaikhoan->deletehoso($filter['matk']);
            }
            // delete tai khoan
            $this->Mquanlytaikhoan->deletethamgia($filter['matk']);
            $this->Mquanlytaikhoan->deleteminhchung($filter['matk']);
            $this->Mquanlytaikhoan->deletedangkydon($filter['matk']);

            $kq=$this->Mquanlytaikhoan->deletetaikhoan($filter['matk']);

            if($kq==1){
                $res = $this->get_params(0, $filter);
            }else{
                $res = 1;
            }
            echo json_encode($res);
        }

        private function search(){
            $filter['masv'] = $this->input->post("filter");
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

            $total_records = $this->Mquanlytaikhoan->getTotalRecord($dieukien);
            if ($total_records > 0){
                // get current page records
                // ($page * $limit_per_page) vi tri ban ghi dau tien
                // $limit_per_page la so luong ban ghi lay ra
                $params['taikhoan']  = $this->Mquanlytaikhoan->gettaikhoan($limit_per_page, $page * $limit_per_page,$dieukien);
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

        public function xuatExcel()
        {
            $filter = $this->session->userdata("filtertksv");
            // pr($dshs);
        	$objPHPExcel = new PHPExcel();
	        $filename   = 'Mẫu nhập danh sách tài khoản sinh viên';
	        $objPHPExcel->getProperties()->setCreator("HOU")->setLastModifiedBy("Administrator");
	        $objPHPExcel->getDefaultStyle()->getFont()->setName('Times new Roman')->setSize(11);
		    // lui xuong duoi title 1 dong
            $array_content = array(
                "A1" => "TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI",
                "A2" => "KHOA KINH TẾ",
                "A4" => "DANH SÁCH TÀI KHOẢN SINH VIÊN",
                "A6" => "STT",
                "B6" => "Mã sinh viên",
                "C6" => "Họ tên",
                "A7" => "1",
                "B7" => "20A10XXXXX",
                "C7" => "Nguyễn Văn A",
                "A8" => "2",
                "B8" => "20A10XXXXX",
                "C8" => "Nguyễn Thị B",
            );


		    $array_align = array(
	            "A1:C6"
	        );
	        $array_bold = array(
	        	"A1:C6"
	        );
	        $style_array = array(
	    		'borders' 					=> array(
	    			'allborders' 			=> array(
	    				'style' 			=> PHPExcel_Style_Border::BORDER_THIN
	    			) 
	    		)
	    	);
	        foreach (range('A', 'C') as $column) {
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
			$objPHPExcel->getActiveSheet()->mergeCells('A4:C4');
			$objPHPExcel->getActiveSheet()->getStyle('A6:C8')->applyFromArray($style_array);	
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
        
        public function importtaikhoan()
        {

            $giatri=array();
            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
            $objPHPExcel = PHPExcel_IOFactory::load($_FILES['importhoso']['tmp_name']);

            $taikhoan = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true,true);
            $k=7;
            while(!empty($taikhoan[$k]['A'])){
                $tungtaikhoan = array(
                    'PK_sMaTK'  => $taikhoan[$k]['B'],
                    'sTenTK'    => $taikhoan[$k]['B'],
                    'sMatKhau'  => sha1($taikhoan[$k]['B']),
                    'sHoTen'    => $taikhoan[$k]['C'],
                    'FK_sMaQuyen'    => '2',

                );
				// pr($tungtaikhoan);

                $qq= $this->Mquanlytaikhoan->checktaikhoan($tungtaikhoan);
                
                if($qq==0){
                    $kq= $this->Mquanlytaikhoan->inserttaikhoan($tungtaikhoan);
                    
                }else{
                    $row = $this->Mquanlytaikhoan->updatetaikhoan($tungtaikhoan);
                }
				
                $k++;
            }
       
            setMessages("success", "Cập nhật thành công", "Cập nhật thành công");
            redirect('quanlytaikhoan');
        }
    }
?>