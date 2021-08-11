<?php
	class Mhososinhvien extends My_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function getHoso($masv){
            
            $this->db->select("*")
                    ->where("PK_sMaTK", $masv)
					->join("tbl_lop", "PK_sMaLop = sFK_Lop")
                    ->join("tbl_hososv", "FK_sMaTK = PK_sMaTK");
            $res = $this->db->get("tbl_taikhoan")->row_array();
            return $res;
        }
		public function getLop(){
			$res=$this->db->get("tbl_lop")->result_array();
			return $res;
		}
		public function gettinhtt( $masv){
			$this->db->select("FK_sMaTinhTT")
					->join("tbl_hososv", "FK_sMaTK = PK_sMaTK")
                    ->where("PK_sMaTK", $masv);
            $res = $this->db->get("tbl_taikhoan")->row_array();
			return $res['FK_sMaTinhTT'];
		}
		public function gettinhht( $masv){
			$this->db->select("FK_sMaTinhHT")
					->join("tbl_hososv", "FK_sMaTK = PK_sMaTK")
                    ->where("PK_sMaTK", $masv);
            $res = $this->db->get("tbl_taikhoan")->row_array();
			return $res['FK_sMaTinhHT'];
		}
		public function gethuyentt( $masv){
			$this->db->select("FK_sMaHuyenTT")
					->join("tbl_hososv", "FK_sMaTK = PK_sMaTK")
                    ->where("PK_sMaTK", $masv);
            $res = $this->db->get("tbl_taikhoan")->row_array();
			return $res['FK_sMaHuyenTT'];
		}
		public function gethuyenht( $masv){
			$this->db->select("FK_sMahuyenHT")
					->join("tbl_hososv", "FK_sMaTK = PK_sMaTK")
                    ->where("PK_sMaTK", $masv);
            $res = $this->db->get("tbl_taikhoan")->row_array();
			return $res['FK_sMahuyenHT'];
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
        public function insertTT($data){
			$this->db->insert('tbl_hososv',$data);
            return $this->db->affected_rows();
		}
		public function updateTT($matk,$data){
			$this->db->where('FK_sMaTK',$matk);
			$this->db->update('tbl_hososv',$data);
            return $this->db->affected_rows();
		}
		public function updateEmail($matk,$data){
			$this->db->where('PK_sMaTK',$matk);
			$this->db->update('tbl_taikhoan',$data);
            return $this->db->affected_rows();
		}

	}
?>