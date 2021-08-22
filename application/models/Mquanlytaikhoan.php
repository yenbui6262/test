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
                     ->from('hs_tbl_taikhoan tk');
            $count = $this->db->count_all_results();
            return $count;
        }

        private function dieukien($dieukien=null){
            if(!empty($dieukien['masv'])){
                $searchQuery = "(tk.sTenTK like '%".$dieukien['masv']."%' or 
                tk.sHoTen like '%".$dieukien['masv']."%') ";
                $this->db->where($searchQuery);
            }
        }

        public function gettaikhoan($limit, $start,$dieukien)
        {
            $this->dieukien($dieukien);
            $this->db->where('FK_sMaQuyen !=', '1');
            $res = $this->db->order_by("sHoTen")
                        ->select("PK_sMaTK, sTenTK, sHoTen")
                        ->limit($limit, $start)
                        ->get("hs_tbl_taikhoan tk")->result_array();
            return $res;
        }
        
        public function checktaikhoan($dieukien){
            $this->db->where('PK_sMaTK', $dieukien['PK_sMaTK']);
            $this->db->from('hs_tbl_taikhoan');
            $res = $this->db->get()->num_rows();
            return $res;
        }
        public function inserttaikhoan($data){
            $this->db->insert('hs_tbl_taikhoan',$data);
            return $this->db->affected_rows();
        }
        public function updatetaikhoan($data){
            $this->db->where('PK_sMaTK', $data['PK_sMaTK']);
            $this->db->update('hs_tbl_taikhoan',$data);
            return 1;
            
        }
        public function deletetaikhoan($MaTK){
            $this->db->where('PK_sMaTK', $MaTK);
            $this->db->delete('hs_tbl_taikhoan');
            return $this->db->affected_rows();
            
        }
        public function checkhoso($MaTK){
            $this->db->where('FK_sMaTK', $MaTK);
            $res = $this->db->select("PK_sMaHoSo")
                        ->get("hs_tbl_hososv")->result_array();
            return $res;
            
        }
        public function deletelienhe($MaHS){
            $this->db->where('FK_sMaHoSo', $MaHS);
            $this->db->delete('hs_tbl_lienhe');
            return $this->db->affected_rows();
            
        }
        public function deletehoso($MaTK){
            $this->db->where('FK_sMaTK', $MaTK);
            $this->db->delete('hs_tbl_hososv');
            return $this->db->affected_rows();
            
        }

        public function deletethamgia($MaTK){
            $this->db->where('sMaTK', $MaTK);
            $this->db->delete('hs_tbl_thamgia');
            return $this->db->affected_rows();
            
        }
        public function deleteminhchung($MaTK){
            $this->db->where('FK_sMaSV', $MaTK);
            $this->db->delete('hs_tbl_minhchung');
            return $this->db->affected_rows();
            
        }

        public function deletedangkydon($MaTK){
            $this->db->where('FK_sMaSV', $MaTK);
            $this->db->delete('hs_tbl_dangkydon');
            return $this->db->affected_rows();
            
        }


        public function checklop($tenlop){
            $this->db->where('sTenLop', $tenlop);
            $this->db->select('PK_sMaLop');
            $this->db->from('hs_tbl_lop');
            $res = $this->db->get()->result_array();
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
