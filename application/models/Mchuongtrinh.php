<?php

    class Mchuongtrinh extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function getTotalRecord($dieukien){
            $this->dieukien($dieukien);
            $this->db->select("PK_sMaChuongTrinh")
                     ->from('tbl_chuongtrinh ct');
            $count = $this->db->count_all_results();
            return $count;
        }

        private function dieukien($dieukien=null){
            if(!empty($dieukien['tenct'])){
                $this->db->like('ct.sTenCT', $dieukien['tenct']);
            }
            if(!empty($dieukien['mota'])){
                $this->db->where('ct.tMota', $dieukien['mota']);
            }
            if(!empty($dieukien['thoigianbd'])){
                $this->db->where('ct.dThoiGIanBD >=', $dieukien['thoigianbd']);
            }
            if(!empty($dieukien['thoigiankt'])){
                $this->db->where('ct.dThoiGIanKT <=', $dieukien['thoigiankt']);
            }
            
        }

        public function getChuongtrinh($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $res = $this->db->order_by("dThoiGIanKT",'DESC')
                        ->order_by("sTenCT")
                        ->select("*")
                        ->limit($limit, $start)
                        ->get("tbl_chuongtrinh ct")->result_array();
            return $res;
        }

        public function getmacb($tencb)
        {
            $res = $this->db->select('PK_sMaTK')
                        ->get('tbl_taikhoan')->result_array();
            return $res;
        }

        public function deletechuongtrinh($Mact){
            $this->db->where('PK_sMaChuongTrinh', $Mact);
            $this->db->delete('tbl_chuongtrinh');
            return $this->db->affected_rows();
            
        }

        public function tatca($limit, $start,$dieukien){

            $this->dieukien($dieukien);
            $res = $this->db->group_by("ct.PK_sMaChuongTrinh")
                        ->select("ct.PK_sMaChuongTrinh,count('tk.PK_sMaTK') as tatca")
                        ->join("tbl_thamgia tg", "tg.sMaTK = tk.PK_sMaTK")
                        ->join("tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = tg.sMaCT")
                        ->limit($limit, $start)
                        ->get("tbl_taikhoan tk")->result_array();
            return $res;
        }
        public function khongthamgia($limit, $start,$dieukien){

            $this->dieukien($dieukien);
            $this->db->where('tg.iTrangThai', '3');
            $res = $this->db->group_by("ct.PK_sMaChuongTrinh")
                        ->select("ct.PK_sMaChuongTrinh,count('tk.PK_sMaTK') as khongthamgia")
                        ->join("tbl_thamgia tg", "tg.sMaTK = tk.PK_sMaTK")
                        ->join("tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = tg.sMaCT")
                        ->limit($limit, $start)
                        ->get("tbl_taikhoan tk")->result_array();
            return $res;
        }
        public function thamgia($limit, $start,$dieukien){

            $this->dieukien($dieukien);
            $this->db->where('tg.iTrangThai', '2');
            $res = $this->db->group_by("ct.PK_sMaChuongTrinh")
                        ->select("ct.PK_sMaChuongTrinh,count('tk.PK_sMaTK') as thamgia")
                        ->join("tbl_thamgia tg", "tg.sMaTK = tk.PK_sMaTK")
                        ->join("tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = tg.sMaCT")
                        ->limit($limit, $start)
                        ->get("tbl_taikhoan tk")->result_array();
            return $res;
        }

    }
?>
