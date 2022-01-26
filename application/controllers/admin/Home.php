<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		//$this->load->model('admin/General_m');
	}

	public function index()
	{
		$this->load->view('admin/home_a');
	}

	public function logout()
	{
		//here work of session destroy is yet to done
		redirect('Login');
	}
}
