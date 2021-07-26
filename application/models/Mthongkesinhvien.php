<?php

    class Mthongkesinhvien extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function getlop(){
            $res = $this->db->select('*')
                        ->get('tbl_lop')->result_array();
            return $res;
        }
        
        public function getlistsinhvien($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $this->db->group_by("tk.PK_sMaTK")
                     ->select("tk.PK_sMaTK, tk.sHoTen, lop.sTenLop,tk.iGioiTinh,tk.dNgaySinh")
                     ->join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                     ->limit($limit, $start);
            return $this->db->get("tbl_taikhoan tk")->result_array();
        }

        public function getTotalsinhvien($dieukien=null)
        {
            $this->dieukien($dieukien);
            $res = $this->db->group_by("tk.PK_sMaTK")
                            ->select("tk.PK_sMaTK, tk.sHoTen, lop.sTenLop")
                            ->join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop")
                            ->from("tbl_taikhoan tk")->count_all_results();
            return $res;
        }

        private function dieukien($dieukien=null){

            if(!empty($dieukien['lop'])&&$dieukien['lop']!='tatca'){
                $this->db->where('lop.sTenLop', $dieukien['lop']);
            }
            if(!empty($dieukien['ngaysinh'])){
                $this->db->where('tk.dNgaySinh', $dieukien['ngaysinh']);
            }
            if(!empty($dieukien['gioitinh'])&&$dieukien['gioitinh']!='tatca'){
                $this->db->where('tk.iGioiTinh', $dieukien['gioitinh']);
            }
        }
    }
?>
