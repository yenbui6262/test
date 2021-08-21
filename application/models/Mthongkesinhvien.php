<?php

    class Mthongkesinhvien extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }


        public function capcanbolop($matk,$chucvu){
            $this->db->set('sChucvu', $chucvu);
			$this->db->where('PK_sMaTK',$matk);
            $this->db->update('hs_tbl_taikhoan');
            return $this->db->affected_rows();
	    }
        public function xoacanbolop($matk){
            $this->db->set('sChucvu', '');
			$this->db->where('PK_sMaTK',$matk);
            $this->db->update('hs_tbl_taikhoan');
            return $this->db->affected_rows();
	    }
        public function gettaikhoan($matk)
        {
			$this->db->where('PK_sMaTK',$matk);
            $this->db->select("FK_sMaQuyen,sChucvu");
            return $this->db->get("hs_tbl_taikhoan")->result_array();
        }

        public function getListuutien(){
			$res=$this->db->get("hs_dm_uutien")->result_array();
			return $res;
		}
		

		public function getListtinh(){
			$res=$this->db->get("hs_dm_tinh")->result_array();
			return $res;
		}
		
		public function getListhuyen($matinh){
			$this->db->where('FK_sMaT',$matinh);
			$res=$this->db->get("hs_dm_huyen")->result_array();
			return $res;
		}
		public function getListxa($mahuyen){
			$this->db->where('FK_sMaH',$mahuyen);
			$res=$this->db->get("hs_dm_xa")->result_array();
			return $res;
		}
		public function gethuyen_theotinh($matinh){
			$this->db->where('FK_sMaT',$matinh);
			$res=$this->db->get("hs_dm_huyen")->result_array();
			return $res;
	    }
        public function getxa_theohuyen($mahuyen){
			$this->db->where('FK_sMaH',$mahuyen);
			$res=$this->db->get("hs_dm_xa")->result_array();
			return $res;
	    }

        public function getlop(){
            $res = $this->db->select('*')
                        ->get('hs_tbl_lop')->result_array();
            return $res;
        }

        public function getExcel($dieukien)
        {
            $this->dieukien($dieukien);
            $this->db->where('tk.FK_sMaQuyen','2');
            $this->db->group_by("tk.PK_sMaTK")
                    ->select("lop.sTenLop,tk.PK_sMaTK,tk.sHoTen,tk.dNgaySinh,tk.sChucvu,tk.iGioiTinh,tk.sTenTK,tk.FK_sMaQuyen,hs.tChiTietTT,hs.tChiTietHT,t.sTenT as tinhht,h.sTenH as huyenht,x.sTenX as xaht,tt.sTenT as tinhtt,hh.sTenH as huyentt,xx.sTenX as xatt")
                    ->join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop","left")
                    ->join("hs_tbl_hososv hs", "hs.FK_sMaTK = tk.PK_sMaTK", 'left')
                    ->join("hs_dm_tinh t", "t.PK_sMaT = hs.FK_sMaTinhHT", 'left')
                    ->join("hs_dm_huyen h", "h.PK_sMaH = hs.FK_sMaHuyenHT", 'left')
                    ->join("hs_dm_xa x", "x.PK_sMaX = hs.FK_sMaXaHT", 'left')
                    ->join("hs_dm_tinh tt", "tt.PK_sMaT = hs.FK_sMaTinhTT", 'left')
                    ->join("hs_dm_huyen hh", "hh.PK_sMaH = hs.FK_sMaHuyenTT", 'left')
                    ->join("hs_dm_xa xx", "xx.PK_sMaX = hs.FK_sMaXaTT", 'left');
            return $this->db->get("hs_tbl_taikhoan tk")->result_array();
        }
        
        public function getlistsinhvien($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $this->db->where('tk.FK_sMaQuyen','2');
            $this->db->group_by("tk.PK_sMaTK")
                     ->select("lop.sTenLop,tk.PK_sMaTK,tk.sHoTen,tk.dNgaySinh,tk.sChucvu,tk.iGioiTinh,tk.sTenTK,tk.FK_sMaQuyen,hs.tChiTietTT,hs.tChiTietHT,t.sTenT as tinhht,h.sTenH as huyenht,x.sTenX as xaht,tt.sTenT as tinhtt,hh.sTenH as huyentt,xx.sTenX as xatt")
                     ->join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop","left")
                     ->join("hs_tbl_hososv hs", "hs.FK_sMaTK = tk.PK_sMaTK", 'left')
                     ->join("hs_dm_tinh t", "t.PK_sMaT = hs.FK_sMaTinhHT", 'left')
                     ->join("hs_dm_huyen h", "h.PK_sMaH = hs.FK_sMaHuyenHT", 'left')
                     ->join("hs_dm_xa x", "x.PK_sMaX = hs.FK_sMaXaHT", 'left')
                     ->join("hs_dm_tinh tt", "tt.PK_sMaT = hs.FK_sMaTinhTT", 'left')
                     ->join("hs_dm_huyen hh", "hh.PK_sMaH = hs.FK_sMaHuyenTT", 'left')
                     ->join("hs_dm_xa xx", "xx.PK_sMaX = hs.FK_sMaXaTT", 'left')
                     ->limit($limit, $start);
            return $this->db->get("hs_tbl_taikhoan tk")->result_array();
        }

        public function getTotalsinhvien($dieukien=null)
        {
            $this->dieukien($dieukien);
            $this->db->where('tk.FK_sMaQuyen','2');
            $res = $this->db->group_by("tk.PK_sMaTK")
                            ->select("tk.PK_sMaTK, tk.sHoTen, lop.sTenLop")
                            ->join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop","left")
                            ->join("hs_tbl_hososv hs", "hs.FK_sMaTK = tk.PK_sMaTK","left")
                            ->from("hs_tbl_taikhoan tk")->count_all_results();
            return $res;
        }

        private function dieukien($dieukien=null){

            if(isset($dieukien['lop'])&&$dieukien['lop']!='tatca'){
                $this->db->where('lop.sTenLop', $dieukien['lop']);
            }
            if(isset($dieukien['ngaysinh'])){
                $this->db->where('year(tk.dNgaySinh)', $dieukien['ngaysinh']);
            }
            if(isset($dieukien['gioitinh'])&&$dieukien['gioitinh']!='tatca'){
                $this->db->where('tk.iGioiTinh', $dieukien['gioitinh']);
            }
            if(isset($dieukien['uutien'])&&$dieukien['uutien']!='tatca'){
                $this->db->where('hs.FK_sUuTien', $dieukien['uutien']);
            }
            if(isset($dieukien['chucvu'])&&$dieukien['chucvu']!='tatca'){
                if($dieukien['chucvu']=='canbolop'){
                    $this->db->where('tk.sChucvu !=', '');
                }else{
                    $this->db->where('tk.sChucvu', 'Cán bộ LCĐ, LCH');
                }
            }
            // địa chỉ
            if(isset($dieukien['tinhtt'])){
                $this->db->where('hs.FK_sMaTinhTT', $dieukien['tinhtt']);
            }
            if(isset($dieukien['huyentt'])){
                $this->db->where('hs.FK_sMaHuyenTT', $dieukien['huyentt']);
            }
            if(isset($dieukien['xatt'])){
                $this->db->where('hs.FK_sMaXaTT', $dieukien['xatt']);
            }
            if(isset($dieukien['tinhht'])){
                $this->db->where('hs.FK_sMaTinhHT', $dieukien['tinhht']);
            }
            if(isset($dieukien['huyenht'])){
                $this->db->where('hs.FK_sMaHuyenHT', $dieukien['huyenht']);
            }
            if(isset($dieukien['xaht'])){
                $this->db->where('hs.FK_sMaXaHT', $dieukien['xaht']);
            }
        }
        public function checktaikhoan($tentk){
            $this->db->where('sTenTK', $tentk);
            $this->db->select('PK_sMaTK');
            $this->db->from('hs_tbl_taikhoan');
            $res = $this->db->get()->result_array();
            return $res;
        }
        public function checkhoso($dieukien){
            $this->db->where('FK_sMaTK', $dieukien['FK_sMaTK']);
            $this->db->from('hs_tbl_hososv');
            $res = $this->db->get()->num_rows();
            return $res;
        }
        public function inserthoso($data){
            $this->db->insert('hs_tbl_hososv',$data);
            return $this->db->affected_rows();
        }
        public function updatehoso($tunghoso,$data){
            $this->db->where($data);
            $this->db->update("hs_tbl_hososv", $tunghoso);
        }
    }
?>
