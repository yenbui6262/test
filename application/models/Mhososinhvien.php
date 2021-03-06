<?php
	class Mhososinhvien extends My_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function getThongtincanhan($masv){

            $this->db->select("*")
                    ->where("PK_sMaTK", $masv)
                    ->join("hs_tbl_lop", "PK_sMaLop = sFK_Lop","left");
            $res = $this->db->get("hs_tbl_taikhoan")->row_array();
            return $res;
        }
		
		public function getHoso($masv){
            
            $this->db->select("hs.PK_sMaHoSo,FK_sMaTinhTT, FK_sMaHuyenTT, FK_sMaXaTT, FK_sMaTinhHT, FK_sMaHuyenHT, FK_sMaXaHT, tChiTietTT, tChiTietHT, hs.sSDT, sSTK, sChiNhanh, ut.PK_sMaNhom")
                    ->where("tk.PK_sMaTK", $masv)
                    ->join("hs_tbl_hososv hs", "hs.FK_sMaTK = tk.PK_sMaTK", 'left')
					->join("hs_dm_uutien ut", "ut.PK_sMaNhom = hs.FK_sUuTien" , 'left');
			$res = $this->db->get("hs_tbl_taikhoan tk")->row_array();
            return $res;
        }
		public function getMahs( $masv){
			$this->db->select("hs.PK_sMaHoSo")
					->where("tk.PK_sMaTK", $masv)
					->join("hs_tbl_hososv hs", "hs.FK_sMaTK = tk.PK_sMaTK");
            $res = $this->db->get("hs_tbl_taikhoan tk")->row_array();
			return $res['PK_sMaHoSo'];
		}
		public function getLienhe($mahoso){
            
            $this->db->select("*")
                    ->where("FK_sMaHoSo", $mahoso);
			$res = $this->db->get("hs_tbl_lienhe")->result_array();
            return $res;
        }
		public function getLop(){
			$res=$this->db->get("hs_tbl_lop")->result_array();
			return $res;
		}
		public function getUutien(){
			$res=$this->db->get("hs_dm_uutien")->result_array();
			return $res;
		}
		public function gettinhtt( $masv){
			$this->db->select("FK_sMaTinhTT")
					->join("hs_tbl_hososv", "FK_sMaTK = PK_sMaTK")
                    ->where("PK_sMaTK", $masv);
            $res = $this->db->get("hs_tbl_taikhoan")->row_array();
			return $res['FK_sMaTinhTT'];
		}
		public function gettinhht( $masv){
			$this->db->select("FK_sMaTinhHT")
					->join("hs_tbl_hososv", "FK_sMaTK = PK_sMaTK")
                    ->where("PK_sMaTK", $masv);
            $res = $this->db->get("hs_tbl_taikhoan")->row_array();
			return $res['FK_sMaTinhHT'];
		}
		public function gethuyentt( $masv){
			$this->db->select("FK_sMaHuyenTT")
					->join("hs_tbl_hososv", "FK_sMaTK = PK_sMaTK")
                    ->where("PK_sMaTK", $masv);
            $res = $this->db->get("hs_tbl_taikhoan")->row_array();
			return $res['FK_sMaHuyenTT'];
		}
		public function gethuyenht( $masv){
			$this->db->select("FK_sMahuyenHT")
					->join("hs_tbl_hososv", "FK_sMaTK = PK_sMaTK")
                    ->where("PK_sMaTK", $masv);
            $res = $this->db->get("hs_tbl_taikhoan")->row_array();
			return $res['FK_sMahuyenHT'];
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
		public function insertLienhe($data){
			$this->db->insert('hs_tbl_lienhe',$data);
            return $this->db->affected_rows();
		}
		public function updateLienhe($mads,$data){
			$this->db->where('PK_sMaDS',$mads);
			$this->db->update('hs_tbl_lienhe',$data);
            return $this->db->affected_rows();
		}
        public function insertTT($data){
			$this->db->insert('hs_tbl_hososv',$data);
            return $this->db->affected_rows();
		}
		public function updateTT($matk,$data){
			$this->db->where('FK_sMaTK',$matk);
			$this->db->update('hs_tbl_hososv',$data);
            return $this->db->affected_rows();
		}
		public function updateEmail($matk,$data){
			$this->db->where('PK_sMaTK',$matk);
			$this->db->update('hs_tbl_taikhoan',$data);
            return $this->db->affected_rows();
		}

	}
?>