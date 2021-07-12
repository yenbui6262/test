<?php
	class Mword extends My_Model
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
    }
?>