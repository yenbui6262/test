<?php

    class Mthongkeminhchung extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function getTotalRecord($dieukien){
            $this->dieukien($dieukien);
            $res = $this->db->group_by("lop.PK_sMaLop,ct.PK_sMaChuongTrinh")
                        ->order_by("lop.PK_sMaLop,ct.PK_sMaChuongTrinh")
                        -> select("lop.sTenLop, ct.sTenCT,count(mc.PK_sMaMC) as sominhchung")
                        -> join("tbl_taikhoan tk", "tk.PK_sMaTK = mc.FK_sMaSV")
                        -> join("tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                        -> join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                        ->from("tbl_minhchung mc")->count_all_results();
            return $res;
        }

        private function dieukien($dieukien=null){
            if(!empty($dieukien['tenct'])&&$dieukien['tenct']!='tatca'){
                $this->db->like('ct.sTenCT', $dieukien['tenct']);
            }
            
            if(!empty($dieukien['lop'])&&$dieukien['lop']!='tatca'){
                $this->db->where('lop.sTenLop', $dieukien['lop']);
            }
           
            
        }

        public function getminhchung($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $res = $this->db->group_by("lop.PK_sMaLop,ct.PK_sMaChuongTrinh")
                        ->order_by("lop.PK_sMaLop,ct.PK_sMaChuongTrinh")
                        -> select("lop.sTenLop, ct.sTenCT,count(mc.PK_sMaMC) as sominhchung")
                        -> join("tbl_taikhoan tk", "tk.PK_sMaTK = mc.FK_sMaSV")
                        -> join("tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                        -> join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                        ->limit($limit, $start)
                        ->get("tbl_minhchung mc")->result_array();
            return $res;
        }

        public function getlop(){
            $res = $this->db->select('*')
                        ->get('tbl_lop')->result_array();
            return $res;
        }
        public function getchuongtrinh(){
            $res = $this->db->select('sTenCT')
                        ->get('tbl_chuongtrinh')->result_array();
            return $res;
        }

        public function deleteminhchung($Mamc){
            $this->db->where('PK_sMaMC', $Mamc);
            $this->db->delete('tbl_minhchung');
            return $this->db->affected_rows();
            
        }
        
    }
?>
