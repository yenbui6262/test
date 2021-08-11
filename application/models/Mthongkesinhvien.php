<?php

    class Mthongkesinhvien extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
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
        
        public function getlistsinhvien($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $this->db->group_by("tk.PK_sMaTK")
                     ->select("*")
                     ->join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                     ->join("tbl_hososv hs", "hs.FK_sMaTK = tk.PK_sMaTK")
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
    }
?>
