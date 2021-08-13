<?php
    class Cchitietsinhvien extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mchitietsinhvien');
        }

        public function index($page=1)
        {
            $session = $this->session->userdata("user");
            if($session['maquyen']!=1){
                return redirect(base_url().'403_Forbidden');
            }

            $matk=$this->session->userdata("filterctsv");
            $temp = array(
                'template'  => 'Vchitietsinhvien',
                'data'      => array(
                    'thongtincb'    => $this->Mchitietsinhvien->getthongtincb($matk),
                    'lienhe'    => $this->Mchitietsinhvien->getthongtinlienhe($matk),
                    'message' => getMessages(),
                    'session'   => $session,
                ),
            );
            // pr($temp);
            $this->load->view('layout/Vcontent', $temp);
        }

    }
?>