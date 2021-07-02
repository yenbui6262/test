<?php

    class Mds_minhchung extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function getTotalRecord($masv,$dieukien){
            $this->dieukien($dieukien);
            $res = $this->db-> select("PK_sMaChuongTrinh")
                        ->join("tbl_chuongtrinh","FK_sMaCT=PK_sMaChuongTrinh")
                        ->where('FK_sMaSV ', $masv)
                        ->from('tbl_minhchung');
            $count = $this->db->count_all_results();
            return $count;
        }

        private function dieukien($dieukien=null){
            if(!empty($dieukien['tenct'])){
                $this->db->like('sTenCT', $dieukien['tenct']);
            }
            if(!empty($dieukien['mota'])){
                $this->db->where('tMota', $dieukien['mota']);
            }
            if(!empty($dieukien['thoigianbd'])){
                $this->db->where('dThoiGIanBD >=', $dieukien['thoigianbd']);
            }
            if(!empty($dieukien['thoigiankt'])){
                $this->db->where('dThoiGIanKT <=', $dieukien['thoigiankt']);
            }
            
        }

        public function getChuongtrinh($limit, $start,$masv,$dieukien)
        {
            $this->dieukien($dieukien);
            $res = $this->db-> select("*")
                        ->join("tbl_chuongtrinh","FK_sMaCT=PK_sMaChuongTrinh")
                        ->where('FK_sMaSV ', $masv)
                        ->limit($limit, $start)
                        ->get("tbl_minhchung")->result_array();
            return $res;
        }

    }
?>
