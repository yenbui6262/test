<?php
	class Mchuongtrinh extends My_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function getTieuchi()
		{
			$this->db->select('*')->from('tbl_chuongtrinh');
			return $this->db->get()->result_array();
		}
		public function tatsTrangthai($ma_tieuchi)
		{
			$this->db->where('ma_tieuchi',$ma_tieuchi);
			$this->db->update('tbl_nam_tieuchi',array('sTrangthai' => 'off'));
			return $this->db->affected_rows();
		}
		public function batsTrangthai($ma_tieuchi)
		{
			$this->db->where('ma_tieuchi',$ma_tieuchi);
			$this->db->update('tbl_nam_tieuchi',array('sTrangthai' => 'on'));
			return $this->db->affected_rows();
		}
	}