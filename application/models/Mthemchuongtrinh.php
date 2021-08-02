<?php

    class Mthemchuongtrinh extends MY_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }


        public function getsinhvien($mact=null,$svdtg=null,$filter=null)
        {
            if(!empty($mact)){
                if(!empty($filter['masvhoten'])){
                    $searchQuery = " (tk.sTenTK like '%".$filter['masvhoten']."%' or 
                    tk.sHoTen like '%".$filter['masvhoten']."%') ";
                    $this->db->where($searchQuery);
                }
                $this->db->where_not_in('tk.PK_sMaTK',$svdtg);
                $res = $this->db->order_by("tk.sHoTen,tk.sTenTK")
                            ->select("tk.PK_sMaTK,tk.sHoTen,tk.sTenTK")
                            ->get("tbl_taikhoan tk")->result_array();
                return $res;
            }else{
                if(!empty($filter['masvhoten'])){
                    $searchQuery = " (tk.sTenTK like '%".$filter['masvhoten']."%' or 
                    tk.sHoTen like '%".$filter['masvhoten']."%') ";
                    $this->db->where($searchQuery);
                }
                if(!empty($svdtg)){
                    $this->db->where_not_in('PK_sMaTK',$svdtg);
                }
                $res = $this->db->order_by("sHoTen,sTenTK")
                                ->select("PK_sMaTK,sHoTen,sTenTK")
                                ->get("tbl_taikhoan")->result_array();
                return $res;
            }
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
        public function updatethamgia($data)
        {
            $this->db->set('sMaDS', $data['sMaDS']);
            $this->db->where('sMaTK', $data['sMaTK']);
            $this->db->where('sMaCT', $data['sMaCT'])
                     ->from('tbl_thamgia');
            return $this->db->count_all_results();
        }
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
        
    }
?>
