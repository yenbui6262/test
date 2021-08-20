<?php
	class Mword extends My_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function getThongtincoban($masv, $madk){
            
            $this->db->select("*")
                    ->where("PK_sMaTK", $masv)
                    ->where("dkd.PK_sMaDangKy", $madk)
                    ->join("tbl_dangkydon dkd", "FK_sMaSV = PK_sMaTK")
                    ->join("tbl_hososv", "FK_sMaTK = PK_sMaTK")
                    ->join("tbl_lop", "PK_sMaLop = sFK_Lop");
            $res = $this->db->get("tbl_taikhoan")->row_array();
            return $res;
        }
    }
?>