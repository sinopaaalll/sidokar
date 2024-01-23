<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('front/berita_model');
        $this->load->helper('text');
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['slider'] = $this->db->get('slider')->result();
        $data['berita']	= $this->berita_model->getLastNews();
        
        $this->load->view('layouts/front/header', $data);
        $this->load->view('layouts/front/navbar', $data);
        $this->load->view('front/beranda');
        $this->load->view('layouts/front/footer');
    }

}

/* End of file beranda.php */
