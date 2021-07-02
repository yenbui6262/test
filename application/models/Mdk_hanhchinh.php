<?php 
class Mdk_hanhchinh extends My_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getTotalRecord($dieukien){
        $this->dieukien($dieukien);
        $this->db->select("PK_sMaHanhChinh")
                 ->from('dm_hanhchinh');
        $count = $this->db->count_all_results();
        return $count;
    }
    private function dieukien($dieukien=null){
        if(!empty($dieukien['tenhc'])){
            $this->db->like('sTenHanhChinh', $dieukien['tenhc']);
        }
        if(!empty($dieukien['mota'])){
            $this->db->where('tMota', $dieukien['mota']);
        }
        // if(!empty($dieukien['trangthai'])){
        //     $this->db->where('dThoiGIanBD >=', $dieukien['thoigianbd']);
        // }
        
    }
    public function getHanhchinh($limit, $start,$dieukien){
        $this->dieukien($dieukien);
        $this->db->select("*")
                 ->order_by('PK_sMaHanhChinh')
                 ->limit($limit, $start);
        $res = $this->db->get("dm_hanhchinh")->result_array();
        return $res;
    }
    
    public function checkMahc($masv,$mahc){
        $this->db->where('FK_sMaSV',$masv)
                ->where('FK_sMaHanhChinh',$mahc)
                ->join('dm_hanhchinh',"FK_sMaHanhChinh=PK_sMaHanhChinh");
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