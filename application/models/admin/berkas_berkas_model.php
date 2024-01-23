<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class berkas_berkas_model extends CI_Model {

    public function get_data($data,$table)
    {
        $this->db->where('id_kegiatan',$data['id_kegiatan']);
        return $this->db->get($table);
    }
    public function get_judul($data,$table){
		return $this->db->get_where($table, ['id_kegiatan' => $data['id_kegiatan'] ])->row();
	}

    public function insert_data($data, $table)
    {
        $this->db->insert($table,$data);
    }

    public function update_data($data,$table)
    {
        $this->db->where('id_berkas',$data['id_berkas']);
        $this->db->update($table, $data);
    }

    public function delete($data,$table)
	{
        $this->db->where('id_berkas',$data['id_berkas']);
		$this->db->delete($table, $data);
	}

    public function get_emails($data,$table) {
        $this->db->where('role',$data['role']);
        $query = $this->db->get($table);
        return $query->result_array();
    }
    
    public function upload_dok($data,$table)
    {
        $this->db->where('id_berkas',$data['id_berkas']);
        $this->db->update($table, $data);
    }

    public function get_status_upload($data,$table)
    {
        $q = $this->db->get_where($table,['id_berkas' => $data['id_berkas'] ]);
        return $q->row();
    }

    public function getfile($data,$table)
    {
        $this->db->where('id_berkas',$data['id_berkas']);
        return $this->db->get($table);
    }

    public function downloaddok($data,$table)
	{
		$query = $this->db->get_where($table, array('id_berkas' => $data['id_berkas']));
		return $query->row_array();
	}


}

/* End of file berkas_berkas_model.php */
