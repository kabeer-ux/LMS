<?php

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_m');
		$this->load->model('General_m');
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
	}

	public function index()
	{
		$this->load->view('Hod/hod_login_v');
	}
	public function index_do()
	{
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$md5pass = md5($pass); 

		$data['hod_id'] = $this->Login_m->hodlogin($user, $pass);
		$record_found = count($data['hod_id']);

		if ($record_found == 1)
		{
			$id = $data['hod_id'][0]->hod_id;
			$this->session->set_userdata('hodid', $id);
 			redirect('hod/Home');
		} else {
			echo "Invalid Username or Password";
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('hod/Login');
	}

}