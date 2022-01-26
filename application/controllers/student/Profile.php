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
		$cdata['show'] = $this->General_m->show_where($id, 'student', 'student_id');
		$cdata['show_en'] = $this->General_m->show_where($id, 'stu_enroll', 'student_id');
		$cdata['city'] = $this->General_m->show('city');
		$cdata['prog'] = $this->General_m->show('program');
		// $cdata['stu_en'] = $this->General_m->show('stu_enroll');
		// $cdata['prog'] = $this->General_m->show_1_join($id, 'student','program', 'program_id', 'program.name as program', 'program_id');

		// echo "<pre>";
		// var_dump($cdata['prog']);

		$this->load->view('student/profile_f', $cdata);
	}
}