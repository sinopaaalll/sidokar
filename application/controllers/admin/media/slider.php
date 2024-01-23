<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{

    public function index()
    {
        $data['menu'] = 'Media';
        $data['title'] = 'Kelola Slider';

        $data['slider'] = $this->db->get('slider')->result();

        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar', $data);
        $this->load->view('admin/media/slider', $data);
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
            'max_size' => 2048,
        ));

        if ($this->upload->do_upload('gambar')) {
            $upload_data['gambar'] = $this->upload->data();
        }

        $data = [
            'gambar' => $upload_data['gambar']['file_name'],
            'keterangan' => htmlspecialchars($this->input->post('ket'))
        ];

        $this->db->insert('slider', $data);

        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('admin/media/slider');
    }

    public function hapus($id)
    {
        $gambar = $this->db->get_where('slider', ['id' => $id])->row_array()['gambar'];

        // Hapus file gambar dari folder uploads
        $path = './uploads/' . $gambar;
        if (file_exists($path)) {
            unlink($path);
        }

        $this->db->delete('slider', ['id' => $id]);

        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/media/slider');
    }
}

/* End of file slider.php */
