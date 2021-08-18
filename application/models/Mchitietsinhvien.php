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
                     ->join("tbl_lop lop", "lop.PK_sMaLop = tk.sFK_Lop","left")
                     ->join("tbl_hososv hs", "hs.FK_sMaTK = tk.PK_sMaTK","left")
                     ->join("dm_tinh t", "t.PK_sMaT = hs.FK_sMaTinhHT","left")
                     ->join("dm_huyen h", "h.PK_sMaH = hs.FK_sMaHuyenHT","left")
                     ->join("dm_xa x", "x.PK_sMaX = hs.FK_sMaXaHT","left")
                     ->join("dm_tinh tt", "tt.PK_sMaT = hs.FK_sMaTinhTT","left")
                     ->join("dm_huyen hh", "hh.PK_sMaH = hs.FK_sMaHuyenTT","left")
                     ->join("dm_xa xx", "xx.PK_sMaX = hs.FK_sMaXaTT","left")
                     ->join("dm_uutien u", "u.PK_sMaNhom = hs.FK_sUuTien",'left');
            $res = $this->db->get("tbl_taikhoan tk")->result_array();
            return $res;
        }

        public function getthongtinlienhe($matk)
        {

            $this->db->where('tk.PK_sMaTK',$matk);
            $this->db->select("lh.sHoTen,lh.sSDT,lh.sQuanHe")
                     ->join("tbl_hososv hs", "hs.FK_sMaTK = tk.PK_sMaTK")
                     ->join("tbl_lienhe lh", "hs.PK_sMaHoSo = lh.FK_sMaHoSo");
                     $res = $this->db->get("tbl_taikhoan tk")->result_array();
            return $res;
        }
    }
?>
