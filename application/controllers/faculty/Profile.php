<?php
/**
 * 
 */
class Profile extends CI_Controller
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
		//show_1_join($id, $tbl_name_1, $tbl_name_2, $key, $where)
		global $id;
		$cdata['show'] = $this->General_m->show_where($id, 'faculty', 'faculty_id');
		$cdata['dep'] = $this->General_m->show_1_join_mystar($id, 'faculty','department', 'department_id', 'department.name as depname', 'faculty_id');

		// echo "<pre>";
		// var_dump($cdata['dep']);

		$this->load->view('Faculty/profile_f', $cdata);
	}
}