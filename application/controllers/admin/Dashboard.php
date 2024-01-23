<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // is login
        if (!($this->session->userdata('nama'))) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['menu'] = 'Halaman';
        $data['title'] = 'Dashboard';

        $data['total_kegiatan'] = $this->db->query("SELECT COUNT(id_kegiatan) as jml FROM kegiatan")->row_array();
        $data['total_admin'] = $this->db->query("SELECT COUNT(id) as jml FROM admin")->row_array();
        $data['total_berita'] = $this->db->query("SELECT COUNT(id) as jml FROM berita")->row_array();

        // Query untuk mengambil jumlah id berdasarkan upload berkas
        $data['upload'] = $this->db->query("SELECT COUNT(id_berkas) as jumlah, status_upload FROM berkas_berkas GROUP BY status_upload")->result_array();

        // Query untuk mengambil jumlah id berdasarkan status berkas
        $data['confirm'] = $this->db->query("SELECT COUNT(id_berkas) as jumlah, status_confirm FROM berkas_berkas GROUP BY status_confirm")->result_array();


        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('layouts/admin/footer');
    }
}

/* End of fils dashboard.php */
