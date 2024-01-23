<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class berita_model extends CI_Model {

    protected $perPage = 8;

    public function getLastNews()
	{
		$this->db->from('berita');
		$this->db->where('is_active', 'A');
		$this->db->order_by('id', 'desc');
		$this->db->limit(4);
		return $this->db->get()->result();
	}

    public function getAllNews($page)
	{
		$this->db->from('berita');
		$this->db->where('is_active', 'A');
		$this->paginate($page);
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result();
	}

    public function paginate($page){
        return  $this->db->limit($this->perPage, $this->calculateRealOffset($page));
    }

    public function calculateRealOffset($page){
        if(is_null($page) || empty($page)){
        $offset = 0;
        }else{
           $offset = ($page * $this->perPage) - $this->perPage;
        }
        
        return $offset;
    }

	public function getDataBySeo($seo_title)
	{
		return $this->db->get_where('berita', ['seo_judul' => $seo_title])->row();
	}

	public function countBerita()
   {
      $this->db->where('berita.is_active', 'A');  
      return $this->db->count_all_results('berita');
   }

    public function makePagination($baseUrl, $uriSegment, $totalRows = null){
    $this->load->library('pagination');

    $config = [
    'base_url'            => $baseUrl,
    'uri_segment'         => $uriSegment,
    'per_page'            => $this->perPage,
    'total_rows'          => $totalRows,
    'use_page_numbers'    => true,
			
	'full_tag_open'       => '<ul class="pagination justify-content-center">',
	'full_tag_close'      => '</ul>',
			
	'attributes'          => ['class' => 'page-link'],
	'first_link'          => false,
	'last_link'           => false,
	'first_tag_open'      => '<li class="page-item">',
	'first_tag_close'     => '</li>',
	'prev_link'           => '&lt',
	'prev_tag_open'       => '<li class="page-item">',
	'prev_tag_close'      => '</li>',
	'next-link'           => '&gt',
	'next_tag_open'       => '<li class="page-item">',
	'next_tag_close'      => '</li>',
	'last_tag_open'       => '<li class="page-item">',
	'last_tag_close'      => '</li>', 
	'cur_tag_open'        => '<li class="page-item active"><a href="#" class="page-link">',
	'cur_tag_close'       => '<span class="sr-only">(current)</span></a></li>',
	'num_tag_open'        => '<li class="page-item">',
	'num_tag_close'       => '</li>'
    ];

    $this->pagination->initialize($config);
    return $this->pagination->create_links();
    }


}

/* End of file berita_model.php */
