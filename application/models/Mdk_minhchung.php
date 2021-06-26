<?php 
class Mdk_minhchung extends My_Model
{
    public function __construct()
		{
			parent::__construct();
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
        public function updateMinhChung($id, $sTrangthai){
            $this->db->where("PK_sMaMC", $id);
            $this->db->update("tbl_minhchung", array('sTrangthai' => $sTrangthai));
        }
        
}
?>