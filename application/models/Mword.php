<?php
	class Mword extends My_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function getThongtincoban($masv, $madk){
            
            $this->db->select("hs.sSTK,hs.sChiNhanh,tk.tEmail,hs.sSDT,lop.sTenLop,tk.PK_sMaTK,tk.sHoTen,tk.dNgaySinh,tk.sChucvu,tk.iGioiTinh,tk.sTenTK,tk.FK_sMaQuyen,hs.tChiTietTT,hs.tChiTietHT,t.sTenT as tinhht,h.sTenH as huyenht,x.sTenX as xaht,tt.sTenT as tinhtt,hh.sTenH as huyentt,xx.sTenX as xatt,u.tMoTa,dkd.tLydo")
                    ->where("PK_sMaTK", $masv)
                    ->where("dkd.PK_sMaDangKy", $madk)
                    ->join("hs_tbl_dangkydon dkd", "FK_sMaSV = PK_sMaTK",'left')
                    ->join("hs_tbl_hososv hs", "FK_sMaTK = PK_sMaTK",'left')
                    ->join("hs_tbl_lop lop", "PK_sMaLop = sFK_Lop",'left')
                    ->join("hs_dm_tinh t", "t.PK_sMaT = hs.FK_sMaTinhHT","left")
                     ->join("hs_dm_huyen h", "h.PK_sMaH = hs.FK_sMaHuyenHT","left")
                     ->join("hs_dm_xa x", "x.PK_sMaX = hs.FK_sMaXaHT","left")
                     ->join("hs_dm_tinh tt", "tt.PK_sMaT = hs.FK_sMaTinhTT","left")
                     ->join("hs_dm_huyen hh", "hh.PK_sMaH = hs.FK_sMaHuyenTT","left")
                     ->join("hs_dm_uutien u", "u.PK_sMaNhom = hs.FK_sUuTien",'left')
                     ->join("hs_dm_xa xx", "xx.PK_sMaX = hs.FK_sMaXaTT","left");

            $res = $this->db->get("hs_tbl_taikhoan tk")->row_array();
            return $res;
        }
    }
?>