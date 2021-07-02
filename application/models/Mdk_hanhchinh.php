<?php 
class Mdk_hanhchinh extends My_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getHanhchinh(){
        $this->db->select("*")
                 ->order_by('PK_sMaHanhChinh');
        $res = $this->db->get("dm_hanhchinh")->result_array();
        return $res;
    }
    
    public function checkMahc($masv,$mahc){
        $this->db->where('FK_sMaSV',$masv)
                ->where('FK_sMaHanhChinh',$mahc);
        $res= $this->db->get("tbl_dangkydon")->result_array();
        return $res;
    }
    public function insertHanhchinh($donhc){
        $this->db->insert("tbl_dangkydon",$donhc);
        return $this->db->affected_rows();
    }
    public function deleteHanhchinh($mahc,$masv){
        $this->db->where('FK_sMaHanhChinh',$mahc)
                ->where('FK_sMaSV',$masv)
                 ->delete("tbl_dangkydon");
        return $this->db->affected_rows();
    }
}
?>