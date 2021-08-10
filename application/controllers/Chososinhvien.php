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
        if($action = $this->input->post("action")){
            switch($action){
                case "insert":
                    $this->insertTT($data);
                    break;
                case "update":
                    $this->updateTT($matk, $data, $Temail);
                    break;
                case "gethuyen":
                    $this->getHuyen();
                    break;
                case "getxa":
                    $this->getxa();
                    break;
            }
            return;
        }
        $sinhvien['thongtincoban'] 	= $this->Mhososinhvien->getThongtincoban($session['taikhoan']);
        $sinhvien['hoso'] 	= $this->Mhososinhvien->getHoso($session['taikhoan']);
        $sinhvien['lop'] 	= $this->Mhososinhvien->getLop();
        $tinh	= $this->Mhososinhvien->gettinh();
        $huyen 	= $this->Mhososinhvien->gethuyen();
        $xa 	= $this->Mhososinhvien->getxa();

       
        $temp = array(
            'template'  => 'Vhososinhvien',
            'data'     	=> array(
                'session'	=> $session,
                'message' 	=> getMessages(),
                'sinhvien'  => $sinhvien,
                'tinh'      => $tinh,
                'huyen'     => $huyen,
                'xa'        => $xa,
            ),
        );
        
        // pr($temp);
        $this->load->view('layout/VContent',$temp);
	    }
        public function insertTT($data){
            $session = $this->session->userdata("user");
            $matk       =$session['taikhoan'];
            $data['FK_sMaTK']     = $matk;
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
        private function gethuyen(){
	    	$matinh = $this->input->post("matinh");
			$this->db->where('FK_sMaT',$matinh);
			$res=$this->db->get("dm_huyen")->result_array();
			echo json_encode($res);
	    }
        private function getxa(){
	    	$mahuyen = $this->input->post("mahuyen");
			$this->db->where('FK_sMaH',$mahuyen);
			$res=$this->db->get("dm_xa")->result_array();
			echo json_encode($res);
	    }
    }
?>