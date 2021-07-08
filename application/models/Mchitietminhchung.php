<?php

    class Mchitietminhchung extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function getTotalRecord($dieukien){
            $this->dieukien($dieukien);
            $res = $this->db->order_by("mc.PK_sMaMC")
                        -> select("mc.PK_sMaMC, tk.sHoTen, mc.tLink, lop.sTenLop")
                        -> join("tbl_taikhoan tk", "tk.PK_sMaTK = mc.FK_sMaSV")
                        -> join("tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                        -> join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                        ->from("tbl_minhchung mc")->count_all_results();
            return $res;
        }
        public function getminhchung($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $res = $this->db->order_by("mc.PK_sMaMC")
                        -> select("mc.PK_sMaMC, tk.sHoTen, tk.dNgaySinh, tk.PK_sMaTK,lop.sTenLop, mc.tLink")
                        -> join("tbl_taikhoan tk", "tk.PK_sMaTK = mc.FK_sMaSV")
                        -> join("tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                        -> join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                        ->limit($limit, $start)
                        ->get("tbl_minhchung mc")->result_array();
            return $res;
        }

        private function dieukien($dieukien=null){
            if(!empty($dieukien['tenct'])){
                $this->db->like('ct.sTenCT', $dieukien['tenct']);
            }
            if(!empty($dieukien['hoten'])){
                $this->db->like('tk.sHoTen', $dieukien['hoten']);
            }
            if(!empty($dieukien['lop'])){
                $this->db->where('lop.sTenLop', $dieukien['lop']);
            }
            if(!empty($dieukien['mact'])){
                $this->db->where('ct.PK_sMaChuongTrinh', $dieukien['mact']);
            }
            if(!empty($dieukien['masv'])){
                $this->db->where('tk.PK_sMaTK', $dieukien['masv']);
            }
            
        }

        public function getlop(){
            $res = $this->db->select('*')
                        ->get('tbl_lop')->result_array();
            return $res;
        }

        public function gettenct($dieukien){
            $this->db->where('PK_sMaChuongTrinh', $dieukien);
            $res = $this->db->select('sTenCT')
                        ->get('tbl_chuongtrinh')->result_array();
            return $res;
        }
        public function gettenlop($dieukien){
            $this->db->where('PK_sMaLop', $dieukien);
            $res = $this->db->select('sTenLop')
                        ->get('tbl_lop')->result_array();
            return $res;
        }
        public function gettensv($dieukien){
            $this->db->where('tk.PK_sMaTK', $dieukien);
            $this->db->group_by("tk.PK_sMaTK")
                     ->select("count('mc.FK_sMaCT') as sochuongtrinh,tk.PK_sMaTK, tk.sHoTen, lop.sTenLop")
                     ->join("tbl_minhchung mc", "mc.FK_sMaSV = tk.PK_sMaTK")
                     ->join("tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                     ->join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop");
            return $this->db->get("tbl_taikhoan tk")->result_array();
        }

        public function getsosinhvien($dieukien)
        {
            $this->db->where('PK_sMaLop', $dieukien);
            $res = $this->db->group_by("lop.PK_sMaLop")
                        -> select("lop.sTenLop,count(tk.PK_sMaTK) as sosinhvien")
                        -> join("tbl_taikhoan tk", "tk.sFK_Lop = lop.PK_sMaLop")
                        -> get("tbl_lop lop")->result_array();
            return $res;
        }
        public function getsosinhvienthamgia($dieukien)
        {
            $this->db->where('ct.PK_sMaChuongTrinh', $dieukien);
            $res = $this->db->group_by("ct.PK_sMaChuongTrinh")
                        -> select("count(mc.PK_sMaMC) as sosinhvien")
                        -> join("tbl_minhchung mc", "mc.FK_sMaCT = ct.PK_sMaChuongTrinh")
                        -> get("tbl_chuongtrinh ct")->result_array();
            return $res;
        }
        public function getsosinhvienthamgialop($mact,$malop)
        {
            $this->db->where('lop.PK_sMaLop', $malop);
            $this->db->where('ct.PK_sMaChuongTrinh', $mact);
            $res = $this->db->group_by("ct.PK_sMaChuongTrinh")
                        -> select("count(mc.PK_sMaMC) as sosinhvien")
                        -> join("tbl_minhchung mc", "mc.FK_sMaCT = ct.PK_sMaChuongTrinh")
                        -> join("tbl_taikhoan tk", "tk.PK_sMaTK = mc.FK_sMaSV")
                        -> join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                        -> get("tbl_chuongtrinh ct")->result_array();
            return $res;
        }

        public function getlistsinhvien($limit, $start,$dieukien){
            $this->dieukien($dieukien);
            $this->db->group_by("ct.PK_sMaChuongTrinh")
                     ->select("ct.sTenCT,mc.tLink")
                     ->join("tbl_minhchung mc", "mc.FK_sMaSV = tk.PK_sMaTK")
                     ->join("tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                     ->limit($limit, $start);
            return $this->db->get("tbl_taikhoan tk")->result_array();
        }
        public function getTotalsinhvien($dieukien=null){
            $this->dieukien($dieukien);
            $res = $this->db->group_by("ct.PK_sMaChuongTrinh")
                            ->select("ct.sTenCT,mc.tLink")
                            ->join("tbl_minhchung mc", "mc.FK_sMaSV = tk.PK_sMaTK")
                            ->join("tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                            ->from("tbl_taikhoan tk")->count_all_results();
            return $res;
        }
    }
?>