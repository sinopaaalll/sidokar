<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class berkas_berkas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/berkas_berkas_model');

        require APPPATH . 'libraries/phpmailer/src/Exception.php';
        require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer/src/SMTP.php';
    }

    public function index($id_kegiatan)
    {
        $data['menu'] = 'Halaman';
        $data['title'] = 'Kegiatan  / Berkas';
        $data['id_kegiatan'] = $id_kegiatan;

        $data['list_bidang'] = $this->db->get('bidang')->result();
        $data['kegiatan'] = $this->berkas_berkas_model->get_judul($data,'kegiatan');
        $data['berkas_berkas'] = $this->berkas_berkas_model->get_data($data,'berkas_berkas')->result();

        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar', $data);
        $this->load->view('admin/berkas_berkas',$data);
        $this->load->view('layouts/admin/footer');

        
    }

    public function tambah($id_kegiatan)
    {   
        $data['status_upload'] = 'Belum Upload';
        $data['status_confirm'] = 'Belum Konfirmasi';


        $data = [
            'id_kegiatan' => $id_kegiatan,
            'item_berkas' => htmlspecialchars($this->input->post('item_berkas')),
            'no_berkas' => htmlspecialchars($this->input->post('no_berkas')),
            'jenis_berkas' => htmlspecialchars($this->input->post('jenis_berkas')),
            'tgl_berkas' => $this->input->post('tgl_berkas'),
            'keterangan' => htmlspecialchars($this->input->post('keterangan_berkas')),
            'file_berkas' => null,
            'status_upload' => $data['status_upload'], 
            'status_confirm' => $data['status_confirm']
        ];

        $this->berkas_berkas_model->insert_data($data,'berkas_berkas');
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('admin/berkas_berkas/index/'.$id_kegiatan);
        
    }

    public function edit($id_kegiatan,$id_berkas)
    {   
        $data['id_berkas'] = $id_berkas;

        $data = [
            'id_berkas' => $data['id_berkas'],
            'id_kegiatan' => $id_kegiatan,
            'item_berkas' => htmlspecialchars($this->input->post('item_berkas')),
            'no_berkas' => htmlspecialchars($this->input->post('no_berkas')),
            'jenis_berkas' => htmlspecialchars($this->input->post('jenis_berkas')),
            'tgl_berkas' => $this->input->post('tgl_berkas'),
            'keterangan' => htmlspecialchars($this->input->post('keterangan_berkas')),
        ];

        $this->berkas_berkas_model->update_data($data,'berkas_berkas');
        $this->session->set_flashdata('success', 'Data berhasil diedit');
        redirect('admin/berkas_berkas/index/'.$id_kegiatan);
        
    }


    public function hapus($id_kegiatan,$id_berkas)
	{
		$data['id_berkas'] = $id_berkas;

		$this->berkas_berkas_model->delete($data,'berkas_berkas');
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/berkas_berkas/index/'.$id_kegiatan);    
	}

    public function uploaddok($id_kegiatan,$id_berkas)
    {   
        $this->load->library('upload');
        
        $upload_data = array();

        $this->upload->initialize(array(
            'allowed_types' => 'pdf|doc|docx|xls|xlsx',
            'upload_path'   => './uploads/',
            'encrypt_name'  => FALSE, 
            'max_size' => 51200 
        ));
    
        if ($this->upload->do_upload('file_berkas')) {
            $upload_data['file_berkas'] = $this->upload->data();
        }

        $data['status_upload_s'] = 'Terupload';
        
        $data['id_berkas'] = $id_berkas;

        $data =[
            'id_berkas' => $data['id_berkas'],
            'upload_by' => $this->input->post('upload_by'),
            'status_upload' => $data['status_upload_s'],
            'file_berkas' => $upload_data['file_berkas']['file_name'],
        ];

        $this->berkas_berkas_model->upload_dok($data,'berkas_berkas');


        $data['status_cek_upload'] = $this->berkas_berkas_model->get_status_upload($data,'berkas_berkas');
        $cekstatusupload = $this->berkas_berkas_model->get_status_upload($data,'berkas_berkas');

        if ($cekstatusupload->file_berkas==null){
            $data['status_upload_g'] = 'Belum Upload';
            $data =[
                'id_berkas' => $data['id_berkas'],
                'upload_by' => '',
                'status_upload' => $data['status_upload_g'],
            ];
            $this->berkas_berkas_model->upload_dok($data,'berkas_berkas');
        }

        $this->session->set_flashdata('success', 'Data berhasil diupload');
        redirect('admin/berkas_berkas/index/'.$id_kegiatan);
    }

    public function send_mail($id_kegiatan,$id_berkas)
    {
        $data['role'] = 'Kepala';
        $data['emails'] = $this->berkas_berkas_model->get_emails($data,'admin');  

        $response = false;
        $mail = new PHPMailer();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
        $mail->SMTPAuth = true;
        $mail->Username = 'bisiksetan666@gmail.com'; // user email
        $mail->Password = 'jkmgryginxlpcyzt'; // password email
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->Timeout = 60; // timeout pengiriman (dalam detik)
        $mail->SMTPKeepAlive = true;

        $mail->setFrom('bisiksetan666@gmail.com', ''); // user email
        $mail->addReplyTo('bisiksetan666@gmail.com', ''); //user email

        foreach ($data['emails'] as $email) {
            $to = $email['email'];
            $mail->addAddress($to); //email tujuan pengiriman email

            $mail->Subject = 'Sidokar Notifikasi'; //subject email

            $mail->isHTML(true);

            // Email body content
            $mailContent = "<h1>SIDOKAR</h1>
                        <p>Ada Berkas yang perlu dikonfirmasi di SIDOKAR</p>"; // isi email
            $mail->Body = $mailContent;
            
            $mail->send();
        }


        redirect('admin/berkas_berkas/index/'.$id_kegiatan);
    }

    public function hapusdok($id_kegiatan,$id_berkas)
    {   
        
        $file = $this->db->get_where('berkas_berkas', ['id_berkas' => $id_berkas])->row_array()['file_berkas'];
        $path = './uploads/' . $file;
        if (file_exists($path)) {
            unlink($path);
        }

        $data['status_upload_g'] = 'Belum Upload';
        $data['id_berkas'] = $id_berkas;

        $data =[
            'id_berkas' => $data['id_berkas'],
            'upload_by' => '',
            'status_upload' => $data['status_upload_g'],
            'file_berkas' => null,
        ];

        $this->berkas_berkas_model->upload_dok($data,'berkas_berkas');
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('admin/berkas_berkas/index/'.$id_kegiatan);
    }

    public function downloaddok($id_kegiatan,$id_berkas)
    {
        $data['id_berkas'] = $id_berkas;

        $fileinfo = $this->berkas_berkas_model->downloaddok($data,'berkas_berkas');

        force_download('./uploads/' . $fileinfo['file_berkas'], NULL);
        $this->session->set_flashdata('success', 'Data berhasil didownload');
        redirect('admin/berkas_berkas/index/'.$id_kegiatan);
    }

    public function uploadpic($id_kegiatan,$id_berkas)
    {
        $this->load->library('upload');

        $upload_data = array();

        $this->upload->initialize(array(
            'allowed_types' => 'jpg|jpeg|png',
            'upload_path'   => './uploads/',
            'encrypt_name'  => TRUE,     
            'max_size' => 2048 
        ));
    
        if ($this->upload->do_upload('file_berkas')) {
            $upload_data['file_berkas'] = $this->upload->data();
        }

        $data['status_upload_s'] = 'Terupload';
        
        $data['id_berkas'] = $id_berkas;

        $data =[
            'id_berkas' => $data['id_berkas'],
            'upload_by' => $this->input->post('upload_by'),
            'status_upload' => $data['status_upload_s'],
            'file_berkas' => $upload_data['file_berkas']['file_name'],
        ];

        $this->berkas_berkas_model->upload_dok($data,'berkas_berkas');


        $data['status_cek_upload'] = $this->berkas_berkas_model->get_status_upload($data,'berkas_berkas');
        $cekstatusupload = $this->berkas_berkas_model->get_status_upload($data,'berkas_berkas');

        if ($cekstatusupload->file_berkas==null){
            $data['status_upload_g'] = 'Belum Upload';
            $data =[
                'id_berkas' => $data['id_berkas'],
                'upload_by' => '',
                'status_upload' => $data['status_upload_g'],
            ];
            $this->berkas_berkas_model->upload_dok($data,'berkas_berkas');
        }

        $this->session->set_flashdata('success', 'Data berhasil diupload');
        redirect('admin/berkas_berkas/index/'.$id_kegiatan);
    }

    public function confirm($id_kegiatan,$id_berkas)
    {
        $data['sudah_konfirmasi'] = 'Sudah Konfirmasi';
        $data['id_berkas'] = $id_berkas;

        $data =[
            'id_berkas' => $data['id_berkas'],
            'status_confirm' => $data['sudah_konfirmasi'],
        ];


        $this->berkas_berkas_model->upload_dok($data,'berkas_berkas');
        $this->session->set_flashdata('success', 'Data Dikonfirmasi');
        redirect('admin/berkas_berkas/index/'.$id_kegiatan);
    }

    public function batalconfirm($id_kegiatan,$id_berkas)
    {
        $data['batal_konfirmasi'] = 'Belum Konfirmasi';
        $data['id_berkas'] = $id_berkas;

        $data =[
            'id_berkas' => $data['id_berkas'],
            'status_confirm' => $data['batal_konfirmasi'],
        ];


        $this->berkas_berkas_model->upload_dok($data,'berkas_berkas');
        $this->session->set_flashdata('success', 'Data Batal Dikonfirmasi');
        redirect('admin/berkas_berkas/index/'.$id_kegiatan);
    }

}

/* End of file berkas_berkas.php */
