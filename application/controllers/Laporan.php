<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('Laporan_model');
	}

	public function index()
	{

		$d['arsip'] = $this->Laporan_model->tampil();

		$this->load->view('laporan/home',$d);


	}

	
	

}
