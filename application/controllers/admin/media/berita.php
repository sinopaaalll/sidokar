<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

    public function index()
    {
        $data['menu'] = 'Media';
        $data['title'] = 'Kelola Berita';
        $data['berita'] = $this->db->get('berita')->result();
        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar', $data);
        $this->load->view('admin/media/berita', $data);
        $this->load->view('layouts/admin/footer');
    }

    public function tulis()
    {
        $data['menu'] = 'Media';
        $data['title'] = 'Tulis Berita';
        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar', $data);
        $this->load->view('admin/media/tulis_berita');
        $this->load->view('layouts/admin/footer');
    }

    public function tambah()
    {

        $this->load->library('upload');

        $upload_data = array();

        $this->upload->initialize(array(
            'allowed_types' => 'png|jpg|jpeg',
            'upload_path'   => './uploads/',
            'encrypt_name'  => TRUE,
            'max_size' => 2048
        ));

        if ($this->upload->do_upload('gambar')) {
            $upload_data['gambar'] = $this->upload->data();
        }

        $data = [
            'tanggal' => htmlspecialchars($this->input->post('tgl')),
            'judul' => htmlspecialchars($this->input->post('judul')),
            'seo_judul' => htmlspecialchars($this->input->post('slug')),
            'isi' => htmlspecialchars($this->input->post('isi')),
            'is_active' => htmlspecialchars($this->input->post('status')),
            'gambar' => $upload_data['gambar']['file_name'],
        ];

        $this->db->insert('berita', $data);

        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('admin/media/berita');
    }

    public function hapus($id)
    {
        $gambar = $this->db->get_where('berita', ['id' => $id])->row_array()['gambar'];

        // Hapus file gambar dari folder uploads
        $path = './uploads/' . $gambar;
        if (file_exists($path)) {
            unlink($path);
        }

        $this->db->delete('berita', ['id' => $id]);

        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/media/berita');
    }
}

/* End of file berita.php */
