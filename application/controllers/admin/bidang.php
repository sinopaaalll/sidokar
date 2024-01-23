<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class bidang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/bidang_model');
    }

    public function index()
    {
        $data['menu'] = 'Config';
        $data['title'] = 'Kelola Bidang';

        $data['bidang'] = $this->bidang_model->get_data('bidang')->result();

        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar', $data);
        $this->load->view('admin/bidang');
        $this->load->view('layouts/admin/footer');
    }

    public function tambah()
    {   

        $data = [
            'nama_bidang' => htmlspecialchars($this->input->post('nama_bidang')),
            'keterangan' => htmlspecialchars($this->input->post('keterangan_bidang')),
        ];

        $this->bidang_model->insert_data($data,'bidang');
        $this->session->set_flashdata('success', 'Data berhasil ditambah');
        redirect('admin/bidang');
        
    }

    public function edit($id)   
    {

        $data = [
            'id'=> $id,
            'nama_bidang' => htmlspecialchars($this->input->post('nama_bidang')),
            'keterangan' => htmlspecialchars($this->input->post('keterangan_bidang')),
        ];

       

        $this->bidang_model->update_data($data,'bidang');
        $this->session->set_flashdata('success', 'Data berhasil diedit');
        redirect('admin/bidang');
    }

    public function hapus($id)
	{
		$data['id'] = $id;

		$this->bidang_model->delete($data,'bidang');
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/bidang');     
	}

}

/* End of file bidang.php */
