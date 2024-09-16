<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');

		$this->load->model('User_model');
	}

	public function login()
	{

		if ($this->User_model->logged_id()) {

			redirect("dashboard");
		} else {
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
			    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

			if ($this->form_validation->run() == TRUE) {
				// echo ("masuk");
				// die;

				$username = $this->input->post("username", TRUE);
				$password = MD5($this->input->post('password', TRUE));

				$checking = $this->User_model->check_login('users', array('username' => $username), array('password' => $password));

				if ($checking != FALSE) {
					foreach ($checking as $apps) {

						$session_data = array(
							'user_id'   => $apps->id,
							'user_name' => $apps->username,
							'user_pass' => $apps->password
						);

						$this->session->set_userdata($session_data);

						redirect('dashboard/');
					}
				} else {

					$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	                	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
					$this->load->view('users/login', $data);
				}
			} else {
				echo ("woy");
				//die;
				$this->load->view('users/login');
			}
		}
	}
}