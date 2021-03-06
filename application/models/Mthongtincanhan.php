<?php
	class Mthongtincanhan extends My_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function getThongtincoban($masv){
            
            $this->db->select("*")
                    ->where("PK_sMaTK", $masv)
                    ->join("hs_tbl_lop", "PK_sMaLop = sFK_Lop");
            $res = $this->db->get("hs_tbl_taikhoan")->row_array();
            return $res;
        }
		public function getLop(){
			$res=$this->db->get("hs_tbl_lop")->result_array();
			return $res;
		}
        public function capnhat($acc, $data){
            $this->db->where("PK_sMaTK", $acc)
                     ->update('hs_tbl_taikhoan', $data);
                            
            return $this->db->affected_rows();
        }
		public function checkPass($oldPass, $acc  ){
			$this->db->where("PK_sMaTK", $acc)
					 ->where("sMatKhau", $oldPass);
							
			return $this->db->count_all_results('hs_tbl_taikhoan');
		}

	}