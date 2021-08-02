<?php

    class Mthongtinchuongtrinh extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
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
        
        public function getTotalRecord($dieukien){

            $this->db->where('tg.sMaCT', $dieukien['mact']);
            $res = $this->db->select("tk.PK_sMaTK")
                        ->join("tbl_thamgia tg", "tg.sMaTK = tk.PK_sMaTK")
                        ->get("tbl_taikhoan tk");
            $count = $this->db->count_all_results();
            return $count;
        }

        public function getsinhvienduocthamgia($limit, $start,$dieukien)
        {
            $this->db->where('tg.sMaCT', $dieukien['mact']);
            $res = $this->db->order_by("tk.sHoTen,tk.sTenTK")
                        ->select("tk.PK_sMaTK,tk.sHoTen,tk.sTenTK,tg.iTrangThai,tLydo")
                        ->join("tbl_thamgia tg", "tg.sMaTK = tk.PK_sMaTK")
                        ->limit($limit, $start)
                        ->get("tbl_taikhoan tk")->result_array();
            return $res;
        }

        public function getthongtincb($mact)
        {

            $this->db->where('PK_sMaChuongTrinh',$mact);
            $res = $this->db->select("*")
                        ->get("tbl_chuongtrinh")->result_array();
            return $res;
        }
        
    }
?>
