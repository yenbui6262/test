<?php 
class Mdk_hanhchinh extends My_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getTTcanhan($masv){
        $this->db->select("*")
                ->where('PK_sMaTK',$masv);
        $res = $this->db->get("tbl_taikhoan")->row_array();
        return $res;
    }
    public function getHanhchinh(){
        $this->db->select("*")
                 ->order_by('PK_sMaHanhChinh');
        $res = $this->db->get("dm_hanhchinh")->result_array();
        return $res;
    }
    public function getDon($masv){
        $this->db->select("PK_sMaHanhChinh,sTenHanhChinh,dk.FK_sMaHanhChinh,dk.FK_sMaSV")
                 ->order_by('PK_sMaHanhChinh')
                 ->where('FK_sMaSV',$masv)
                 ->join("tbl_dangkydon dk","FK_sMaHanhChinh=PK_sMaHanhChinh");
        $res = $this->db->get("dm_hanhchinh")->result_array();
        return $res;
    }
    public function insertHanhchinh($donhc){
        $this->db->insert("tbl_dangkydon",$donhc);
        return $this->db->affected_rows();
    }
    public function deleteHanhchinh($mahc){
        $this->db->where('FK_sMaHanhChinh',$mahc)
                 ->delete("tbl_dangkydon");
        return $this->db->affected_rows();
    }
}
?>