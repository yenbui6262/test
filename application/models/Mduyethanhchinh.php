<?php

    class Mduyethanhchinh extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function getTotalRecord($dieukien){
            $this->dieukien($dieukien);
            $res = $this->db-> select("dky.PK_sMaDangKy")
                        -> join("tbl_taikhoan tk", "tk.PK_sMaTK = dky.FK_sMaSV")
                        -> join("dm_hanhchinh hc", "hc.PK_sMaHanhChinh = dky.FK_sMaHanhChinh")
                        -> join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                        ->from("tbl_dangkydon dky")->count_all_results();
            return $res;
        }

        private function dieukien($dieukien=null){
            if(!empty($dieukien['tenhc'])&&$dieukien['tenhc']!='tatca'){
                $this->db->like('hc.sTenHanhChinh', $dieukien['tenhc']);
            }
            if(!empty($dieukien['hoten'])){
                $this->db->like('tk.sHoTen', $dieukien['hoten']);
            }
            if(!empty($dieukien['lop'])&&$dieukien['lop']!='tatca'){
                $this->db->where('lop.sTenLop', $dieukien['lop']);
            }
            if(!empty($dieukien['trangthai'])&&$dieukien['trangthai']!='tatca'){
                $this->db->where('dky.iTrangThai', $dieukien['trangthai']);
            }
            
        }

        public function getdondangky($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $res = $this->db->order_by("dky.iTrangThai,tk.sHoTen")
                        -> select("dky.PK_sMaDangKy, tk.sHoTen, lop.sTenLop, hc.sTenHanhChinh, dky.iTrangThai")
                        -> join("tbl_taikhoan tk", "tk.PK_sMaTK = dky.FK_sMaSV")
                        -> join("dm_hanhchinh hc", "hc.PK_sMaHanhChinh = dky.FK_sMaHanhChinh")
                        -> join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                        ->limit($limit, $start)
                        ->get("tbl_dangkydon dky")->result_array();
            return $res;
        }

        public function getlop(){
            $res = $this->db->select('*')
                        ->get('tbl_lop')->result_array();
            return $res;
        }
        public function gethanhchinh(){
            $res = $this->db->select('sTenHanhChinh')
                        ->get('dm_hanhchinh')->result_array();
            return $res;
        }

        public function gettrangthai($Madon){
            $this->db->where('PK_sMaDangKy', $Madon);
            $res = $this->db->select('iTrangThai')
                        ->get('tbl_dangkydon')->result_array();
            return $res[0]['iTrangThai'];
        }

        public function edittrangthai($Madon,$Trangthai){
            $this->db->where('PK_sMaDangKy', $Madon);
            $this->db->update('tbl_dangkydon',array('iTrangThai' => $Trangthai));
    		return $this->db->affected_rows();
        }

        public function deletedondangky($Madon){
            $this->db->where('PK_sMaDangKy', $Madon);
            $this->db->delete('tbl_dangkydon');
            return $this->db->affected_rows();
            
        }
        
    }
?>