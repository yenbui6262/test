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
            // if(!empty($dieukien['thoigianbd'])){
            //     $this->db->where('dThoiGIanBD <', $dieukien['thoigianbd']);
            // }
            // if(!empty($dieukien['thoigiankt'])){
            //     $this->db->where('dThoiGIanKT <', $dieukien['thoigiankt']);
            // }
            
        }

        public function getChuongtrinh($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $res = $this->db-> select("*")
                        ->limit($limit, $start)
                        ->get("tbl_chuongtrinh")->result_array();
            return $res;
        }

        public function inserttieuchiphu($data)
        {
            $this->db->insert('tbl_tieuchiphu', $data);
            return $this->db->affected_rows();
        }

        public function checkTCP($matcp)
        {
            $this->db->select('count("PK_sMaminhchung") as sohoso')
                        ->like('sDStieuchiphu',$matcp)
                        ->group_by('sDStieuchiphu');
            return $this->db->get('tbl_minhchung')->result_array();
        }

        public function deletetieuchiphu($Matcp){
            $this->db->where('PK_sMatieuchiphu', $Matcp);
            $this->db->delete('tbl_tieuchiphu');
            return $this->db->affected_rows();
            
        }
        public function gettieuchiphu($Matcp){
            $this->db->where('PK_sMatieuchiphu', $Matcp);
            return $this->db->get('tbl_tieuchiphu')->row_array();
        }
        public function gettieuchi(){
            $this->db->order_by("PK_sMatieuchi");
            $res = $this->db->get("tbl_tieuchi")->result_array();
            return $res;
        }
        //cập nhật 
        public function updatetieuchiphu($Matcp, $data)
        {
            $this->db->where('PK_sMatieuchiphu', $Matcp);
            $this->db->update('tbl_tieuchiphu', $data);
            return $this->db->affected_rows();
        }
    }
?>
