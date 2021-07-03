<?php 
class Mdk_hanhchinh extends My_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getTotalRecord($dieukien,$masv){
        $this->dieukien($dieukien);
        $this->db->select("PK_sMaHanhChinh")
                ->where('FK_sMaSV',$masv)
                ->join('dm_hanhchinh',"FK_sMaHanhChinh=PK_sMaHanhChinh")
                 ->from('tbl_dangkydon');
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
        if(!empty($dieukien['trangthai'])&&$dieukien['trangthai']!='tatca'){
                $this->db->where('iTrangThai', $dieukien['trangthai']);
            }
        
    }
    public function getHanhchinh(){
        $this->db->select("*")
                 ->order_by('PK_sMaHanhChinh');
        $res = $this->db->get("dm_hanhchinh")->result_array();
        return $res;
    }
    
    
    public function getDon($limit, $start,$dieukien,$masv){
        $this->dieukien($dieukien);
        $this->db->select("*")
                ->where('FK_sMaSV',$masv)
                ->join('dm_hanhchinh',"FK_sMaHanhChinh=PK_sMaHanhChinh")
                ->order_by('PK_sMaHanhChinh')
                ->limit($limit, $start);
        $res= $this->db->get("tbl_dangkydon")->result_array();
        return $res;
    }
    public function insertHanhchinh($donhc){
        $this->db->insert("tbl_dangkydon",$donhc);
        return $this->db->affected_rows();
    }
    public function deleteHanhchinh($madk){
        $this->db->where('PK_sMaDangKy',$madk)
                 ->delete("tbl_dangkydon");
        return $this->db->affected_rows();
    }
    public function findDon($data)
        {
            $res = $this->db->where('FK_sMaHanhChinh',$data['FK_sMaHanhChinh'])
                    ->get('tbl_dangkydon')->result_array();
                    return count($res);
        }
}
?>