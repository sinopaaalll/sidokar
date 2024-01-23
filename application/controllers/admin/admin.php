<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data['menu'] = 'Config';
        $data['title'] = 'Kelola Admin';
        $data['admin'] = $this->db->get('admin')->result();
        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar', $data);
        $this->load->view('admin/admin', $data);
        $this->load->view('layouts/admin/footer');
    }

    public function tambah()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[conf_password]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('conf_password', 'Konfirmasi Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['menu'] = 'Config';
            $data['title'] = 'Tambah Admin';
            $data['list_bidang'] = $this->db->get('bidang')->result();
            $this->load->view('layouts/admin/header', $data);
            $this->load->view('layouts/admin/sidebar', $data);
            $this->load->view('admin/tambah_admin');
            $this->load->view('layouts/admin/footer');
        } else {
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
            } else {
                $upload_data['gambar']['file_name'] = 'default.png';
            }

            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'bidang' => htmlspecialchars($this->input->post('bidang', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'gambar' => $upload_data['gambar']['file_name'],
                'role' => $this->input->post('role', true),
            ];

            $this->db->insert('admin', $data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect('admin/admin');
        }
    }

    public function hapus($id)
    {
        $gambar = $this->db->get_where('admin', ['id' => $id])->row_array()['gambar'];

        // Hapus file gambar dari folder uploads
        $path = './uploads/' . $gambar;
        if (file_exists($path)) {
            unlink($path);
        }

        $this->db->delete('admin', ['id' => $id]);

        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/admin');
    }
}

/* End of file admin.php */
