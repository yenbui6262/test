<?php 

	class Memail extends MY_Model {
		public function checkPass($taikhoan){
			$res = $this->db->where("PK_sMaTK", $taikhoan['taikhoan'])
							->where("sMatKhau", $taikhoan['sMatKhau'])
							->from("hs_tbl_taikhoan")
							->count_all_results();
			return $res;
		}

		public function changePass($newpass, $acc){
			$res = $this->db->where("PK_sMaTK", $acc)
							->set("sMatKhau", $newpass)
							->update("hs_tbl_taikhoan");
			return $res;
		}

		public function getsinhvienchuaxacnhan($mact)
        {
            $this->db->where('tg.sMaCT', $mact);
			$this->db->where('tg.iTrangThai', '1');
            $res = $this->db->select("tk.tEmail")
                        ->join("hs_tbl_taikhoan tk", "tg.sMaTK = tk.PK_sMaTK")
                        ->get("hs_tbl_thamgia tg")->result_array();
            return $res;
        }

		public function gettenct($mact)
        {
            $this->db->where('PK_sMaChuongTrinh', $mact);
            $res = $this->db->select("sTenCT,dThoiGianXN")
                        ->get("hs_tbl_chuongtrinh")->result_array();
            return $res;
        }

	}
?>