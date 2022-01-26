<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('General_m');
		$this->load->library('session');

		global $id;
		$id = $this->session->userdata('hodid');
		if( isset($id) == NULL ) {
			redirect('Hod/Login/index');
		}
	}

	public function index()
	{
		global $id;
		// $cdata['show_hod'] = $this->General_m->show_where($id, 'hod', 'hod_id');
		$cdata['show_hod'] = $this->General_m->show_1_join($id, 'hod', 'faculty', 'faculty_id', 'hod_id');
		$this->load->view('hod/home_f', $cdata);
	}

	public function logout()
	{
		//here work of session destroy is yet to done
		$this->session->unset_userdata('hodid');
		$this->session->sess_destroy();
		redirect('hod/Login');
	}
}
