<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        
        $data['title'] = 'Login';
        $this->load->view('layouts/front/header', $data);
        $this->load->view('layouts/front/navbar', $data);
        $this->load->view('auth/v_login');
        $this->load->view('layouts/front/footer');
    }

    public function verif()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('admin', ['username' => $username])->row_array();

        // jika usernya ada
        if ($user) {
            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'gambar' => $user['gambar']
                ];

                $this->session->set_userdata($data);

                if ($user['role'] === 'Administrator') {
                    $this->session->set_flashdata('success', 'Anda Berhasil Login.');
                    redirect('admin/dashboard');
                } elseif ($user['role'] === 'Petugas') {
                    $this->session->set_flashdata('success', 'Anda Berhasil Login.');
                    redirect('admin/dashboard');
                } elseif ($user['role'] === 'Kepala') {
                    $this->session->set_flashdata('success', 'Anda Berhasil Login.');
                    redirect('admin/dashboard');
                }
            } else {
                $this->session->set_flashdata('error', 'Password Salah!');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Akun Anda Belum Terdaftar');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
