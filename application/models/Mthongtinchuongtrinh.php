<?php

    class Mthongtinchuongtrinh extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        // get ttsv
        private function dieukien($dieukien){
            if(!empty($dieukien['hotenmasv'])){
                $searchQuery = " (tk.sTenTK like '%".$dieukien['hotenmasv']."%' or 
                    tk.sHoTen like '%".$dieukien['hotenmasv']."%') ";
                    $this->db->where($searchQuery);
            }
            if(!empty($dieukien['lop'])&&$dieukien['lop']!='tatca'){
                $this->db->where("lop.sTenLop",$dieukien['lop']);
            }
            if(!empty($dieukien['trangthai'])&&$dieukien['trangthai']!='tatca'){
                $this->db->where("tg.iTrangThai",$dieukien['trangthai']);
            }
        }
        public function getTotalRecord($dieukien){

            $this->db->where('tg.sMaCT', $dieukien['mact']);
            $this->dieukien($dieukien);
            $res = $this->db->select("tk.PK_sMaTK")
                        ->join("tbl_thamgia tg", "tg.sMaTK = tk.PK_sMaTK")
                        ->join("tbl_lop lop", "tk.sFK_Lop = lop.PK_sMaLop")
                        ->get("tbl_taikhoan tk");
            $count = $this->db->count_all_results();
            return $count;
        }
        public function getsinhvienduocthamgia($limit, $start,$dieukien)
        {
            $this->db->where('tg.sMaCT', $dieukien['mact']);
            $this->dieukien($dieukien);
            $res = $this->db->order_by("tk.sHoTen,tk.sTenTK")
                        ->select("tk.PK_sMaTK,tk.sHoTen,tk.sTenTK,tg.iTrangThai,tLydo,lop.sTenLop")
                        ->join("tbl_thamgia tg", "tg.sMaTK = tk.PK_sMaTK")
                        ->join("tbl_lop lop", "tk.sFK_Lop = lop.PK_sMaLop")
                        ->limit($limit, $start)
                        ->get("tbl_taikhoan tk")->result_array();
            return $res;
        }//end get ttsv



        public function tatca($dieukien){

            $this->db->where('tg.sMaCT', $dieukien);
            $res = $this->db->select("tk.PK_sMaTK")
                        ->join("tbl_thamgia tg", "tg.sMaTK = tk.PK_sMaTK")
                        ->from("tbl_taikhoan tk")->count_all_results();
            return $res;
        }
        public function khongthamgia($dieukien){

            $this->db->where('tg.sMaCT', $dieukien);
            $this->db->where('tg.iTrangThai', '3');
            $res = $this->db->select("tk.PK_sMaTK")
                        ->join("tbl_thamgia tg", "tg.sMaTK = tk.PK_sMaTK")
                        ->from("tbl_taikhoan tk")->count_all_results();
            return $res;
        }
        public function thamgia($dieukien){

            $this->db->where('tg.sMaCT', $dieukien);
            $this->db->where('tg.iTrangThai', '2');
            $res = $this->db->select("tk.PK_sMaTK")
                        ->join("tbl_thamgia tg", "tg.sMaTK = tk.PK_sMaTK")
                        ->from("tbl_taikhoan tk")->count_all_results();
            return $res;
        }


        public function getthongtincb($mact)
        {

            $this->db->where('PK_sMaChuongTrinh',$mact);
            $res = $this->db->select("*")
                        ->get("tbl_chuongtrinh")->result_array();
            return $res;
        }

        public function getlop(){
            $res = $this->db->select('*')
                        ->get('tbl_lop')->result_array();
            return $res;
        }
        
    }
?>
