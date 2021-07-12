<?php

    class Mquanlyminhchung extends MY_Model
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

        private function dieukien($dieukien=null){
            if(!empty($dieukien['tenct'])&&$dieukien['tenct']!='tatca'){
                $this->db->where('ct.sTenCT', $dieukien['tenct']);
            }
            if(!empty($dieukien['hoten'])){
                $this->db->like('tk.sHoTen', $dieukien['hoten']);
            }
            if(!empty($dieukien['lop'])&&$dieukien['lop']!='tatca'){
                $this->db->where('lop.sTenLop', $dieukien['lop']);
            }
            if(!empty($dieukien['masv'])){
                $this->db->like('tk.PK_sMaTK', $dieukien['masv']);
            }
            if(!empty($dieukien['trangthai'])&&$dieukien['trangthai']!='tatca'){
                $this->db->where('mc.iTrangThai', $dieukien['trangthai']);
            }
            if(!empty($dieukien['tinhtrang'])&&$dieukien['tinhtrang']!='tatca'){
                $this->db->where('ct.dThoiGIanBD <=', $dieukien['now']);
                $this->db->where('ct.dThoiGIanKT >=', $dieukien['now']);
            }
            if(!empty($dieukien['thoigianbd'])){
                $this->db->where('ct.dThoiGIanBD >=', $dieukien['thoigianbd']);
            }
            if(!empty($dieukien['thoigiankt'])){
                $this->db->where('ct.dThoiGIanKT <=', $dieukien['thoigiankt']);
            }
        }

        public function getminhchung($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $res = $this->db->order_by("ct.dThoiGIanKT",'DESC')
                        -> select("mc.PK_sMaMC, tk.sHoTen, tk.dNgaySinh, tk.PK_sMaTK,lop.sTenLop, mc.tLink,mc.iTrangThai,ct.dThoiGIanKT,ct.sTenCT,ct.dThoiGIanBD")
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

        public function updateminhchung($id, $iTrangthai,$macb,$now){
            $this->db->where("PK_sMaMC", $id);
            $this->db->update("tbl_minhchung", array('iTrangThai' => $iTrangthai,'FK_sMaCB' => $macb,'dTGDuyet' => $now));
        }
        
    }
?>
