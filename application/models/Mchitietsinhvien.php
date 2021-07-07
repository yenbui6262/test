<?php

    class Mchitietsinhvien extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function getTotalRecord($dieukien){
            $this->dieukien($dieukien);
            $res = $this->db->order_by("mc.PK_sMaMC")
                        -> select("mc.PK_sMaMC, tk.sHoTen, mc.tLink")
                        -> join("tbl_taikhoan tk", "tk.PK_sMaTK = mc.FK_sMaSV")
                        -> join("tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = mc.FK_sMaCT")
                        -> join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                        ->from("tbl_minhchung mc")->count_all_results();
            return $res;
        }

        public function getsosinhvien($dieukien)
        {
            $this->db->where('lop.sTenLop', $dieukien);
            $res = $this->db->group_by("lop.PK_sMaLop")
                        -> select("lop.sTenLop,count(tk.PK_sMaTK) as sosinhvien")
                        -> join("tbl_taikhoan tk", "tk.sFK_Lop = lop.PK_sMaLop")
                        -> get("tbl_lop lop")->result_array();
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
            
        }

        public function getminhchung($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $res = $this->db->order_by("mc.PK_sMaMC")
                        -> select("mc.PK_sMaMC, tk.sHoTen, mc.tLink")
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

        public function deleteminhchung($Mamc){
            $this->db->where('PK_sMaMC', $Mamc);
            $this->db->delete('tbl_minhchung');
            return $this->db->affected_rows();
            
        }
        
    }
?>
