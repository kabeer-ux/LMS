<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('General_m');
	}

	public function index($id=NULL, $dep_name=NULL)
	{
		//show_1_join($id, $tbl_name_1, $tbl_name_2, $key, $where)

		$data['dep'] = $this->General_m->show('department');
		if($id == NULL) {
			$data['fac'] = $this->General_m->show_query('SELECT *, faculty.name as fname FROM faculty');
		} else {
			$data['fac'] = $this->General_m->show_query("SELECT *, department.name as dname, faculty.name as fname FROM department LEFT JOIN faculty ON department.department_id = faculty.department_id WHERE faculty.department_id = '$id'");
		}
		if($dep_name == NULL) {
			$data['dep_name'] = "All Department Faculty Member"; 
		} else {
			$data['dep_name'] = $dep_name; 
		}
		
		// echo "<pre>";
		// var_dump($data['fac']);
		// exit;
		$this->load->view('admin/faculty_a', $data);
	}

	public function fac_show($id)
	{
		echo  $id;
	}

	public function fac_add()
	{
		$data['dep'] = $this->General_m->show('department');
		$this->load->view('admin/faculty_add_a', $data);
	}

	public function fac_add_do()
	{
		$config['upload_path']   = './assets/media/faculty/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        $this->upload->do_upload('pic');
        $pic_data = $this->upload->data();
        $pic_name = $pic_data['file_name'];

        // echo $this->upload->display_errors();
        // echo "<pre>";
        // var_dump($pic_data);
        // exit;


		$name     = $this->input->post('name');
		$did      = $this->input->post('did');
		$address  = $this->input->post('address');
		$cnic     = $this->input->post('cnic');
		$dob      = $this->input->post('dob');
		$gender   = $this->input->post('gender');
		$phone    = $this->input->post('phone');
		$email    = $this->input->post('email');
		$status   = $this->input->post('status');
		$notes    = $this->input->post('notes');
		$password = md5($email);

		$data = array(
			'name' 			=> $name,
			'department_id' => $did,
			'status'		=> $status,
			'dob' 			=> $dob,
			'cnic' 			=> $cnic,
			'gender' 		=> $gender,
			'notes' 		=> $notes,
			'active' 		=> '1',
			'address' 		=> $address,
			'pic' 			=> $pic_name,
			'phone' 		=> $phone,
			'email' 		=> $email,
			'password' 		=> $password
		);

		$this->General_m->insert($data, 'faculty');
		redirect('admin/faculty/index');
	}

	public function fac_edit($id)
	{
		$data['show'] = $this->General_m->show_where($id, 'faculty', 'faculty_id');
		$data['dep'] = $this->General_m->show('department');
		$this->load->view('admin/faculty_edit_a', $data);
	}

	public function update_fac_do($id)
	{
		// if($this->form_validation->run() == TRUE) { 
			$old_pic = $this->input->post('old_pic');
			$new_pic = $_FILES['pic']['name'];

			if ($new_pic == TRUE) 
			{	
				$update_pic = $_FILES['pic']['name'];
				$config = [
					'upload_path'    =>  './assets/media/faculty/',
					'allowed_types'  =>  'gif|jpg|png',
					'file_name'      =>  $update_pic,
				];

		        $this->load->library('upload', $config);
		        if ($this->upload->do_upload('pic')) {
		        	if (file_exists('../assets/media/faculty/'.$old_pic)) 
		        	{
		        		unlink('../assets/media/faculty/'.$old_pic);
		        	}
		        }
			}else{
				$update_pic = $old_pic;
			}

			$name     = $this->input->post('name');
			$did      = $this->input->post('did');
			$address  = $this->input->post('address');
			$cnic     = $this->input->post('cnic');
			$dob      = $this->input->post('dob');
			$gender   = $this->input->post('gender');
			$phone    = $this->input->post('phone');
			$email    = $this->input->post('email');
			$status   = $this->input->post('status');
			$notes    = $this->input->post('notes');

			$data = array(
				'name' 			=> $name,
				'department_id' => $did,
				'status'		=> $status,
				'dob' 			=> $dob,
				'cnic' 			=> $cnic,
				'gender' 		=> $gender,
				'notes' 		=> $notes,
				'active' 		=> '1',
				'address' 		=> $address,
				'pic' 			=> $update_pic,
				'phone' 		=> $phone,
				'email' 		=> $email
			);

			// echo '<pre>';
			// var_dump($data);

			$this->General_m->update($id, $data,'faculty', 'faculty_id');
			redirect('admin/Faculty/index');
		//}
	}
}
