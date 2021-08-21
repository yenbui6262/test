<?php

    class Mthongkeminhchung extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function getTotalRecord($dieukien,$ma,$malop){
            $this->dieukien($dieukien);
            if($ma!=1&&$ma!=3){
                $this->db->where('tk.sFK_lop', $malop);
            }
            $res = $this->db->group_by("lop.PK_sMaLop,ct.PK_sMaChuongTrinh")
                        ->order_by("lop.PK_sMaLop,ct.PK_sMaChuongTrinh")
                        -> select("lop.sTenLop, ct.sTenCT,count(mc.PK_sMaMC) as sominhchung,ct.PK_sMaChuongTrinh,lop.PK_sMaLop")
                        -> join("hs_tbl_taikhoan tk", "tk.PK_sMaTK = mc.FK_sMaSV")
                        -> join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                        -> join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                        ->from("hs_tbl_minhchung mc")->count_all_results();
            return $res;
        }

        private function dieukien($dieukien=null){
            if(isset($dieukien['tenct'])&&$dieukien['tenct']!='tatca'){
                $this->db->like('ct.sTenCT', $dieukien['tenct']);
            }
            
            if(isset($dieukien['lop'])&&$dieukien['lop']!='tatca'&&$dieukien['action']!='get_dstheochuongtrinh'){
                $this->db->where('lop.sTenLop', $dieukien['lop']);
            }
            if(isset($dieukien['thoigianbd'])){
                $this->db->where('ct.dThoiGIanBD >=', $dieukien['thoigianbd']);
            }
            if(isset($dieukien['thoigiankt'])){
                $this->db->where('ct.dThoiGIanKT <=', $dieukien['thoigiankt']);
            }
            
        }

        public function getminhchung($limit, $start,$dieukien,$ma,$malop)
        {
            if($ma!=1&&$ma!=3){
                $this->db->where('tk.sFK_lop', $malop);
            }
            $this->dieukien($dieukien);
            $res = $this->db->order_by("dThoiGIanKT",'DESC')
                        ->order_by("lop.sTenLop")
                        ->group_by("lop.PK_sMaLop,ct.PK_sMaChuongTrinh")
                        -> select("lop.sTenLop, ct.sTenCT,count(mc.PK_sMaMC) as sominhchung, ct.PK_sMaChuongTrinh,lop.PK_sMaLop,ct.dThoiGIanBD,ct.dThoiGIanKT")
                        -> join("hs_tbl_taikhoan tk", "tk.PK_sMaTK = mc.FK_sMaSV")
                        -> join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                        -> join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                        ->limit($limit, $start)
                        ->get("hs_tbl_minhchung mc")->result_array();
            return $res;
        }
        public function sodaduyettheolop($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $this->db->where('mc.iTrangThai', '2');
            $res = $this->db->order_by("dThoiGIanKT",'DESC')
                        ->order_by("lop.sTenLop")
                        ->group_by("lop.PK_sMaLop,ct.PK_sMaChuongTrinh")
                        -> select("count(mc.PK_sMaMC) as sodaduyet, ct.PK_sMaChuongTrinh,lop.PK_sMaLop")
                        -> join("hs_tbl_taikhoan tk", "tk.PK_sMaTK = mc.FK_sMaSV")
                        -> join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                        -> join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                        ->limit($limit, $start)
                        ->get("hs_tbl_minhchung mc")->result_array();
            return $res;
        }
        public function sodaduyettheochuongtrinh($limit, $start,$dieukien)
        {
            $this->db->where('mc.iTrangThai', '2');
            $this->dieukien($dieukien);
            $this->db->order_by("dThoiGIanKT",'DESC')
                     ->group_by("ct.PK_sMaChuongTrinh")
                     ->select("count('mc.FK_sMaSV') as sodaduyet,ct.PK_sMaChuongTrinh")
                     ->join("hs_tbl_minhchung mc", "mc.FK_sMaSV = tk.PK_sMaTK")
                     ->join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                     ->limit($limit, $start);
            return $this->db->get("hs_tbl_taikhoan tk")->result_array();
        }
        public function socbdaduyettheochuongtrinh($limit, $start,$dieukien)
        {
            $this->db->where('mc.iTrangThaiCD', '2');
            $this->dieukien($dieukien);
            $this->db->order_by("dThoiGIanKT",'DESC')
                     ->group_by("ct.PK_sMaChuongTrinh")
                     ->select("count('mc.FK_sMaSV') as sodaduyet,ct.PK_sMaChuongTrinh")
                     ->join("hs_tbl_minhchung mc", "mc.FK_sMaSV = tk.PK_sMaTK")
                     ->join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                     ->limit($limit, $start);
            return $this->db->get("hs_tbl_taikhoan tk")->result_array();
        }
        public function sodaduyettheosinhvien($limit, $start,$dieukien)
        {
            $this->db->where('mc.iTrangThai', '2');
            $this->dieukien($dieukien);
            $this->db->group_by("tk.PK_sMaTK")
                     ->select("count('mc.FK_sMaCT') as sodaduyet,tk.PK_sMaTK")
                     ->join("hs_tbl_minhchung mc", "mc.FK_sMaSV = tk.PK_sMaTK")
                     ->join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                     ->join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                     ->limit($limit, $start);
            return $this->db->get("hs_tbl_taikhoan tk")->result_array();
        }

        public function socbdaduyettheosinhvien($limit, $start,$dieukien)
        {
            $this->db->where('mc.iTrangThaiCD', '2');
            $this->dieukien($dieukien);
            $this->db->group_by("tk.PK_sMaTK")
                     ->select("count('mc.FK_sMaCT') as sodaduyet,tk.PK_sMaTK")
                     ->join("hs_tbl_minhchung mc", "mc.FK_sMaSV = tk.PK_sMaTK")
                     ->join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                     ->join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                     ->limit($limit, $start);
            return $this->db->get("hs_tbl_taikhoan tk")->result_array();
        }
        public function socbdaduyettheolop($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $this->db->where('mc.iTrangThaiCD', '2');
            $res = $this->db->order_by("dThoiGIanKT",'DESC')
                        ->order_by("lop.sTenLop")
                        ->group_by("lop.PK_sMaLop,ct.PK_sMaChuongTrinh")
                        -> select("count(mc.PK_sMaMC) as sodaduyet, ct.PK_sMaChuongTrinh,lop.PK_sMaLop")
                        -> join("hs_tbl_taikhoan tk", "tk.PK_sMaTK = mc.FK_sMaSV")
                        -> join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                        -> join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                        ->limit($limit, $start)
                        ->get("hs_tbl_minhchung mc")->result_array();
            return $res;
        }

        public function getchucvu($ma){
            $this->db->where('PK_sMaTK',$ma);
            $res = $this->db->select('sFK_lop')
                        ->get('hs_tbl_taikhoan')->result_array();
            return $res;
        }
        public function getlop(){
            $res = $this->db->select('*')
                        ->get('hs_tbl_lop')->result_array();
            return $res;
        }
        public function getchuongtrinh(){
            $res = $this->db->select('sTenCT')
                        ->get('hs_tbl_chuongtrinh')->result_array();
            return $res;
        }
        
        public function getlistsinhvien($limit, $start,$dieukien,$ma,$malop)
        {
            if($ma!=1&&$ma!=3){
                $this->db->where('tk.sFK_lop', $malop);
            }
            $this->dieukien($dieukien);
            $this->db->group_by("tk.PK_sMaTK")
                     ->select("count('mc.FK_sMaCT') as sochuongtrinh,tk.PK_sMaTK, tk.sHoTen, lop.sTenLop")
                     ->join("hs_tbl_minhchung mc", "mc.FK_sMaSV = tk.PK_sMaTK")
                     ->join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                     ->join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                     ->limit($limit, $start);
            return $this->db->get("hs_tbl_taikhoan tk")->result_array();
        }

        public function getTotalsinhvien($dieukien=null,$ma,$malop)
        {
            if($ma!=1&&$ma!=3){
                $this->db->where('tk.sFK_lop', $malop);
            }
            $this->dieukien($dieukien);
            $res = $this->db->group_by("tk.PK_sMaTK")
                            ->select("count('mc.FK_sMaCT') as sochuongtrinh,tk.PK_sMaTK, tk.sHoTen, lop.sTenLop")
                            ->join("hs_tbl_minhchung mc", "mc.FK_sMaSV = tk.PK_sMaTK")
                            ->join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                            ->join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                            ->from("hs_tbl_taikhoan tk")->count_all_results();
            return $res;
        }

        public function getlistchuongtrinh($limit, $start,$dieukien,$ma,$malop)
        {
            if($ma!=1&&$ma!=3){
                $this->db->where('tk.sFK_lop', $malop);
            }
            $this->dieukien($dieukien);
            $this->db->order_by("ct.dThoiGIanKT",'DESC')
                     ->group_by("ct.PK_sMaChuongTrinh")
                     ->select("count('mc.FK_sMaSV') as soluong,ct.sTenCT,ct.PK_sMaChuongTrinh,ct.dThoiGIanBD,ct.dThoiGIanKT")
                     ->join("hs_tbl_minhchung mc", "mc.FK_sMaSV = tk.PK_sMaTK")
                     ->join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                     ->limit($limit, $start);
            return $this->db->get("hs_tbl_taikhoan tk")->result_array();
        }

        public function getTotalchuongtrinh($dieukien=null,$ma,$malop)
        {
            if($ma!=1&&$ma!=3){
                $this->db->where('tk.sFK_lop', $malop);
            }
            $this->dieukien($dieukien);
            $res = $this->db->group_by("ct.PK_sMaChuongTrinh")
                            ->select("count('mc.FK_sMaSV') as soluong,ct.sTenCT,ct.PK_sMaChuongTrinh")
                            ->join("hs_tbl_minhchung mc", "mc.FK_sMaSV = tk.PK_sMaTK")
                            ->join("hs_tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                            ->from("hs_tbl_taikhoan tk")->count_all_results();
            return $res;
        }

    }
?>
