<?php

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
	}

	public function index()
	{
		$this->load->view('admin/admin_login_v');
	}
	public function index_do()
	{
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$md5pass = md5($pass);

		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username', $user);
		$this->db->where('password', $md5pass);

		// $rslt1 = $this->db->get();
		// echo "<pre>";
		// var_dump($rslt1);

		$rslt = $this->db->get()->num_rows();


		if ($rslt == 1) {
			redirect('admin/Home');
		} else {
			redirect('admin/Login');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/Login');
	}

}