<?php

    class Mchuongtrinh extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function getTotalRecord($dieukien){
            $this->dieukien($dieukien);
            $this->db->select("PK_sMaChuongTrinh")
                     ->from('tbl_chuongtrinh');
            $count = $this->db->count_all_results();
            return $count;
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

        public function getChuongtrinh($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $res = $this->db-> select("*")
                        ->limit($limit, $start)
                        ->get("tbl_chuongtrinh")->result_array();
            return $res;
        }

        public function getmacb($tencb)
        {
            $res = $this->db->select('PK_sMaTK')
                        ->get('tbl_taikhoan')->result_array();
            return $res;
        }

        public function insertchuongtrinh($data)
        {
            $this->db->insert('tbl_chuongtrinh', $data);
            return $this->db->affected_rows();
        }

        public function deletechuongtrinh($Mact){
            $this->db->where('PK_sMaChuongTrinh', $Mact);
            $this->db->delete('tbl_chuongtrinh');
            return $this->db->affected_rows();
            
        }
        
        //cập nhật 
        public function updatechuongtrinh($Mact, $data)
        {
            $this->db->where('PK_sMaChuongTrinh', $Mact);
            $this->db->update('tbl_chuongtrinh', $data);
            return $this->db->affected_rows();
        }
    }
?>
