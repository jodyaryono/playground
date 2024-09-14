<?php 

class Jenis_arsip_model extends CI_Model
{
	function tampil()
	{
	return $this->db->get('jenis_arsip');
	}

	function simpan($data,$table)
	{
	return $this->db->insert($table,$data);
	}

	function hapus($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	function edit_simpan($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	
}