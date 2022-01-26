<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Login_m');
		$this->load->library('session');
	}

	public function index()
	{
		// $pas = "admin123";
		// echo md5($pas);
		// exit;
		$this->load->view('login_v');
	}

	public function check_login()
	{
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$actor = $this->input->post('actor');

		if($actor == 'faculty') {
			$data['check'] = $this->Login_m->flogin($user, $pass);
		} else if($actor == 'student') {
			$data['check'] = $this->Login_m->slogin($user, $pass);
		} else {
			echo "Select the option";
			// exit;
		}

		$record_found = count($data['check']);

		if ($record_found == 1)
		{
			if($actor == 'faculty') {
				$id = $data['check'][0]->faculty_id;
				$this->session->set_userdata('actor', 'faculty');
				$this->session->set_userdata('id', $id);
				redirect('faculty/Home/index');
			} else if ($actor == 'student') {
				$id = $data['check'][0]->student_id;
				$this->session->set_userdata('actor', 'student');
				$this->session->set_userdata('id', $id);
				redirect('student/Home/index');
			}
			else {
				echo "Select the option ";
			}
		} else {
			echo "Invalid Username or Password";
		}

	}

	public function index_n($id=NULL)
	{
		$this->session->unset_userdata('hodid');

		if($id != NULL) {
			$this->session->set_userdata('id', $id);
			redirect('faculty/Home/index'); 
		}else {
			echo 'Error'; 
		}
	}

}
