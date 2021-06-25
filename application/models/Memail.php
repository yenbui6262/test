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

		
	}
?>