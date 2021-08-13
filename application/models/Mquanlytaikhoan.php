<?php

    class Mquanlytaikhoan extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function getTotalRecord($dieukien){
            $this->dieukien($dieukien);
            $this->db->where('FK_sMaQuyen !=', '1');
            $this->db->select("PK_sMaTK")
                     ->from('tbl_taikhoan tk');
            $count = $this->db->count_all_results();
            return $count;
        }

        private function dieukien($dieukien=null){
        }

        public function gettaikhoan($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $this->db->where('FK_sMaQuyen !=', '1');
            $res = $this->db->order_by("sHoTen")
                        ->select("sTenTK, sHoTen")
                        ->limit($limit, $start)
                        ->get("tbl_taikhoan tk")->result_array();
            return $res;
        }

        public function getmacb($tencb)
        {
            $res = $this->db->select('PK_sMaTK')
                        ->get('tbl_taikhoan')->result_array();
            return $res;
        }

        public function deletechuongtrinh($Mact){
            $this->db->where('PK_sMaChuongTrinh', $Mact);
            $this->db->delete('tbl_chuongtrinh');
            return $this->db->affected_rows();
            
        }

        public function deletethamgia($Mact){
            $this->db->where('sMaCT', $Mact);
            $this->db->delete('tbl_thamgia');
            return $this->db->affected_rows();
            
        }

    }
?>
