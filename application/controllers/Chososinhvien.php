<?php
    class Chososinhvien extends MY_Controller {
        public function __construct() {
	    	parent::__construct();
	    	$this->load->model('Mhososinhvien');
	    }
        public function index(){
            
        $session = $this->session->userdata("user");
        // pr($session);
        $uutien  =$this->input->post("uutien");
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
        
        $data= array(
            'FK_sUuTien'    =>$uutien,
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
        $hotennt    =$this->input->post("hotenngthan");
        $sdtnt      =$this->input->post("sdtngthan");
        $quanhent   =$this->input->post("quanhe");
        $hotenct    =$this->input->post("hotenchutro");
        $sdtct      =$this->input->post("sdtchutro");
        $mahoso 	= $this->Mhososinhvien->getMahs($session['taikhoan']);

        $lienhe1 = array(
            'sHoTen'    =>$hotennt,
            'sSDT'      =>$sdtnt,
            'sQuanHe'   =>$quanhent,
        );
        $lienhe2 = array(
            'sHoTen'    => $hotenct,
            'sSDT'      =>$sdtct,
            'sQuanHe'   => "Chủ trọ",
        );
        //ajax
        if($action = $this->input->post("action")){
            switch($action){
                case "insert":
                    $this->insertTT($data,$lienhe1,$lienhe2);
                    break;
                case "update":
                    $this->updateTT($matk, $data, $lienhe1, $lienhe2);
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
        $sinhvien['thongtincanhan'] 	= $this->Mhososinhvien->getThongtincanhan($session['taikhoan']);
        $sinhvien['hoso'] 	= $this->Mhososinhvien->getHoso($session['taikhoan']);
        $sinhvien['lop'] 	= $this->Mhososinhvien->getLop();
        $sinhvien['uutien'] 	= $this->Mhososinhvien->getUutien();
        $sinhvien['lienhe'] = $this->Mhososinhvien->getLienhe($mahoso);
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
        // insert 
        public function insertTT($data,$lienhe1, $lienhe2){
            $session = $this->session->userdata("user");
            $Temail['tEmail']  = $this->input->post("email");
            $data['FK_sMaTK']=$session['taikhoan'];
            $data['PK_sMaHoSo'] = time().$session['taikhoan'];
            $res1 = $this->Mhososinhvien->insertTT($data);

            $lienhe1['FK_sMaHoSo'] = $data['PK_sMaHoSo'];
            $lienhe2['FK_sMaHoSo'] = $data['PK_sMaHoSo'];

            $lienhe1['PK_sMaDS']='A'.time().$session['taikhoan'];
            $lienhe2['PK_sMaDS']='B'.time().$session['taikhoan'];
            
            $res2 = $this->Mhososinhvien->insertLienhe($lienhe1);
            $res3 = $this->Mhososinhvien->insertLienhe($lienhe2);
            
            $this->Mhososinhvien->updateEmail($session['taikhoan'], $Temail);
            if($res1 > 0 || $res2 > 0 || $res3 > 0){
                setMessages("success", "Cập nhật thành công");
                return redirect(current_url());
            }
            setMessages("danger", "Cập nhật thất bại");
            return redirect(current_url());
        }
        public function updateTT($matk,$data, $lienhe1, $lienhe2){
            $session = $this->session->userdata("user");
            $Temail['tEmail']  = $this->input->post("email");
            $mads1 = $this->input->post("mads1");
            $mads2 = $this->input->post("mads2");
            
            $res1 = $this->Mhososinhvien->updateEmail($matk, $Temail);
            $res2 = $this->Mhososinhvien->updateTT($matk, $data);

            if( empty($this->input->post('mads1')) && empty($this->input->post('mads2'))){ //admin đã nhập hồ sơ nhưng chưa điền liên hệ
                $FK_sMaHoSo=$this->input->post("PKmahs");
                $lienhe1['FK_sMaHoSo'] = $FK_sMaHoSo;
                $lienhe2['FK_sMaHoSo'] = $FK_sMaHoSo;

                $lienhe1['PK_sMaDS']='A'.time().$session['taikhoan'];
                $lienhe2['PK_sMaDS']='B'.time().$session['taikhoan'];

                $res3 = $this->Mhososinhvien->insertLienhe($lienhe1);
                $res4 = $this->Mhososinhvien->insertLienhe($lienhe2);
            }
            else{
                $res3 = $this->Mhososinhvien->updateLienhe($mads1,$lienhe1);
                $res4 = $this->Mhososinhvien->updateLienhe($mads2, $lienhe2);
            }
            
            if($res1 > 0 || $res2 > 0 || $res3 > 0 || $res4 > 0){
                setMessages("success", "Cập nhật thành công");
                return redirect(current_url());
            }
            setMessages("danger", "Cập nhật thất bại");
            return redirect(current_url());
                
        }
    }
?>