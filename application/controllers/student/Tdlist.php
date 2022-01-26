<?php
/**
 * 
 */
class Tdlist extends CI_Controller
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
		$cdata['show'] = $this->General_m->show_where($id, 'student', 'student_id');
		$this->load->view('student/tdlist_f', $cdata);
	}
}