<?php
	class Mhososinhvien extends My_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function getThongtincoban($masv){
            
            $this->db->select("*")
                    ->where("PK_sMaTK", $masv)
                    ->join("tbl_lop", "PK_sMaLop = sFK_Lop");
            $res = $this->db->get("tbl_taikhoan")->row_array();
            return $res;
        }
		public function getHoso($masv){
            
            $this->db->select("*")
                    ->where("PK_sMaTK", $masv)
                    ->join("tbl_hososv", "FK_sMaTK = PK_sMaTK");
            $res = $this->db->get("tbl_taikhoan")->row_array();
            return $res;
        }
		public function getLop(){
			$res=$this->db->get("tbl_lop")->result_array();
			return $res;
		}
		public function gettinh(){
			$res=$this->db->get("dm_tinh")->result_array();
			return $res;
		}
		public function gethuyen(){
			$res=$this->db->get("dm_huyen")->result_array();
			return $res;
		}
		public function getxa(){
			$res=$this->db->get("dm_xa")->result_array();
			return $res;
		}
        public function insertTT($data){
			$this->db->insert('tbl_hososv',$data);
            return $this->db->affected_rows();
		}
		public function updateTT($matk,$data){
			$this->db->where('FK_sMaTK',$matk);
			$this->db->update('tbl_hososv',$data);
            return $this->db->affected_rows();
		}
		public function updateEmail($matk,$data){
			$this->db->where('PK_sMaTK',$matk);
			$this->db->update('tbl_taikhoan',$data);
            return $this->db->affected_rows();
		}

	}
?>