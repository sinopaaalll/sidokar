<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {

    public function index()
    {
        $data['menu'] = 'Halaman';
        $data['title'] = 'Profile';
        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar', $data);
        $this->load->view('admin/profile');
        $this->load->view('layouts/admin/footer');
    }

}

/* End of file profile.php */
