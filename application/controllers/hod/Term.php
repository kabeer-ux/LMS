<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Term extends CI_Controller {

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

	public function index($id1=NULL, $prog_name=NULL)
	{
		global $id;
		if($prog_name == NULL) {
			$data['prog_name'] = "List of All Term"; 
		} else {
			$data['prog_name'] = $prog_name; 
		}


		// if($id1 != NULL){
		// 	// $data['show'] = $this->General_m->show_where($id, 'term', 'program_id'); 
		// $data['show_click'] = $this->General_m->show_query("SELECT term.session_id, session.session_id, session.session_name, term.hod_id, program_id FROM term inner join session on term.session_id = session.session_id where session.program_id = $id1");
		// }else{

		// }
		// $data['show_click'] = $this->General_m->show_1_join($id, 'term', 'session', 'session_id', 'hod_id'); 

		$data['show'] = $this->General_m->show_where($id, 'term', 'hod_id');
		$data['show_ses'] = $this->General_m->show_where($id, 'session', 'hod_id');
		$data['show_hod'] = $this->General_m->show_1_join($id, 'hod', 'faculty', 'faculty_id', 'hod_id');
		$data['show_pro'] = $this->General_m->show_1_join($id, 'hod', 'program', 'department_id', 'hod_id'); 


		// $data['show_c'] = $this->General_m->show_1_join($id, 'hod', 'faculty', 'faculty_id', 'hod_id');
		// $data['show_ses'] = $this->General_m->show('session');

		$this->load->view('hod/term', $data);
	}

	public function term_add_do()
	{ 
		$sesid = $this->input->post('sesid');
		$hodid = $this->input->post('hodid'); 
		$desc = $this->input->post('desc'); 
		$term_name = $this->input->post('term_name');
		$ease_name = $this->input->post('ease_name');

		// $this->form_validation->set_rules('name', 'Session Name', 'required');
		// $this->form_validation->set_rules('proid', 'Program', 'callback_check_depid[$proid]');
		// $this->form_validation->set_rules('sesid', 'Session', 'callback_check_sesid[$sesid]');

		// if($this->form_validation->run() == TRUE) { 
			// $name = $this->input->post('name');
			// $desc = $this->input->post('desc');

			$data = array(
					'session_id' 		=> $sesid,
					'hod_id' 			=> $hodid,
					'term_name' 		=> $term_name,
					'ease_name' 		=> $ease_name,
					'description' 		=> $desc
				);

			echo '<pre>';
			var_dump($data);
			echo '</pre>';

			$this->General_m->insert($data, 'term');
			redirect('hod/term/index');

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


