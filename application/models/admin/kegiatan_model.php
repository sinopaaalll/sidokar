<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class kegiatan_model extends CI_Model {

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table,$data);
    }

    public function update_data($data,$table)
    {
        $this->db->where('id_kegiatan',$data['id_kegiatan']);
        $this->db->update($table, $data);
    }
    public function delete($data,$table)
	{
        $this->db->where('id_kegiatan',$data['id_kegiatan']);
		$this->db->delete($table, $data);
	}
   
}

/* End of file kegiatan_model.php */
