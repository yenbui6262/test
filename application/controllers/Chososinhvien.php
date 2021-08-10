<?php
    class Chososinhvien extends MY_Controller {
        public function __construct() {
	    	parent::__construct();
	    	$this->load->model('Mhososinhvien');
	    }
        public function index(){
            
        $session = $this->session->userdata("user");
        // pr($session);
        $email      =$this->input->post("email");
        $sdt        =$this->input->post("sdt");
        $stk        =$this->input->post("stk");
        $chinhanh   =$this->input->post("chinhanh");
        $tinhtt     =$this->input->post("tinhtt");
        $huyentt    =$this->input->post("huyentt");
        $xatt       =$this->input->post("xatt");
        $chitiettt  =$this->input->post("chitiettt");
        $tinhht     =$this->input->post("tinhht");
        $huyenht    =$this->input->post("huyenht");
        $xaht       =$this->input->post("xaht");
        $chitietht  =$this->input->post("chitietht");
        $matk       =$session['taikhoan'];
        $Temail['tEmail']  = $email;

        $data= array(
            'sSDT'          =>$sdt,
            'sSTK'          =>$stk,
            'sChiNhanh'     =>$chinhanh,
            'FK_sMaTinhTT'  => $tinhtt,
            'FK_sMaHuyenTT' =>$huyentt,
            'FK_sMaXaTT'    =>$xatt,
            'tChiTietTT'    =>$chitiettt,
            'FK_sMaTinhHT'  =>$tinhht,
            'FK_sMaHuyenHT' =>$huyenht,
            'FK_sMaXaHT'    =>$xaht,
            'tChiTietHT'    =>$chitietht,
        );
        
        //ajax
        if($action = $this->input->post("action")){
            switch($action){
                case "insert":
                    $this->insertTT($data);
                    break;
                case "update":
                    $this->updateTT($matk, $data, $Temail);
                    break;
                case "gethuyen":
                    $matinh = $this->input->post("matinh");
                    $res=$this->Mhososinhvien->gethuyen_theotinh($matinh);
                    echo json_encode($res);
                    break;
                case "getxa":
                    $mahuyen = $this->input->post("mahuyen");
                    $res=$this->Mhososinhvien->getxa_theohuyen($mahuyen);
                    echo json_encode($res);
                    break;
            }
            return;
        }
        $sinhvien['hoso'] 	= $this->Mhososinhvien->getHoso($session['taikhoan']);
        $sinhvien['lop'] 	= $this->Mhososinhvien->getLop();

                //lấy mã tỉnh mà sinh vien đã cập nhật trước đó
        $tinhtt	= $this->Mhososinhvien->gettinhtt($session['taikhoan']);
        $tinhht	= $this->Mhososinhvien->gettinhht($session['taikhoan']);

                //lấy mã huyện mà sinh vien đã cập nhật trước đó
        $huyentt 	= $this->Mhososinhvien->gethuyentt($session['taikhoan']);
        $huyenht 	= $this->Mhososinhvien->gethuyenht($session['taikhoan']);
        
        $tinh_list	    = $this->Mhososinhvien->getListtinh();

                // Lấy danh sách huyện theo mã tỉnh trong hồ sơ
        $huyentt_list 	= $this->Mhososinhvien->getListhuyen($tinhtt);      
        $huyenht_list 	= $this->Mhososinhvien->getListhuyen($tinhht);  
            
                // Lấy danh sách xã theo mã huyện trong hồ sơ
        $xatt_list 	    = $this->Mhososinhvien->getListxa($huyentt);
        $xaht_list	    = $this->Mhososinhvien->getListxa($huyenht);

        $temp = array(
            'template'  => 'Vhososinhvien',
            'data'     	=> array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'sinhvien'  => $sinhvien,
                'tinh'      => $tinh_list,
                'huyentt'   => $huyentt_list,
                'xatt'      => $xatt_list,
                'huyenht'   => $huyenht_list,
                'xaht'      => $xaht_list,
            ),
        );
        
        // pr($temp);
        $this->load->view('layout/VContent',$temp);
	    }
        public function insertTT($data){
            $session = $this->session->userdata("user");
            $data['PK_sMaHoSo'] = time().$session['taikhoan'];
            
            // pr($data);exit();
            $res = $this->Mhososinhvien->insertTT($data);
            if($res > 0){
                setMessages("success", "Cập nhật thành công");
                return redirect(current_url());
            }
            setMessages("danger", "Cập nhật thất bại");
            return redirect(current_url());
        }
        public function updateTT($matk,$data, $Temail){
            // pr($data);exit();
            $res1 = $this->Mhososinhvien->updateEmail($matk, $Temail);
            $res2 = $this->Mhososinhvien->updateTT($matk, $data);
            if($res1 > 0 || $res2 > 0){
                setMessages("success", "Cập nhật thành công");
                return redirect(current_url());
            }
            setMessages("danger", "Cập nhật thất bại");
            return redirect(current_url());
                
        }
    }
?>