<?php

    class Mduyetminhchung extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function getTotalRecord($dieukien,$maquyen,$malop){
            if($maquyen==1||$maquyen==3){
                $this->db->where('mc.iTrangThai', '2');
            }else{
                $this->db->where('tk.sFK_lop', $malop);
            }
            $this->dieukien($dieukien,$maquyen);
            $res = $this->db-> select("mc.PK_sMaMC, tk.sHoTen, mc.tLink, lop.sTenLop")
                        -> join("tbl_taikhoan tk", "tk.PK_sMaTK = mc.FK_sMaSV")
                        -> join("tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                        -> join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop","left")
                        ->from("tbl_minhchung mc")->count_all_results();
            return $res;
        }

        private function dieukien($dieukien=null,$ma){
            if(!empty($dieukien['tenct'])&&$dieukien['tenct']!='tatca'){
                $this->db->where('ct.sTenCT', $dieukien['tenct']);
            }
            if(!empty($dieukien['hoten'])){
                $this->db->like('tk.sHoTen', $dieukien['hoten']);
            }
            if(!empty($dieukien['masv'])){
                $this->db->like('tk.PK_sMaTK', $dieukien['masv']);
            }

            if($ma==1||$ma==3){
                if(!empty($dieukien['trangthai'])&&$dieukien['trangthai']!='tatca'){
                    $this->db->where('mc.iTrangThaiCD', $dieukien['trangthai']);
                }
                if(!empty($dieukien['lop'])&&$dieukien['lop']!='tatca'){
                    $this->db->where('lop.sTenLop', $dieukien['lop']);
                }
            }else{
                if(!empty($dieukien['trangthai'])&&$dieukien['trangthai']!='tatca'){
                    $this->db->where('mc.iTrangThai', $dieukien['trangthai']);
                }
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

        public function getminhchung($limit, $start,$dieukien,$maquyen,$malop){
            $this->dieukien($dieukien,$maquyen);
            if($maquyen==1||$maquyen==3){
                $this->db-> where('mc.iTrangThai', '2');
                $this->db-> order_by("mc.iTrangThaiCD");
                $this->db-> order_by("tk.sHoTen");
                $this->db-> order_by("mc.dTGduyet",'DESC');
            }else{
                $this->db-> where('tk.sFK_lop', $malop);
                $this->db-> order_by("mc.iTrangThai");
                $this->db-> order_by("tk.sHoTen");
                $this->db-> order_by("ct.dThoiGIanKT",'DESC');
            }
                        
            $res = $this->db-> select("mc.PK_sMaMC, tk.sHoTen, tk.dNgaySinh, tk.PK_sMaTK,lop.sTenLop, mc.tLink,mc.iTrangThai,mc.iTrangThaiCD,ct.dThoiGIanKT,ct.sTenCT,ct.dThoiGIanBD")
                            -> join("tbl_taikhoan tk", "tk.PK_sMaTK = mc.FK_sMaSV")
                            -> join("tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                            -> join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop","left")
                            -> limit($limit, $start)
                            -> get("tbl_minhchung mc")->result_array();
            return $res;
        }

        public function getchucvu($ma){
            $this->db->where('PK_sMaTK',$ma);
            $res = $this->db->select('sChucvu,sFK_lop')
                        ->get('tbl_taikhoan')->result_array();
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
            return $this->db->affected_rows();
        }
        
        public function updateminhchungcb($id, $iTrangthai,$macb,$now){
            $this->db->where("PK_sMaMC", $id);
            $this->db->update("tbl_minhchung", array('iTrangThaiCD' => $iTrangthai,'FK_sMaCBCD' => $macb,'dTGDuyetCD' => $now));
            return $this->db->affected_rows();
        }
    }
?>
