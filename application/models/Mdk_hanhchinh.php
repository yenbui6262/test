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
        $this->db->select("tbl_dangkydon.*")
                ->where('FK_sMaSV',$masv)
                ->join("tbl_dangkydon","PK_sMaHanhChinh=FK_sMaHanhChinh");
        $res = $this->db->get("dm_hanhchinh")->result_array();
        return $res;
    }
    public function getTrangthai($masv){
        $this->db->select("*")
                ->where('FK_sMaSV',$masv);
        $res = $this->db->get("tbl_dangkydon")->result_array();
        return $res;
    }
    public function checkMahc($mahc){
        $this->db->where('FK_sMaHanhChinh',$mahc);
        $res= $this->db->get("tbl_dangkydon")->result_array();
        return $res;
    }
}
?>