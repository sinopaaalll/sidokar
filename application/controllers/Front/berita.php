<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class berita extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('front/berita_model');
        $this->load->helper('text');
    }

    public function index()
    {
        $data['title'] = 'Berita';
        $data['berita']	= $this->berita_model->getLastNews();
        $data['total_rows']  = $this->berita_model->countBerita();
      	$data['pagination']  = $this->berita_model->makePagination(base_url('front/blog'), 2, $data['total_rows']);
        $data['page'] = 'berita/blog';
        $this->load->view('layouts/front/header', $data);
        $this->load->view('layouts/front/navbar', $data);
        $this->load->view('front/berita');
        $this->load->view('layouts/front/footer');
    }

    public function baca($seo_title)
	{
		$berita = $this->berita_model->getDataBySeo($seo_title);

		if($berita){
			$data['title']		= 'Berita';
			$data['page']		= 'berita/blog-detail';
			$data['berita']	= $berita;

            $this->load->view('layouts/front/header', $data);
            $this->load->view('layouts/front/navbar', $data);
            $this->load->view('front/blog-detail', $data);
            $this->load->view('layouts/front/footer');
		}else{
			redirect(base_url('home/index'));
		}

	}

}

/* End of file berita.php */
