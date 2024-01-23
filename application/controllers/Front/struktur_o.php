<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class struktur_o extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Struktur Organisasi';
        $data['struktur'] = $this->db->get('struktur')->row();
        $this->load->view('layouts/front/header', $data);
        $this->load->view('layouts/front/navbar', $data);
        $this->load->view('front/struktur_o');
        $this->load->view('layouts/front/footer');
    }

}

/* End of file struktur_o.php */
