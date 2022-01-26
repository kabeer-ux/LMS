<?php

/**
 * 
 */
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('General_m');
		$this->load->library('session');

		$actor =  $this->session->userdata('actor');
		global $id;
		$id = $this->session->userdata('id');
		if( isset($id) == NULL ) {
			redirect('Login/index');
		}
	}

	public function index()
	{
		global $id;
		$cdata['show'] = $this->General_m->show_where($id, 'faculty', 'faculty_id');

		$this->load->view('Faculty/home_f', $cdata);
	}

	public function logout()
	{
		$this->session->unset_userdata('actor');
		$this->session->unset_userdata('id');
		$this->session->sess_destroy();
		redirect('Login/index');
	}
}