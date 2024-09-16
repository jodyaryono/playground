<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		if ($this->User_model->logged_id()) {
			$this->load->view("dashboard");
		} else {
			redirect("users");
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('users');
	}
}