<?php 
class Mdk_minhchung extends My_Model
{
        public function getTotalRecord($dieukien,$masv){
            $this->dieukien($dieukien);
            $res = $this->db-> select("PK_sMaChuongTrinh")
                        ->join("hs_tbl_chuongtrinh","FK_sMaCT=PK_sMaChuongTrinh")
                        ->where('FK_sMaSV ', $masv)
                        ->limit(50)
                        ->from('hs_tbl_minhchung');
            $count = $this->db->count_all_results();
            return $count;
        }
        private function dieukien($dieukien=null){
            if(!empty($dieukien['tenchuongtrinh'])){
                $this->db->like('sTenCT', $dieukien['tenchuongtrinh']);
            }
            if(!empty($dieukien['thoigianbd'])){
                $this->db->where('dThoiGIanBD >=', $dieukien['thoigianbd']);
            }
            if(!empty($dieukien['thoigiankt'])){
                $this->db->where('dThoiGIanKT <=', $dieukien['thoigiankt']);
            }
            if(!empty($dieukien['trangthai'])&&$dieukien['trangthai']!='tatca'){
                $this->db->where('iTrangThaiCD', $dieukien['trangthai']);
            }
        }
        public function getChuongTrinh($date,$masv){
            $this->db->select("*")
                        ->join("hs_tbl_chuongtrinh ct","ct.PK_sMaChuongTrinh=sMaCT")
                        ->where('dThoiGIanBD <=', $date)
                        ->where('dThoiGIanKT >=', $date)
                        ->where('iTrangThai', 2)
                        ->where('sMaTK', $masv)
                        ->order_by("PK_sMaChuongTrinh asc");
            return $this->db->get("hs_tbl_thamgia tg")->result_array();
        }
        public function getMinhchung($limit, $start,$dieukien,$masv){
            $this->dieukien($dieukien);
            $res=$this->db->select("PK_sMaMC, ct.PK_sMaChuongTrinh,FK_sMaCT,ct.sTenCT, ct.tMota, tLink, mc.FK_sMaCBCD,mc.FK_sMaCB,iTrangThai, iTrangThaiCD,dThoiGIanBD,dThoiGIanKT,tk.sChucvu")
                    ->where('FK_sMaSV',$masv)
                    ->join("hs_tbl_chuongtrinh ct","ct.PK_sMaChuongTrinh=mc.FK_sMaCT")
                    ->join("hs_tbl_taikhoan tk","tk.PK_sMaTK=mc.FK_sMaCB",'left')
                    ->order_by("dThoiGIanKT desc,PK_sMaChuongTrinh ")
                    ->limit($limit, $start);
            return $this->db->get("hs_tbl_minhchung mc")->result_array();

        }
        public function getCanBo(){
            $res=$this->db->select("*");
            return $this->db->get("hs_tbl_quyen")->result_array();

        }
        public function getTGduyet($masv){
            $res=$this->db->select("dTGDuyetCD,dTGDuyet")
                    ->where('FK_sMaSV',$masv)
                    ->order_by("dTGDuyetCD desc");
            return $this->db->get("hs_tbl_minhchung",1)->row_array();

        }
        public function insertMinhChung($data)
        {
            $this->db->insert('hs_tbl_minhchung',$data);
            return $this->db->affected_rows();
        }
        public function deleteMinhchung($data)
        {
            $this->db->where('PK_sMaMC',$data)
                    ->delete('hs_tbl_minhchung');
            return $this->db->affected_rows();
        }
        public function updateMinhchung($mamc,$data)
        {
            $this->db->where('PK_sMaMC',$mamc)
                    ->update('hs_tbl_minhchung',$data);
            return $this->db->affected_rows();
        }
        public function findMC($data)
        {
            $res = $this->db->where('PK_sMaMC',$data['PK_sMaMC'])
                    ->get('hs_tbl_minhchung')->result_array();
                    return count($res);
        }
}
?>