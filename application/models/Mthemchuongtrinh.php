<?php

    class Mthemchuongtrinh extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function getthongtincb($mact)
        {

            $this->db->where('PK_sMaChuongTrinh',$mact);
            $res = $this->db->select("*")
                        ->get("tbl_chuongtrinh")->result_array();
            return $res;
        }


        public function getsinhvienduocthamgia($dieukien)
        {
            $this->db->where('tg.sMaCT', $dieukien);
            $res = $this->db->order_by("tk.sHoTen,tk.sTenTK")
                        ->select("tk.PK_sMaTK,tk.sHoTen,tk.sTenTK,tg.iTrangThai")
                        ->join("tbl_thamgia tg", "tg.sMaTK = tk.PK_sMaTK")
                        ->get("tbl_taikhoan tk")->result_array();
            return $res;
        }

        public function getmacb($tencb)
        {
            $res = $this->db->select('PK_sMaTK')
                        ->get('tbl_taikhoan')->result_array();
            return $res;
        }

        public function insertchuongtrinh($data)
        {
            $this->db->insert('tbl_chuongtrinh', $data);
            return $this->db->affected_rows();
        }
        public function insertthamgia($data)
        {
            $this->db->insert('tbl_thamgia', $data);
            return $this->db->affected_rows();
        }
        
        //cập nhật 
        public function updatechuongtrinh($mact,$data)
        {
            $this->db->where('PK_sMaChuongTrinh', $mact);
            $this->db->update('tbl_chuongtrinh', $data);
            return $this->db->count_all_results();
        }
        // public function updatethamgia($data)
        // {
        //     $this->db->set('sMaDS', $data['sMaDS']);
        //     $this->db->where('sMaTK', $data['sMaTK']);
        //     $this->db->where('sMaCT', $data['sMaCT'])
        //              ->from('tbl_thamgia');
        //     return $this->db->count_all_results();
        // }
        public function deletethamgia($mact,$masv)
        {
            $this->db->where_not_in('sMaTK',$masv);
            $this->db->where('sMaCT', $mact);
            $this->db->delete('tbl_thamgia');
            return $this->db->count_all_results();
        }
        public function checkthamgia($data)
        {
            $this->db->where('sMaTK', $data['sMaTK']);
            $this->db->where('sMaCT', $data['sMaCT']);
            $this->db->select("sMaDS")
                     ->from('tbl_thamgia');
            return  $this->db->count_all_results();
        }
        public function getlop(){
            $res = $this->db->select('*')
                        ->get('tbl_lop')->result_array();
            return $res;
        }


        public function searchsinhvien($filter=null)
        {
            if(!empty($filter['phamvi'])){
                if($filter['phamvi']=='toancanbo'){
                    $searchQuery = " (tk.sChucvu != '') ";
                    $this->db->where($searchQuery);
                }elseif($filter['phamvi']=='toancanbolop'){
                    $this->db->where('tk.sChucvu !=','Cán bộ LCĐ, LCH');

                }elseif($filter['phamvi']=='toancanbochidoan'){
                    $this->db->where('tk.sChucvu','Cán bộ LCĐ, LCH');
                }
            }
            if($filter['masvdtg']){
                $this->db->where_not_in('tk.PK_sMaTK',$filter['masvdtg']);
            }
            if($filter['lop']&&$filter['lop']!='tatca'){
                $this->db->where('tk.sFK_Lop',$filter['lop']);
            }
            $res = $this->db->order_by("tk.sHoTen,tk.sTenTK")
                        ->select("tk.PK_sMaTK,tk.sHoTen,tk.sTenTK")
                        ->join("tbl_lop lop", "tk.sFK_Lop = lop.PK_sMaLop")
                        ->get("tbl_taikhoan tk")->result_array();
            return $res;
        }


    }
?>
