<?php

    class Mhanhchinh extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function getTotalRecord($dieukien){
            $this->dieukien($dieukien);
            $this->db->select("PK_sMaHanhChinh")
                     ->from('hs_dm_hanhchinh');
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
            
        }

        public function gethanhchinh($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $res = $this->db->order_by("sTenHanhChinh")
                        ->select("*")
                        ->limit($limit, $start)
                        ->get("hs_dm_hanhchinh")->result_array();
            return $res;
        }

        public function inserthanhchinh($data)
        {
            $this->db->insert('hs_dm_hanhchinh', $data);
            return $this->db->affected_rows();
        }

        public function deletehanhchinh($Mahc){
            $this->db->where('PK_sMaHanhChinh', $Mahc);
            $this->db->delete('hs_dm_hanhchinh');
            return $this->db->affected_rows();
            
        }
        public function deletedangkydon($Mahc){
            $this->db->where('FK_sMaHanhChinh', $Mahc);
            $this->db->delete('hs_tbl_dangkydon');
            return $this->db->affected_rows();
            
        }
        
        //cập nhật 
        public function updatehanhchinh($Mahc, $data)
        {
            $this->db->where('PK_sMaHanhChinh', $Mahc);
            $this->db->update('hs_dm_hanhchinh', $data);
            return $this->db->affected_rows();
        }
    }
?>
