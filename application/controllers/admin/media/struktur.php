<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Struktur extends CI_Controller
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
        $data['menu'] = 'Media';
        $data['title'] = 'Kelola Struktur Organisasi';
        $data['struktur'] = $this->db->get('struktur')->result();
        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar', $data);
        $this->load->view('admin/media/struktur', $data);
        $this->load->view('layouts/admin/footer');
    }

    public function edit($id)
    {

        $this->load->library('upload');

        $upload_data = array();

        $this->upload->initialize(array(
            'allowed_types' => 'png|jpg|jpeg',
            'upload_path'   => './uploads/',
            'encrypt_name'  => TRUE,
            'max_size' => 2048
        ));

        // Cek apakah ada file yang diunggah
        if (!empty($_FILES['gambar']['name'])) {
            // Hapus foto yang ada di repo
            $old_foto = $this->db->get_where('struktur', ['id' => $id])->row()->gambar;
            if ($old_foto != 'default.jpg') {
                unlink("./uploads/" . $old_foto);
            }

            // Upload foto yang baru
            if ($this->upload->do_upload('gambar')) {
                $upload_data['gambar'] = $this->upload->data();
            }
        } else {
            $upload_data['gambar']['file_name'] = $this->input->post('old_foto');
        }

        $data = [
            'gambar' => $upload_data['gambar']['file_name'],
        ];

        $this->db->update('struktur', $data, ['id' => $id]);

        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('admin/media/struktur');
    }
}

/* End of file struktur.php */
