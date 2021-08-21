<?php

    class Mchitietsinhvien extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function getthongtincb($matk)
        {

            $this->db->where('tk.PK_sMaTK',$matk);
            $this->db->group_by("tk.PK_sMaTK")
                     ->select("hs.sSTK,hs.sChiNhanh,tk.tEmail,hs.sSDT,lop.sTenLop,tk.PK_sMaTK,tk.sHoTen,tk.dNgaySinh,tk.sChucvu,tk.iGioiTinh,tk.sTenTK,tk.FK_sMaQuyen,hs.tChiTietTT,hs.tChiTietHT,t.sTenT as tinhht,h.sTenH as huyenht,x.sTenX as xaht,tt.sTenT as tinhtt,hh.sTenH as huyentt,xx.sTenX as xatt,u.tMoTa")
                     ->join("hs_tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop","left")
                     ->join("hs_tbl_hososv hs", "hs.FK_sMaTK = tk.PK_sMaTK","left")
                     ->join("hs_dm_tinh t", "t.PK_sMaT = hs.FK_sMaTinhHT","left")
                     ->join("hs_dm_huyen h", "h.PK_sMaH = hs.FK_sMaHuyenHT","left")
                     ->join("hs_dm_xa x", "x.PK_sMaX = hs.FK_sMaXaHT","left")
                     ->join("hs_dm_tinh tt", "tt.PK_sMaT = hs.FK_sMaTinhTT","left")
                     ->join("hs_dm_huyen hh", "hh.PK_sMaH = hs.FK_sMaHuyenTT","left")
                     ->join("hs_dm_xa xx", "xx.PK_sMaX = hs.FK_sMaXaTT","left")
                     ->join("hs_dm_uutien u", "u.PK_sMaNhom = hs.FK_sUuTien",'left');
            $res = $this->db->get("hs_tbl_taikhoan tk")->result_array();
            return $res;
        }

        public function getthongtinlienhe($matk)
        {

            $this->db->where('tk.PK_sMaTK',$matk);
            $this->db->select("lh.sHoTen,lh.sSDT,lh.sQuanHe")
                     ->join("hs_tbl_hososv hs", "hs.FK_sMaTK = tk.PK_sMaTK")
                     ->join("hs_tbl_lienhe lh", "hs.PK_sMaHoSo = lh.FK_sMaHoSo");
                     $res = $this->db->get("hs_tbl_taikhoan tk")->result_array();
            return $res;
        }
    }
?>
