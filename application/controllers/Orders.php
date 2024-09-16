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
		//echo $this->db->last_query();
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
		$id_order = $this->input->post('id_order');


		$data = array(
			'customer' => $customer,
			'tgl_order' => $tgl_order,
		);

		if ($id_order > 0) {
			//edit
			$where = array('id_order' => $id_order);
			$this->Orders_model->edit_simpan($where, $data, 'orders');
		} else {
			//simpan
			$this->Orders_model->simpan($data, 'orders');
			$id_order = $this->db->insert_id();
		}

		redirect('orders/detail/' . $id_order);
	}

	public function edit($id_order)
	{
		$where = array('id_order' => $id_order);

		$d['kategori'] = $this->db->query("SELECT * FROM kategori");
		$d['header'] = $this->Orders_model->get_header($id_order)->row_array();

		$d['order'] = $this->Orders_model->edit_data($where, 'orders');

		$d['id_order'] = $id_order;

		$this->load->view('orders/tambah', $d);
	}


	public function hapus($id_order)
	{

		$where = array('id_order' => $id_order);

		$this->Orders_model->hapus($where, 'order');

		redirect('orders');
	}
	public function hapus_detail($id_order, $id_order_detail)
	{

		$where = array('id_order_detail' => $id_order_detail);

		$this->Orders_model->hapus($where, 'order_details');

		redirect('orders/detail/' . $id_order);
	}
}