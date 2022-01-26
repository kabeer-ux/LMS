<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hod extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('General_m');
		$this->load->library('form_validation');
	}

	public function index($id=NULL, $dep_sname=NULL)
	{
		if($dep_sname == NULL) {
			$data['dep_sname'] = "List of all HOD's"; 
		} else {
			$data['dep_sname'] = $dep_sname; 
		}

		if($id != NULL){
			$data['show_hod'] = $this->General_m->show_where($id, 'hod', 'department_id'); 
		}else{
			$data['show_hod'] = $this->General_m->show('hod'); 
		}
		
		$data['show_dep'] = $this->General_m->show('department'); 
		$data['show_fac'] = $this->General_m->show('faculty'); 
		$this->load->view('admin/hod_a', $data);
	}

	public function check_for_facid($value)
	{
		if($value == 0) {
			$this->form_validation->set_message('check_for_program', 'Select the program');
			return FALSE;
		}
	}

	public function hod_add()
	{	 
		$faculty_id = $this->input->post('facid');
		$message = $this->input->post('message');
		$start_date = $this->input->post('start_date');
		$pass = 'hod123'; 
		$password = md5($pass);

		echo 'Faculty Id: '.$faculty_id.'<br>';

		$this->form_validation->set_rules('facid', 'Faculty', 'callback_check_for_facid['.$faculty_id.']');
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');

		if ($this->form_validation->run() == FALSE) { 
			$this->load->view('admin/hod_a', $data);
			echo 'Form Validation Error';
        }else{
    		$this->db->select('department_id');
			$this->db->from('faculty');
			$this->db->where('faculty.faculty_id', $faculty_id);

			$rslt = $this->db->get()->result();

			foreach($rslt as $rslt_a){
				$this->db->select('department_id');
				$this->db->from('hod');
				$this->db->where('hod.department_id', $rslt_a->department_id);
				$this->db->where('hod.end_date', 'NULL'); 
 
				$rslt1 = $this->db->get()->result();

	        	if ($rslt1 == $rslt) {
					redirect('admin/HOD/index');
	        	}else{
			        $data = array( 
						'faculty_id' 	=> $faculty_id,
						'department_id' => $rslt_a->department_id,
						'start' 		=> $start_date,
						'message'		=> $message, 
						'end_date'		=> 'NULL', 
						'password' 		=> $password,
					); 

					$this->General_m->insert($data, 'hod'); 
					redirect('admin/HOD/index');
	        	} // End Else
	        } // End Foreach 
		} // Validation Else End
	}




}