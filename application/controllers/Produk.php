<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Produk_model');
	}

	public function index()
	{

		$d['produk'] = $this->Produk_model->tampil();

		$this->load->view('produk/home', $d);
	}

	public function tambah()
	{
		$d['kategori'] = $this->db->query("SELECT * FROM kategori");
		$this->load->view('produk/tambah', $d);
	}

	public function simpan()
	{

		$nama_produk = $this->input->post('nama_produk');
		$id_kategori = $this->input->post('id_kategori');
		$harga = $this->input->post('harga');

		//$tgl_produk = $this->input->post('tgl_produk');

		//upload photo
		$config['max_size'] = 2048;
		$config['allowed_types'] = "png|jpg|jpeg|gif|pdf";
		$config['remove_spaces'] = TRUE;
		$config['overwrite'] = TRUE;
		$config['upload_path'] = FCPATH . 'file';

		$this->load->library('upload');
		$this->upload->initialize($config);

		//ambil data image
		$this->upload->do_upload('userfile');
		$data_image = $this->upload->data('file_name');
		$location = base_url() . 'file/';
		$pict = $location . $data_image;

		$data = array(
			'nama_produk' => $nama_produk,
			'id_kategori' => $id_kategori,
			'harga' => $harga,
			'foto' => $pict
		);

		$this->Produk_model->simpan($data, 'produk');

		redirect('produk');
	}

	public function edit($id_produk)
	{
		$where = array('id_produk' => $id_produk);

		$d['kategori'] = $this->db->query("SELECT * FROM kategori");

		$d['produk'] = $this->Produk_model->edit_data($where, 'produk');

		$this->load->view('produk/ubah', $d);
	}

	public function simpan_ubah()
	{
		$id_produk = $this->input->post('id_produk');
		$nama_produk = $this->input->post('nama_produk');
		$id_kategori = $this->input->post('id_kategori');
		$tgl_produk = $this->input->post('tgl_produk');
		//$foto = $this->input->post('foto');

		//upload photo
		$config['max_size'] = 2048;
		$config['allowed_types'] = "png|jpg|jpeg|gif|pdf";
		$config['remove_spaces'] = TRUE;
		$config['overwrite'] = TRUE;
		$config['upload_path'] = FCPATH . 'file';

		$this->load->library('upload');
		$this->upload->initialize($config);

		//ambil data image
		$this->upload->do_upload('userfile');
		$data_image = $this->upload->data('file_name');
		$location = base_url() . 'file/';
		$pict = $location . $data_image;

		$data = array(
			'id_produk' => $id_produk,
			'nama_produk' => $nama_produk,
			'id_kategori' => $id_kategori,
			'tgl_produk' => $tgl_produk,
			'foto' => $pict
		);

		$where = array('id_produk' => $id_produk);

		$this->Produk_model->edit_simpan($where, $data, 'produk');

		redirect('produk');
	}

	public function hapus($id_produk)
	{

		$where = array('id_produk' => $id_produk);

		$this->Produk_model->hapus($where, 'produk');

		redirect('produk');
	}
}