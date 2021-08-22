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

            if($this->input->post('importLop'))
            {
            	$this->importlophoc();
            }
            if($this->input->post('export'))
            {
            	$this->xuatExcel();
            }

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
            
            $data['PK_sMaLop'] = $this->input->post("lop");
            $data['sTenLop'] = $this->input->post("lop");
            
            $check = $this->Mquanlylophoc->checklophoc($data['sTenLop']);
            
            if(!($check)){
                // pr($data);exit();
                $lop=$this->Mquanlylophoc->insertlophoc($data);
                $res = $this->get_params(0, $filter=null);
            }else if($check>0){
                $res = 2;
            }else{
                $res =1;
            }
            echo json_encode($res);
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
                $config['base_url']     = base_url().'quanlylophoc';
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
            // pr($dshs);
        	$objPHPExcel = new PHPExcel();
	        $filename   = 'Mẫu nhập danh sách lớp học';
	        $objPHPExcel->getProperties()->setCreator("HOU")->setLastModifiedBy("Administrator");
	        $objPHPExcel->getDefaultStyle()->getFont()->setName('Times new Roman')->setSize(11);
		    // lui xuong duoi title 1 dong
            $array_content = array(
                "A1" => "TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI",
                "A2" => "KHOA KINH TẾ",
                "A4" => "DANH SÁCH LỚP HỌC",
                "A6" => "STT",
                "B6" => "Tên lớp",
                "A7" => "1",
                "B7" => "2010AXX",
                "A8" => "2",
                "B8" => "2010AYY",
            );


		    $array_align = array(
	            "A1:B6"
	        );
	        $array_bold = array(
	        	"A1:B6"
	        );
	        $style_array = array(
	    		'borders' 					=> array(
	    			'allborders' 			=> array(
	    				'style' 			=> PHPExcel_Style_Border::BORDER_THIN
	    			) 
	    		)
	    	);
	        foreach (range('A', 'B') as $column) {
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
            $objPHPExcel->getActiveSheet()->mergeCells('A1:D1');	
			$objPHPExcel->getActiveSheet()->mergeCells('A2:D2');	
			$objPHPExcel->getActiveSheet()->mergeCells('A4:D4');
			$objPHPExcel->getActiveSheet()->getStyle('A6:B8')->applyFromArray($style_array);	
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
        
        public function importlophoc()
        {

            $giatri=array();
            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
            $objPHPExcel = PHPExcel_IOFactory::load($_FILES['importhoso']['tmp_name']);

            $lophoc = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true,true);
            $k=7;
            while(!empty($lophoc[$k]['A'])){

				// pr($tunglophoc);
                $checklop = $this->Mquanlylophoc->checklop($lophoc[$k]['B']);
                if(!($checklop)){
                    // insert lop moi
                    $lop = array(
                        'PK_sMaLop'      => time().$lophoc[$k]['B'],
                        'sTenLop'      => $lophoc[$k]['B']
                    );
                    $insertlop = $this->Mquanlylophoc->insertlop($lop);
                }
				
                $k++;
            }
            setMessages("success", "Cập nhật thành công", "Cập nhật thành công");
            redirect('quanlylophoc');
        }

    }
?>