<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class kegiatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/kegiatan_model');
    }

    public function index()
    {
        $data['menu'] = 'Halaman';
        $data['title'] = 'Kegiatan';

        $data['kegiatan'] = $this->kegiatan_model->get_data('kegiatan')->result();

        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar', $data);
        $this->load->view('admin/kegiatan',$data);
        $this->load->view('layouts/admin/footer');
    }

    public function tambah()
    {   

        $data = [
            'nama_kegiatan' => htmlspecialchars($this->input->post('nama_kegiatan')),
            'no_kegiatan' => htmlspecialchars($this->input->post('no_kegiatan')),
            'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
            'keterangan' => htmlspecialchars($this->input->post('keterangan_kegiatan')),
        ];

        $this->kegiatan_model->insert_data($data,'kegiatan');
        $this->session->set_flashdata('success', 'Data berhasil ditambah');
        redirect('admin/kegiatan');
        
    }

    public function edit($id_kegiatan)   
    {

        $data = [
            'id_kegiatan'=> $id_kegiatan,
            'nama_kegiatan' => htmlspecialchars($this->input->post('nama_kegiatan')),
            'no_kegiatan' => htmlspecialchars($this->input->post('no_kegiatan')),
            'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
            'keterangan' => htmlspecialchars($this->input->post('keterangan_kegiatan')),
        ];

       

        $this->kegiatan_model->update_data($data,'kegiatan');
        $this->session->set_flashdata('success', 'Data berhasil diedit');
        redirect('admin/kegiatan');
    }

    public function hapus($id_kegiatan)
	{
		$data['id_kegiatan'] = $id_kegiatan;

		$this->kegiatan_model->delete($data,'kegiatan');
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/kegiatan');     
	}



}

/* End of file kegiatan.php */
