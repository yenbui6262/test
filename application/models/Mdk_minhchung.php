<?php 
class Mdk_minhchung extends My_Model
{
    public function __construct()
		{
			parent::__construct();
		}
        public function getTTcanhan($masv){
            $this->db->select("PK_sMaTK, sTrangThai")
                    ->where('PK_sMaTK',$masv);
            $res = $this->db->get("tbl_taikhoan")->row_array();
            return $res;
        }
        public function getChuongtrinh($date){
            
            // $this->db->select("*");
            $query =$this->db->query(" SELECT * FROM tbl_chuongtrinh
            WHERE dThoiGIanBD <= '$date' AND dThoiGIanKT >= '$date'
            ORDER BY 'PK_sMaChuongTrinh'");
            return $query->result_array();
        }
        
        public function getMinhchung($masv){
            $this->db->select("tbl_minhchung.*")
                    ->order_by("FK_sMaCT")
                    ->where('FK_sMaSV',$masv)
                    ->join("tbl_minhchung","FK_sMaCT=PK_sMaChuongTrinh");
            $res = $this->db->get("tbl_chuongtrinh")->result_array();
            return $res;
        }
        
}
?>