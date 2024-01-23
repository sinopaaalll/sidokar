<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class berkas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/berkas_model');
    }

    public function index()
    {
        $data['menu'] = 'Halaman';
        $data['title'] = 'Berkas';

        $data['berkas'] = $this->berkas_model->get_data('berkas')->result();

        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar', $data);
        $this->load->view('admin/berkas',$data);
        $this->load->view('layouts/admin/footer');
    }

    public function tambah()
    {   
        $this->load->library('upload');

        $upload_data = array();

        $this->upload->initialize(array(
            'allowed_types' => 'pdf|doc|docx|xls|xlsx',
            'upload_path'   => './uploads/',
            'encrypt_name'  => TRUE, 
            'max_size' => 51200 
        ));
    
        if ($this->upload->do_upload('file_berkas')) {
            $upload_data['file_berkas'] = $this->upload->data();
        } else {
            // File upload failed, show error messages
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }
    
        // Process the second file input
        $this->upload->initialize(array(
            'allowed_types' => 'jpg|jpeg|png',
            'upload_path'   => './uploads/',
            'encrypt_name'  => TRUE,     
            'max_size' => 2048  
        ));
    
        if ($this->upload->do_upload('gambar_berkas')) {
            $upload_data['gambar_berkas'] = $this->upload->data();
            
    
        } else {
            // File upload failed, show error messages
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }

        $data = [
            'nama_berkas' => htmlspecialchars($this->input->post('nama_berkas')),
            'no_berkas' => htmlspecialchars($this->input->post('nomor_berkas')),
            'kategori' => $this->input->post('jenis_berkas'),
            'tgl_berkas' => $this->input->post('tgl_berkas'),
            'upload_by' => $this->input->post('upload_by'),
            'gambar_berkas' => $upload_data['gambar_berkas']['file_name'],
            'keterangan' => htmlspecialchars($this->input->post('keterangan_berkas')),
            'status' => htmlspecialchars($this->input->post('status_berkas')),
            'file_berkas' => $upload_data['file_berkas']['file_name'],
        ];

        $this->berkas_model->insert_data($data,'berkas');

        redirect('admin/berkas');
        
    }

    public function edit($id)   
    {
        $this->load->library('upload');

        $upload_data = array();

        $this->upload->initialize(array(
            'allowed_types' => 'pdf|doc|docx|xls|xlsx',
            'upload_path'   => './uploads/',
            'encrypt_name'  => FALSE, 
            'max_size' => 51200 ,
            
        ));
    
        if ($this->upload->do_upload('file_berkas')) {
            $upload_data['file_berkas'] = $this->upload->data();
        } 
    
        // Process the second file input
        $this->upload->initialize(array(
            'allowed_types' => 'jpg|jpeg|png',
            'upload_path'   => './uploads/',
            'encrypt_name'  => FALSE, 
            'max_size' => 2048  ,
            
        ));
    
        if ($this->upload->do_upload('gambar_berkas')) {
            $upload_data['gambar_berkas'] = $this->upload->data();
            
        } 

        $data = [
            'id'=> $id,
            'nama_berkas' => htmlspecialchars($this->input->post('nama_berkas')),
            'no_berkas' => htmlspecialchars($this->input->post('nomor_berkas')),
            'kategori' => $this->input->post('jenis_berkas'),
            'tgl_berkas' => $this->input->post('tgl_berkas'),
            'upload_by' => $this->input->post('upload_by'),
            'gambar_berkas' => $upload_data['gambar_berkas']['file_name'],
            'keterangan' => htmlspecialchars($this->input->post('keterangan_berkas')),
            'status' => htmlspecialchars($this->input->post('status_berkas')),
            'file_berkas' => $upload_data['file_berkas']['file_name'],
        ];

       

        $this->berkas_model->update_data($data,'berkas');

        redirect('admin/berkas');
    }

}

/* End of file berkas.php */
