<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('Arsip_model');
	}

	public function index()
	{

		$d['arsip'] = $this->Arsip_model->tampil();
		$this->load->view('arsip/home',$d);

	}

	public function tambah()
	{
		$d['kategori'] = $this->db->query("SELECT * FROM kategori");
		$this->load->view('arsip/tambah',$d);
	}

	public function simpan()
	{
		
		$nama_arsip = $this->input->post('nama_arsip');
		$id_kategori = $this->input->post('id_kategori');
		$tgl_arsip = $this->input->post('tgl_arsip');
		
		//upload photo
		$config['max_size']=2048;
		$config['allowed_types']="png|jpg|jpeg|gif|pdf";
		$config['remove_spaces']=TRUE;
		$config['overwrite']=TRUE;
		$config['upload_path']=FCPATH.'file';

		$this->load->library('upload');
		$this->upload->initialize($config);

		//ambil data image
		$this->upload->do_upload('userfile');
		$data_image=$this->upload->data('file_name');
		$location=base_url().'file/';
		$pict=$location.$data_image;

		$data = array(
				'nama_arsip' => $nama_arsip,
				'id_kategori' => $id_kategori,
				'tgl_arsip' => $tgl_arsip,
				'foto' => $pict
			);

		$this->Arsip_model->simpan($data,'arsip');

		redirect('arsip');
	}

	public function edit($id_arsip)
	{
	    $where = array('id_arsip' => $id_arsip);

	    $d['kategori'] = $this->db->query("SELECT * FROM kategori");

		$d['arsip'] = $this->Arsip_model->edit_data($where,'arsip');

	    $this->load->view('arsip/ubah',$d);
	}

	public function simpan_ubah()
	{
		$id_arsip = $this->input->post('id_arsip');
		$nama_arsip = $this->input->post('nama_arsip');
		$id_kategori = $this->input->post('id_kategori');
		$tgl_arsip = $this->input->post('tgl_arsip');
		//$foto = $this->input->post('foto');
		
		//upload photo
		$config['max_size']=2048;
		$config['allowed_types']="png|jpg|jpeg|gif|pdf";
		$config['remove_spaces']=TRUE;
		$config['overwrite']=TRUE;
		$config['upload_path']=FCPATH.'file';

		$this->load->library('upload');
		$this->upload->initialize($config);

		//ambil data image
		$this->upload->do_upload('userfile');
		$data_image=$this->upload->data('file_name');
		$location=base_url().'file/';
		$pict=$location.$data_image;

		$data = array(
				'id_arsip' => $id_arsip,
				'nama_arsip' => $nama_arsip,
				'id_kategori' => $id_kategori,
				'tgl_arsip' => $tgl_arsip,
				'foto' => $pict
			);

		$where = array('id_arsip' => $id_arsip);

		$this->Arsip_model->edit_simpan($where,$data,'arsip');

		redirect('arsip');
	}

	public function hapus($id_arsip)
	{

		$where = array('id_arsip' => $id_arsip);

		$this->Arsip_model->hapus($where,'arsip');

		redirect('arsip');
	}
}