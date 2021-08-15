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
            $this->db->update('tbl_taikhoan');
            return $this->db->affected_rows();
	    }
        public function xoacanbolop($matk){
            $this->db->set('sChucvu', '');
			$this->db->where('PK_sMaTK',$matk);
            $this->db->update('tbl_taikhoan');
            return $this->db->affected_rows();
	    }
        public function gettaikhoan($matk)
        {
			$this->db->where('PK_sMaTK',$matk);
            $this->db->select("FK_sMaQuyen,sChucvu");
            return $this->db->get("tbl_taikhoan")->result_array();
        }

        public function getListuutien(){
			$res=$this->db->get("dm_uutien")->result_array();
			return $res;
		}
		

		public function getListtinh(){
			$res=$this->db->get("dm_tinh")->result_array();
			return $res;
		}
		
		public function getListhuyen($matinh){
			$this->db->where('FK_sMaT',$matinh);
			$res=$this->db->get("dm_huyen")->result_array();
			return $res;
		}
		public function getListxa($mahuyen){
			$this->db->where('FK_sMaH',$mahuyen);
			$res=$this->db->get("dm_xa")->result_array();
			return $res;
		}
		public function gethuyen_theotinh($matinh){
			$this->db->where('FK_sMaT',$matinh);
			$res=$this->db->get("dm_huyen")->result_array();
			return $res;
	    }
        public function getxa_theohuyen($mahuyen){
			$this->db->where('FK_sMaH',$mahuyen);
			$res=$this->db->get("dm_xa")->result_array();
			return $res;
	    }

        public function getlop(){
            $res = $this->db->select('*')
                        ->get('tbl_lop')->result_array();
            return $res;
        }

        public function getExcel($dieukien)
        {
            $this->dieukien($dieukien);
            $this->db->group_by("tk.PK_sMaTK")
                    ->select("lop.sTenLop,tk.PK_sMaTK,tk.sHoTen,tk.dNgaySinh,tk.sChucvu,tk.iGioiTinh,tk.sTenTK,tk.FK_sMaQuyen,hs.tChiTietTT,hs.tChiTietHT,t.sTenT as tinhht,h.sTenH as huyenht,x.sTenX as xaht,tt.sTenT as tinhtt,hh.sTenH as huyentt,xx.sTenX as xatt")
                    ->join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                    ->join("tbl_hososv hs", "hs.FK_sMaTK = tk.PK_sMaTK")
                    ->join("dm_tinh t", "t.PK_sMaT = hs.FK_sMaTinhHT")
                    ->join("dm_huyen h", "h.PK_sMaH = hs.FK_sMaHuyenHT")
                    ->join("dm_xa x", "x.PK_sMaX = hs.FK_sMaXaHT")
                    ->join("dm_tinh tt", "tt.PK_sMaT = hs.FK_sMaTinhTT")
                    ->join("dm_huyen hh", "hh.PK_sMaH = hs.FK_sMaHuyenTT")
                    ->join("dm_xa xx", "xx.PK_sMaX = hs.FK_sMaXaTT");
            return $this->db->get("tbl_taikhoan tk")->result_array();
        }
        
        public function getlistsinhvien($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $this->db->group_by("tk.PK_sMaTK")
                     ->select("lop.sTenLop,tk.PK_sMaTK,tk.sHoTen,tk.dNgaySinh,tk.sChucvu,tk.iGioiTinh,tk.sTenTK,tk.FK_sMaQuyen,hs.tChiTietTT,hs.tChiTietHT,t.sTenT as tinhht,h.sTenH as huyenht,x.sTenX as xaht,tt.sTenT as tinhtt,hh.sTenH as huyentt,xx.sTenX as xatt")
                     ->join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                     ->join("tbl_hososv hs", "hs.FK_sMaTK = tk.PK_sMaTK")
                     ->join("dm_tinh t", "t.PK_sMaT = hs.FK_sMaTinhHT")
                     ->join("dm_huyen h", "h.PK_sMaH = hs.FK_sMaHuyenHT")
                     ->join("dm_xa x", "x.PK_sMaX = hs.FK_sMaXaHT")
                     ->join("dm_tinh tt", "tt.PK_sMaT = hs.FK_sMaTinhTT")
                     ->join("dm_huyen hh", "hh.PK_sMaH = hs.FK_sMaHuyenTT")
                     ->join("dm_xa xx", "xx.PK_sMaX = hs.FK_sMaXaTT")
                     ->limit($limit, $start);
            return $this->db->get("tbl_taikhoan tk")->result_array();
        }

        public function getTotalsinhvien($dieukien=null)
        {
            $this->dieukien($dieukien);
            $res = $this->db->group_by("tk.PK_sMaTK")
                            ->select("tk.PK_sMaTK, tk.sHoTen, lop.sTenLop")
                            ->join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                            ->join("tbl_hososv hs", "hs.FK_sMaTK = tk.PK_sMaTK")
                            ->from("tbl_taikhoan tk")->count_all_results();
            return $res;
        }

        private function dieukien($dieukien=null){

            if(!empty($dieukien['lop'])&&$dieukien['lop']!='tatca'){
                $this->db->where('lop.sTenLop', $dieukien['lop']);
            }
            if(!empty($dieukien['ngaysinh'])){
                $this->db->where('year(tk.dNgaySinh)', $dieukien['ngaysinh']);
            }
            if(!empty($dieukien['gioitinh'])&&$dieukien['gioitinh']!='tatca'){
                $this->db->where('tk.iGioiTinh', $dieukien['gioitinh']);
            }
            if(!empty($dieukien['uutien'])&&$dieukien['uutien']!='tatca'){
                $this->db->where('hs.FK_sUuTien', $dieukien['uutien']);
            }
            if(!empty($dieukien['chucvu'])&&$dieukien['chucvu']!='tatca'){
                if($dieukien['chucvu']=='canbolop'){
                    $this->db->where('tk.sChucvu !=', '');
                }else{
                    $this->db->where('tk.sChucvu', 'Cán bộ LCĐ, LCH');
                }
            }
            // địa chỉ
            if(!empty($dieukien['tinhtt'])){
                $this->db->where('hs.FK_sMaTinhTT', $dieukien['tinhtt']);
            }
            if(!empty($dieukien['huyentt'])){
                $this->db->where('hs.FK_sMaHuyenTT', $dieukien['huyentt']);
            }
            if(!empty($dieukien['xatt'])){
                $this->db->where('hs.FK_sMaXaTT', $dieukien['xatt']);
            }
            if(!empty($dieukien['tinhht'])){
                $this->db->where('hs.FK_sMaTinhHT', $dieukien['tinhht']);
            }
            if(!empty($dieukien['huyenht'])){
                $this->db->where('hs.FK_sMaHuyenHT', $dieukien['huyenht']);
            }
            if(!empty($dieukien['xaht'])){
                $this->db->where('hs.FK_sMaXaHT', $dieukien['xaht']);
            }
        }
        public function checktaikhoan($dieukien){
            $this->db->where('FK_sMaTK', $dieukien['FK_sMaTK']);
            $this->db->from('tbl_hososv');
            $res = $this->db->get()->num_rows();
            return $res;
        }
        public function inserthoso($data){
            $this->db->insert_batch('tbl_hososv',$data);
            return $this->db->affected_rows();
        }
    }
?>
