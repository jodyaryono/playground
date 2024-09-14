<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Orders_model');
		$this->load->helper('url');
		$this->load->model('Produk_model');
	}

	public function tambah_edit_detail()
	{
		$id_order = $this->input->post('id_order');
		$id_produk = $this->input->post('produk');
		$qty = $this->input->post('qty');
		$harga = $this->input->post('harga');

		$data = array(
			'id_order' => $id_order,
			'id_produk' => $id_produk,
			'qty' => $qty,
			'harga' => $harga
		);

		$this->Orders_model->simpan_detail($data, 'order_details');
		redirect('orders/detail/' . $id_order);
	}

	public function index()
	{

		$d['order'] = $this->Orders_model->tampil();

		$this->load->view('orders/home', $d);
	}
	public function detail($id)
	{

		$d['detail'] = $this->Orders_model->detail_tampil($id)->result_array();
		$d['header'] = $this->Orders_model->get_header($id)->row_array();
		$produk = $this->Produk_model->tampil();
		$d['opsi_produk'] = "<option value='0'>-Pilih Produk-</option>";
		foreach ($produk->result_array() as $p) {
			// option value = id_produk, data-harga = harga
			$d['opsi_produk'] .= "<option value='" . $p['id_produk'] . "' data-harga='" . $p['harga'] . "'>" . $p['nama_produk'] . "</option>";
		}

		$d['id_order'] = $id;
		$this->load->view('orders/detail', $d);
	}

	public function tambah($id_order = 0)
	{
		$d['kategori'] = $this->db->query("SELECT * FROM kategori");
		$d['id_order'] = $id_order;
		$this->load->view('orders/tambah', $d);
	}

	public function simpan()
	{

		$customer = $this->input->post('customer');
		$tgl_order = $this->input->post('tgl_order');

		$data = array(
			'customer' => $customer,
			'tgl_order' => $tgl_order,
		);

		$this->Orders_model->simpan($data, 'orders');
		redirect('orders/detail/' . $this->db->insert_id());
	}

	public function edit($id_order)
	{
		$where = array('id_order' => $id_order);

		$d['kategori'] = $this->db->query("SELECT * FROM kategori");

		$d['order'] = $this->Orders_model->edit_data($where, 'order');

		$this->load->view('orders/ubah', $d);
	}

	public function simpan_ubah()
	{
		$id_order = $this->input->post('id_order');
		$nama_order = $this->input->post('nama_order');
		$id_kategori = $this->input->post('id_kategori');
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
			'id_order' => $id_order,
			'nama_order' => $nama_order,
			'id_kategori' => $id_kategori,
			'tgl_order' => $tgl_order,
			'foto' => $pict
		);

		$where = array('id_order' => $id_order);

		$this->Orders_model->edit_simpan($where, $data, 'order');

		redirect('orders');
	}

	public function hapus($id_order)
	{

		$where = array('id_order' => $id_order);

		$this->Orders_model->hapus($where, 'order');

		redirect('orders');
	}
}