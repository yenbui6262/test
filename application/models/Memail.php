<?php 

	class Memail extends MY_Model {
		public function checkPass($taikhoan){
			$res = $this->db->where("PK_sMaTK", $taikhoan['taikhoan'])
							->where("sMatKhau", $taikhoan['sMatKhau'])
							->from("tbl_taikhoan")
							->count_all_results();
			return $res;
		}

		public function changePass($newpass, $acc){
			$res = $this->db->where("PK_sMaTK", $acc)
							->set("sMatKhau", $newpass)
							->update("tbl_taikhoan");
			return $res;
		}

		public function getsinhvienduocthamgia($mact)
        {
            $this->db->where('tg.sMaCT', $mact);
			$this->db->where('tg.iTrangThai', '1');
            $res = $this->db->order_by("tk.sHoTen,tk.sTenTK")
                        ->select("tk.PK_sMaTK,tk.sHoTen,tk.sTenTK,tk.tEmail,lop.sTenLop")
                        ->join("tbl_thamgia tg", "tg.sMaTK = tk.PK_sMaTK")
                        ->get("tbl_taikhoan tk")->result_array();
            return $res;
        }

	}
?>