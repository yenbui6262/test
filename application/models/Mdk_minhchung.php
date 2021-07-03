<?php 
class Mdk_minhchung extends My_Model
{
        public function getTotalRecord($dieukien,$masv){
            $this->dieukien($dieukien);
            $res = $this->db-> select("PK_sMaChuongTrinh")
                        ->join("tbl_chuongtrinh","FK_sMaCT=PK_sMaChuongTrinh")
                        ->where('FK_sMaSV ', $masv)
                        ->from('tbl_minhchung');
            $count = $this->db->count_all_results();
            return $count;
        }
        private function dieukien($dieukien=null){
            if(!empty($dieukien['thoigianbd'])){
                $this->db->where('dThoiGIanBD >=', $dieukien['thoigianbd']);
            }
            if(!empty($dieukien['thoigiankt'])){
                $this->db->where('dThoiGIanKT <=', $dieukien['thoigiankt']);
            }
            
        }
        public function getChuongTrinh($date){
            $this->db->select("*")
                        ->where('dThoiGIanBD <=', $date)
                        ->where('dThoiGIanKT >=', $date)
                        ->order_by("PK_sMaChuongTrinh asc");
            return $this->db->get("tbl_chuongtrinh")->result_array();
        }
        public function getMinhchung($limit, $start,$dieukien,$masv){
            $this->dieukien($dieukien);
            $res=$this->db->select("*")
                    ->where('FK_sMaSV',$masv)
                    ->join("tbl_chuongtrinh","PK_sMaChuongTrinh=FK_sMaCT")
                    ->order_by("PK_sMaChuongTrinh asc")
                    ->limit($limit, $start);
            return $this->db->get("tbl_minhchung")->result_array();

        }
        public function insertMinhChung($data)
        {
            $this->db->insert('tbl_minhchung',$data);
            return $this->db->affected_rows();
        }
        public function deleteMinhchung($data)
        {
            $this->db->where('PK_sMaMC',$data)
                    ->delete('tbl_minhchung');
            return $this->db->affected_rows();
        }
        public function updateMinhchung($mamc,$data)
        {
            $this->db->where('PK_sMaMC',$mamc)
                    ->update('tbl_minhchung',$data);
            return $this->db->affected_rows();
        }
        public function findMC($data)
        {
            $res = $this->db->where('PK_sMaMC',$data['PK_sMaMC'])
                    ->get('tbl_minhchung')->result_array();
                    return count($res);
        }
}
?>