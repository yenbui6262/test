<?php 
class Mdk_minhchung extends My_Model
{
    public function __construct()
		{
			parent::__construct();
		}
        public function getTTcanhan($masv){
            $this->db->select("*");
            $res = $this->db->get("tbl_taikhoan")->row_array();
            return $res;
        }
        public function getChuongtrinh($date){
            
            // $this->db->select("*");
            $query =$this->db->query(" SELECT * FROM tbl_chuongtrinh
            WHERE dThoiGIanBD <= '$date' AND dThoiGIanKT >= '$date'");
            return $query->result_array();
        }
        
		public function getLink($masv, $maCT){
            $this->db->select("*")
                    ->where("FK_sMaCT", $maCT)
					->where("FK_sMaSV", $masv);
            $res = $this->db->get("tbl_minhchung")->result_array();
            return $res;
        }
        public function updateMinhChung($id, $sTrangthai){
            $this->db->where("PK_sMaMC", $id);
            $this->db->update("tbl_minhchung", array('sTrangthai' => $sTrangthai));
        }
        
}
?>