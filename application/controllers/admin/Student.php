<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('General_m');
		$this->load->library('form_validation');
	}

	public function index($id=NULL, $prog_name=NULL)
	{
		if($prog_name == NULL) {
			$data['prog_name'] = "List of All Students"; 
		} else {
			$data['prog_name'] = $prog_name; 
		}
		if($id == NULL) {
			$data['show'] = $this->General_m->show('student');
			$data['city'] = $this->General_m->show('city');
		} else {
			$data['show'] = $this->General_m->show_2_join($id, 'student', 'stu_enroll', 'student_id', 'program_id');
			$data['city'] = $this->General_m->show('city');
		}
		
		$data['prog'] = $this->General_m->show('program');
		$this->load->view('admin/stu_a', $data);
	}

	public function stu_add()
	{
		$data['prog'] = $this->General_m->show('program');
		$data['city'] = $this->General_m->show('city');
		$this->load->view('admin/stu_add_a', $data);
	}

	public function check_for_program($value)
	{
		if($value == 0) {
			$this->form_validation->set_message('check_for_program', 'Select the program');
			return FALSE;
		}
	}

	public function check_for_city($value)
	{
		if($value == 0) {
			$this->form_validation->set_message('check_for_city', 'Select the city');
			return FALSE;
		}
	}

	public function stu_add_do()
	{ 
		$program_id = $this->input->post('program_id');
		$fname = $this->input->post('first_name');
		$lname = $this->input->post('last_name');
		$faname = $this->input->post('father_name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$whatsapp = $this->input->post('whatsapp');
		$address = $this->input->post('address');
		$city_id = $this->input->post('city_id');
		$password = md5($email);

		$this->form_validation->set_rules('program_id', 'Program', 'callback_check_for_program['.$program_id.']');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('father_name', 'Father Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('whatsapp', 'whatsapp', 'required');
		$this->form_validation->set_rules('address', 'address', 'required');
		$this->form_validation->set_rules('city_id', 'city', 'callback_check_for_program['.$city_id.']');

		if ($this->form_validation->run() == FALSE)
        {
			// $data['prog'] = $this->General_m->show('program');
			$this->load->view('admin/stu_add_a', $data);
			echo 'Form Validation Error';
        }
        else
        {	
        	if($_FILES['image']['name'] != NULL) {
			    $config['upload_path']     = './assets/media/student/';
			    $config['allowed_types']   = 'jpeg|jpg|png';
			    $config['max_size']        = 2050;

			    $this->load->library('upload', $config);
			    $this->upload->do_upload('image');

			    $picture = $this->upload->data()['file_name'];
			}
			else {
				$picture = "";
			} 

			$data = array( 
				'first_name' 	=> $fname,
				'last_name' 	=> $lname,
				'father_name'	=> $faname,
				'address' 		=> $address,
				'whatsapp' 		=> $whatsapp,
				'phone' 		=> $phone,
				'pic' 		 	=> $picture,
				'email' 		=> $email,
				'city_id' 		=> $city_id,
				'password' 		=> $password,
			); 

			$stud_id = $this->General_m->insert_andid($data, 'student');
			
			$enroll_data = array( 
				'program_id' => $program_id, 
				'student_id' => $stud_id, 
			);
			
			$this->General_m->insert($enroll_data, 'stu_enroll');
			
			redirect('admin/student/index');

        }
	}

	public function stu_edit()
	{

	}

	public function stu_delete()
	{
		
	}

}
