<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_arsip extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Jenis_arsip_model');
	}
	public function index()
	{
		$data['jenis_arsip'] = $this->Jenis_arsip_model->tampil();
		$this->load->view('jenis_arsip/home', $data);
	}

	function tambah()
	{
		$this->load->view('jenis_arsip/tambah');
	}

	function simpan()
	{
		$jenis_arsip = $this->input->post('jenis_arsip');
		$data = array('jenis_arsip' => $jenis_arsip);
		$this->Jenis_arsip_model->simpan($data, 'jenis_arsip');
		redirect('jenis_arsip');
	}

	function hapus($id_jenis_arsip)
	{
		$where = array('id_jenis_arsip' => $id_jenis_arsip);
		$this->Jenis_arsip_model->hapus($where, 'jenis_arsip');
		redirect('jenis_arsip');
	}

	function edit($id_jenis_arsip)
	{
		$where = array('id_jenis_arsip' => $id_jenis_arsip);
		$data['jenis_arsip'] = $this->Jenis_arsip_model->edit_data($where, 'jenis_arsip');
		$this->load->view('jenis_arsip/ubah', $data);
	}

	public function simpan_ubah()
	{
		$id_jenis_arsip = $this->input->post('id_jenis_arsip');
		$jenis_arsip = $this->input->post('jenis_arsip');

		$data = array(
			'id_jenis_arsip' => $id_jenis_arsip,
			'jenis_arsip' => $jenis_arsip
		);

		$where = array('id_jenis_arsip' => $id_jenis_arsip);
		$this->Jenis_arsip_model->edit_simpan($where, $data, 'jenis_arsip');
		redirect('jenis_arsip');
	}
}
