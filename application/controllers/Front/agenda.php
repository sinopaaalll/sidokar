<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class agenda extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Agenda';
        $data['agenda'] = $this->db->get('agenda')->row();
        $this->load->view('layouts/front/header', $data);
        $this->load->view('layouts/front/navbar', $data);
        $this->load->view('front/agenda');
        $this->load->view('layouts/front/footer');
    }

}

/* End of file agenda.php */
