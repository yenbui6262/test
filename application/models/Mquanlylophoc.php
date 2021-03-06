<?php

    class Mquanlylophoc extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function getTotalRecord($dieukien){
            $this->dieukien($dieukien);
            $this->db->select("PK_sMaLop")
                     ->from('hs_tbl_lop lop');
            $count = $this->db->count_all_results();
            return $count;
        }

        private function dieukien($dieukien=null){
            if(!empty($dieukien['tenlop'])){
                $searchQuery = "(lop.sTenLop like '%".$dieukien['tenlop']."%') ";
                $this->db->where($searchQuery);
            }
        }

        public function getlophoc($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $res = $this->db->select("lop.PK_sMaLop,lop.sTenLop")
                            ->limit($limit, $start)
                            ->get("hs_tbl_lop lop")->result_array();
            return $res;
        }
        
        public function checklophoc($tenlop){
            $this->db->where('sTenLop', $tenlop);
            $this->db->from('hs_tbl_lop');
            $res = $this->db->get()->num_rows();
            return $res;
        }
        public function insertlophoc($data){
            $this->db->insert('hs_tbl_lop',$data);
            return $this->db->affected_rows();
        }
        public function deletelophoc($MaLop){
            $this->db->where('PK_sMaLop', $MaLop);
            $this->db->delete('hs_tbl_lop');
            return $this->db->affected_rows();   
        }
        public function updatetaikhoan($MaLop){
            $this->db->where('sFK_Lop', $MaLop);
            $this->db->set('sFK_Lop', NULL);
            $this->db->update('hs_tbl_taikhoan');
            return $this->db->affected_rows();
        }

        public function checklop($tenlop){
            $this->db->where('sTenLop', $tenlop);
            $this->db->select('PK_sMaLop');
            $this->db->from('hs_tbl_lop');
            $res = $this->db->get()->result_array();
            return $res;
        }
        public function getlop(){
            $res = $this->db->select('*')
                        ->get('hs_tbl_lop')->result_array();
            return $res;
        }
        public function insertlop($data){
            $this->db->insert('hs_tbl_lop',$data);
            return $this->db->affected_rows();
        }
        public function updatelop($malop,$dieukien){
            $this->db->where($dieukien);
            $this->db->set('sFK_Lop',$malop);
            $this->db->update("hs_tbl_taikhoan");
        }

    }
?>
