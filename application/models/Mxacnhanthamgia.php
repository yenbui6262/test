<?php
	class Mxacnhanthamgia extends My_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
        public function getTotalRecord($dieukien, $masv){
            
            $this->dieukien($dieukien);
            $this->db->join("tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = sMaCT")
                    ->select("sMaDS")
                    ->where('sMaTK',$masv)
                    ->from('tbl_thamgia');
            $count = $this->db->count_all_results();
            return $count;
        }

        private function dieukien($dieukien=null){
            if(!empty($dieukien['tenct'])){
                $this->db->like('sTenCT', $dieukien['tenct']);
            }
            if(!empty($dieukien['mota'])){
                $this->db->like('tMota', $dieukien['mota']);
            }
            if(!empty($dieukien['trangthai'])&&$dieukien['trangthai']!='tatca'){
                $this->db->where('iTrangThai', $dieukien['trangthai']);
            }
            
        }

        public function getChuongtrinh($limit, $start,$dieukien,$masv)
        {
            $this->dieukien($dieukien);
            $res = $this->db->order_by("dThoiGianXN",'DESC')
                        ->order_by("dThoiGianKT")
                        ->join("tbl_chuongtrinh ct", "ct.PK_sMaChuongTrinh = sMaCT")
                        ->select("*")
                        ->where('sMaTK',$masv)
                        ->limit($limit, $start)
                        ->get("tbl_thamgia")->result_array();
            return $res;
        }

        //cập nhật 
        public function updatexn($id, $trangthai, $lydo)
        {
            $this->db->where('sMaDS', $id);
            $this->db->update('tbl_thamgia', array('iTrangThai' => $trangthai , 'tLyDo' => $lydo));
            return $this->db->affected_rows();
        }

	}
?>