<?php
	class Mhososinhvien extends My_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function getThongtincoban($masv){
            
            $this->db->select("*")
                    ->where("PK_sMaTK", $masv)
                    ->join("tbl_lop", "PK_sMaLop = sFK_Lop");
            $res = $this->db->get("tbl_taikhoan")->row_array();
            return $res;
        }
		public function getDonhanhchinh(){
            
            $this->db->select("*");
            $res = $this->db->get("dm_hanhchinh")->result_array();
            return $res;
        }
		public function getChuongtrinh(){
            
            $this->db->select("*");
            $res = $this->db->get("tbl_chuongtrinh")->result_array();
            return $res;
        }
		public function getLink($masv){
            $this->db->select("*")
					->where("FK_sMaSV", $masv);
            $res = $this->db->get("tbl_minhchung")->result_array();
            return $res;
        }
	}