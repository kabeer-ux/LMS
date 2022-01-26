<?php
/**
 * 
 */
class Announcement extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('General_m');
		$this->load->model('faculty/Faculty_m');
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
		$cdata['announce'] = $this->Faculty_m->show_announcement();
		// echo "<pre>";
		// var_dump($cdata['announce']);
		
		$this->load->view('Faculty/announce_f', $cdata);
	}

}