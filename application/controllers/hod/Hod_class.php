<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hod_class extends CI_Controller {

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

	public function index($id=NULL, $prog_name=NULL)
	{
		global $id;
		if($prog_name == NULL) {
			$data['prog_name'] = "List of All Class"; 
		} else {
			$data['prog_name'] = $prog_name; 
		}

		if($id != NULL){
			// $data['show'] = $this->General_m->show_where($id, 'term', 'program_id'); 
		}


		// $data['showv'] = $this->General_m->show_query("SELECT c.course_id as course_id, c.name as name FROM course as c join program as p on c.system_id = p.system_id join hod as h on p.department_id = h.department_id where hod_id = $id");

		// $data['show'] = $this->General_m->show_where($id, 'term', 'hod_id');
		// $data['showv'] = $this->General_m->show_2_join_mystar($id, 'course', 'program', 'hod', 'system_id', 'department_id', 'course.name, course.course_id', 'hod_id');


		$data['show'] = $this->General_m->show('class');
		$data['show_c'] = $this->General_m->show('course');
		$data['show_ses'] = $this->General_m->show_where($id, 'session', 'hod_id');
		$data['show_term'] = $this->General_m->show_where($id, 'term', 'hod_id');
		$data['show_hod'] = $this->General_m->show_1_join($id, 'hod', 'faculty', 'faculty_id', 'hod_id');
		$data['show_pro'] = $this->General_m->show_1_join($id, 'hod', 'program', 'department_id', 'hod_id'); 
		// $data['show_ses'] = $this->General_m->show('session');

		$this->load->view('hod/class_v', $data);
	}

	public function class_add()
	{
		global $id;
		// $data['show'] = $this->General_m->show_where($id, 'term', 'hod_id');
		$data['show_term'] = $this->General_m->show_where($id, 'term', 'hod_id');
		$data['show_c'] = $this->General_m->show_2_join_mystar($id, 'course', 'program', 'hod', 'system_id', 'department_id', 'course.name, course.course_id', 'hod_id');


		// $data['show_c'] = $this->General_m->show('course');
		$data['show_ses'] = $this->General_m->show_where($id, 'session', 'hod_id');
		$data['show_hod'] = $this->General_m->show_1_join($id, 'hod', 'faculty', 'faculty_id', 'hod_id');
		$data['show_pro'] = $this->General_m->show_1_join($id, 'hod', 'program', 'department_id', 'hod_id'); 

		$this->load->view('hod/class_add_v', $data);
	}

	public function class_add_do()
	{ 
		$course_id = $this->input->post('course_id'); 
		$term_id = $this->input->post('term_id');
		$start = $this->input->post('start');
		$desc = $this->input->post('desc');

		// $this->form_validation->set_rules('name', 'Session Name', 'required');
		// $this->form_validation->set_rules('proid', 'Program', 'callback_check_depid[$proid]');
		// $this->form_validation->set_rules('sesid', 'Session', 'callback_check_sesid[$sesid]');

		// if($this->form_validation->run() == TRUE) { 
			// $name = $this->input->post('name');
			// $desc = $this->input->post('desc');

			$data = array(
					'course_id' 			=> $course_id,
					'term_id' 				=> $term_id,
					'start' 	    		=> $start,
					'active' 				=> '0',
					'complete' 				=> '0',
					'class_description' 	=> $desc
				);

			echo '<pre>';
			var_dump($data);
			echo '</pre>';

			$this->General_m->insert($data, 'class');
			redirect('hod/hod_class/index');

		// } else {
		// 	echo 'Error';
		// 	$data['show_pro'] = $this->General_m->show('program');
		// 	$data['show_sys'] = $this->General_m->show('system');
		// 	// $this->load->view('hod/hod_session', $data);
		// }
	}

	public function check_sesid($sesid)
	{
		if($sesid == 0) {
			$this->form_validation->set_message('check_sesid', 'Select the Session');
			return FALSE;
		}
	}

	public function logout()
	{
		//here work of session destroy is yet to done
		$this->session->unset_userdata('hodid');
		$this->session->sess_destroy();
		redirect('hod/Login');
	}
}


