<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_model');
	}
	
	public function index()
	{
		$data['kategori'] = $this->Kategori_model->tampil();
		$this->load->view('kategori/home',$data);
	}

	function tambah()
	{
		$this->load->view('kategori/tambah');	
	}

    function simpan()
    {
    	$kategori = $this->input->post('kategori');
    	$data = array('kategori' => $kategori);
    	$this->Kategori_model->simpan($data,'kategori');
    	redirect('kategori');

	}

	function hapus($id_kategori)
	{
		$where = array('id_kategori' => $id_kategori);
		$this->Kategori_model->hapus($where, 'kategori');
		redirect('kategori');
	}

	function edit($id_kategori)
	{
		$where = array('id_kategori' => $id_kategori);
		$data['kategori'] = $this->Kategori_model->edit_data($where, 'kategori');
		$this->load->view('kategori/ubah',$data); 
	}

	public function simpan_ubah()
	{
		$id_kategori = $this->input->post('id_kategori');
		$kategori = $this->input->post('kategori');

		$data = array(
			'id_kategori' => $id_kategori,
			'kategori' => $kategori
		); 

		$where = array('id_kategori' => $id_kategori);
		$this->Kategori_model->edit_simpan($where,$data,'kategori');
		redirect('kategori');
	}
}