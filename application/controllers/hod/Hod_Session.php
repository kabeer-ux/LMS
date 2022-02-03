<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hod_Session extends CI_Controller {

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
			$data['prog_name'] = "List of All Session"; 
		} else {
			$data['prog_name'] = $prog_name; 
		}

		if($id1 != NULL){
			// echo 'if';
			$data['show'] = $this->General_m->show_where($id1, 'session', 'program_id'); 
		}else{
			// echo 'else';
			$data['show'] = $this->General_m->show_where($id, 'session', 'hod_id'); 
		}

		// $data['show_pro'] = $this->General_m->show_where($id, 'program', 'department_id');
		$data['show_sys'] = $this->General_m->show('system');
		$data['show_hod'] = $this->General_m->show_1_join($id, 'hod', 'faculty', 'faculty_id', 'hod_id'); 
		$data['show_pro'] = $this->General_m->show_1_join($id, 'hod', 'program', 'department_id', 'hod_id');

		$this->load->view('hod/hod_session', $data); 
	}	

	public function session_add_do()
	{ 
		$proid = $this->input->post('proid');
		$sysid = $this->input->post('sysid');
		$hodid = $this->input->post('hodid');
		$name = $this->input->post('name');
		$desc = $this->input->post('desc');

		// $this->form_validation->set_rules('name', 'Session Name', 'required');
		// $this->form_validation->set_rules('proid', 'Program', 'callback_check_depid[$proid]');
		// $this->form_validation->set_rules('sysid', 'System', 'callback_check_sysid[$sysid]');

		// if($this->form_validation->run() == TRUE) { 
			// $name = $this->input->post('name');
			// $desc = $this->input->post('desc');

			$data = array(
					'program_id' 		=> $proid,
					'system_id' 		=> $sysid,
					'hod_id' 			=> $hodid,
					'session_name' 		=> $name,
					'description' 		=> $desc
				);

			echo '<pre>';
			var_dump($data);
			echo '</pre>';

			$this->General_m->insert($data, 'session');
			redirect('hod/Hod_Session/index');

		// } else {
		// 	echo 'Error';
		// 	$data['show_pro'] = $this->General_m->show('program');
		// 	$data['show_sys'] = $this->General_m->show('system');
		// 	// $this->load->view('hod/hod_session', $data);
		// }
	}

	public function check_proid($proid)
	{
		if($proid == 0) {
			$this->form_validation->set_message('check_proid', 'Select the Program');
			return FALSE;
		}
	}

	public function check_sysid($sysid)
	{
		if($sysid == 0) {
			$this->form_validation->set_message('check_sysid', 'Select the System');
			return FALSE;
		}
	}

	public function session_edit($id1)
	{	
		global $id;
		$data['show'] = $this->General_m->show_where($id1,'session','session_id');
		$data['show_sys'] = $this->General_m->show('system');
		$data['show_hod'] = $this->General_m->show_1_join($id, 'hod', 'faculty', 'faculty_id', 'hod_id'); 
		$data['show_pro'] = $this->General_m->show_1_join($id1, 'session', 'program', 'program_id', 'session_id'); 
		// $data['show_pro'] = $this->General_m->show_1_join($id, 'hod', 'program', 'department_id', 'hod_id'); 
		$this->load->view('hod/hod_session_edit_v',$data);
	}

	public function session_update_do($id)
	{ 
		$proid = $this->input->post('proid');
		$sysid = $this->input->post('sysid');
		$hodid = $this->input->post('hodid');
		$name = $this->input->post('name');
		$desc = $this->input->post('desc');

		$data = array(
				'program_id' 		=> $proid,
				'system_id' 		=> $sysid,
				'hod_id' 			=> $hodid,
				'session_name' 		=> $name,
				'description' 		=> $desc
			);

		echo '<pre>';
		var_dump($data);
		echo '</pre>';

		$this->General_m->update($id, $data, 'session', 'session_id');
		redirect('hod/Hod_Session/index');
	}

	public function logout()
	{
		//here work of session destroy is yet to done
		$this->session->unset_userdata('hodid');
		$this->session->sess_destroy();
		redirect('hod/Login');
	}
}

