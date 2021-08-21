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
            $this->db->where('mc.iTrangThai', '2');
            $res = $this->db-> select("mc.PK_sMaMC, tk.sHoTen, mc.tLink, lop.sTenLop")
                        -> join("hs_tbl_taikhoan tk", "tk.PK_sMaTK = mc.FK_sMaSV")
                        -> join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                        -> join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                        ->from("hs_tbl_minhchung mc")->count_all_results();
            return $res;
        }
        public function getminhchung($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $this->db->where('mc.iTrangThai', '2');
            $res = $this->db->order_by("mc.iTrangThaiCD")
                        ->order_by("mc.dTGduyet",'DESC')
                        -> select("mc.PK_sMaMC, tk.sHoTen, tk.dNgaySinh, tk.PK_sMaTK,lop.sTenLop, mc.tLink,mc.iTrangThai,mc.iTrangThaiCD,ct.dThoiGIanKT")
                        -> join("hs_tbl_taikhoan tk", "tk.PK_sMaTK = mc.FK_sMaSV")
                        -> join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                        -> join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                        ->limit($limit, $start)
                        ->get("hs_tbl_minhchung mc")->result_array();
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
            if(!empty($dieukien['filtermasv'])){
                $this->db->like('tk.PK_sMaTK', $dieukien['filtermasv']);
                pr($dieukien);
            }
            if(!empty($dieukien['filterhoten'])){
                $this->db->like('tk.sHoTen', $dieukien['filterhoten']);
            }
            if(!empty($dieukien['filterdob'])){
                $this->db->where('tk.dNgaySinh', $dieukien['filterdob']);
            }
            if(!empty($dieukien['filtertenct'])){
                $this->db->like('ct.sTenCT', $dieukien['filtertenct']);
            }
            if(!empty($dieukien['filterthoigianbd'])){
                $this->db->where('ct.dThoiGIanBD >=', $dieukien['filterthoigianbd']);
            }
            if(!empty($dieukien['filterthoigiankt'])){
                $this->db->where('ct.dThoiGIanKT >=', $dieukien['filterthoigiankt']);
            }

            
        }

        public function getlop(){
            $res = $this->db->select('*')
                        ->get('hs_tbl_lop')->result_array();
            return $res;
        }

        public function gettenct($dieukien){
            $this->db->where('PK_sMaChuongTrinh', $dieukien);
            $res = $this->db->select('sTenCT')
                        ->get('hs_tbl_chuongtrinh')->result_array();
            return $res;
        }
        public function gettenlop($dieukien){
            $this->db->where('PK_sMaLop', $dieukien);
            $res = $this->db->select('sTenLop')
                        ->get('hs_tbl_lop')->result_array();
            return $res;
        }
        public function gettensv($dieukien){
            $this->db->where('tk.PK_sMaTK', $dieukien);
            $this->db->group_by("tk.PK_sMaTK")
                     ->select("count('mc.FK_sMaCT') as sochuongtrinh,tk.PK_sMaTK, tk.sHoTen, lop.sTenLop")
                     ->join("hs_tbl_minhchung mc", "mc.FK_sMaSV = tk.PK_sMaTK")
                     ->join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                     ->join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop");
            return $this->db->get("hs_tbl_taikhoan tk")->result_array();
        }

        public function getsosinhvien($dieukien)
        {
            $this->db->where('PK_sMaLop', $dieukien);
            $res = $this->db->group_by("lop.PK_sMaLop")
                        -> select("lop.sTenLop,count(tk.PK_sMaTK) as sosinhvien")
                        -> join("hs_tbl_taikhoan tk", "tk.sFK_Lop = lop.PK_sMaLop")
                        -> get("hs_tbl_lop lop")->result_array();
            return $res;
        }
        public function getsosinhvienthamgia($dieukien)
        {
            $this->db->where('ct.PK_sMaChuongTrinh', $dieukien);
            $res = $this->db->group_by("ct.PK_sMaChuongTrinh")
                        -> select("count(mc.PK_sMaMC) as sosinhvien")
                        -> join("hs_tbl_minhchung mc", "mc.FK_sMaCT = ct.PK_sMaChuongTrinh")
                        -> get("hs_tbl_chuongtrinh ct")->result_array();
            return $res;
        }
        public function getsosinhvienthamgialop($mact,$malop)
        {
            $this->db->where('lop.PK_sMaLop', $malop);
            $this->db->where('ct.PK_sMaChuongTrinh', $mact);
            $res = $this->db->group_by("ct.PK_sMaChuongTrinh")
                        -> select("count(mc.PK_sMaMC) as sosinhvien")
                        -> join("hs_tbl_minhchung mc", "mc.FK_sMaCT = ct.PK_sMaChuongTrinh")
                        -> join("hs_tbl_taikhoan tk", "tk.PK_sMaTK = mc.FK_sMaSV")
                        -> join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                        -> get("hs_tbl_chuongtrinh ct")->result_array();
            return $res;
        }

        public function getlistsinhvien($limit, $start,$dieukien){
            $this->dieukien($dieukien);
            $this->db->where('mc.iTrangThai', '2');
            $this->db->order_by("mc.iTrangThaiCD")
                    ->order_by("mc.dTGduyet",'DESC')
                    ->group_by("ct.PK_sMaChuongTrinh")
                     ->select("ct.sTenCT,mc.tLink,ct.dThoiGIanBD,ct.dThoiGIanKT,mc.iTrangThai,mc.iTrangThaiCD,mc.PK_sMaMC")
                     ->join("hs_tbl_minhchung mc", "mc.FK_sMaSV = tk.PK_sMaTK")
                     ->join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                     ->limit($limit, $start);
            return $this->db->get("hs_tbl_taikhoan tk")->result_array();
        }
        public function getTotalsinhvien($dieukien=null){
            $this->dieukien($dieukien);
            $this->db->where('mc.iTrangThai', '2');
            $res = $this->db->group_by("ct.PK_sMaChuongTrinh")
                            ->select("ct.sTenCT,mc.tLink")
                            ->join("hs_tbl_minhchung mc", "mc.FK_sMaSV = tk.PK_sMaTK")
                            ->join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                            ->from("hs_tbl_taikhoan tk")->count_all_results();
            return $res;
        }

        public function updateminhchung($id, $iTrangthai,$macb,$now){
            $this->db->where("PK_sMaMC", $id);
            $this->db->update("hs_tbl_minhchung", array('iTrangThai' => $iTrangthai,'FK_sMaCB' => $macb,'dTGDuyet' => $now));
        }

        public function getsosinhviendaduyet($dieukien)
        {
            $this->db->where('PK_sMaLop', $dieukien);
            $this->db->where('iTrangThai', '2');
            $res = $this->db->group_by("ct.PK_sMaChuongTrinh")
                        -> select("count(mc.PK_sMaMC) as sosinhvien")
                        -> join("hs_tbl_minhchung mc", "mc.FK_sMaCT = ct.PK_sMaChuongTrinh")
                        -> get("hs_tbl_chuongtrinh ct")->result_array();
            return $res;
        }

        public function getchucvu($ma){
            $this->db->where('PK_sMaTK',$ma);
            $res = $this->db->select('sFK_lop')
                        ->get('hs_tbl_taikhoan')->result_array();
            return $res;
        }
    }
?>
