<?php 
class Mdk_minhchung extends My_Model
{
    public function __construct()
		{
			parent::__construct();
		}
        
        public function getChuongtrinh($date){
            
            $this->db->select("*")
                    ->where('dThoiGIanBD <=', $date)
                    ->where('dThoiGIanKT >=', $date)
                    ->order_by("PK_sMaChuongTrinh asc");
            $res = $this->db->get("tbl_chuongtrinh")->result_array();
            return $res;
        }
        public function dieukien($masv,$mact,$date){
            $this->db->select("*")
                    ->join("tbl_chuongtrinh","FK_sMaCT=PK_sMaChuongTrinh")
                    ->where('dThoiGIanBD <=', $date)
                    ->where('dThoiGIanKT >=', $date)
                    ->where('FK_sMaSV ', $masv)
                    ->where('PK_sMaChuongTrinh ', $mact)
                    ->order_by("PK_sMaChuongTrinh asc");
            
            $res = $this->db->get("tbl_minhchung")->result_array();
            return $res;
        }
        public function insertMinhchung($masv,$minhchung){
            $this->db->where('FK_sMaSV',$masv);
            $res =$this->db->insert("tbl_minhchung",$minhchung);
            return $this->db->affected_rows();
        }
        public function updateMinhchung($mamc,$duongdan){
            $this->db->where('PK_sMaMC',$mamc);
            $this->db->set('tLink',$duongdan);
			$this->db->update("tbl_minhchung");
            
            return $this->db->affected_rows();
        } 
        
}
?>