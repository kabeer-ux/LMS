<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('General_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['course'] = $this->General_m->show_where('1', 'course', 'active');
		$data['system'] = $this->General_m->show_where('1', 'system', 'active');
		$this->load->view('admin/course_a', $data);
	}

	public function course_add()
	{
		$data['course'] = $this->General_m->show('course');
		$data['system'] = $this->General_m->show_where('1', 'system', 'active');
		$this->load->view('admin/course_add_a', $data);
	}

	public function course_add_do()
	{
		$system_id = $this->input->post('system_id');
		$name = $this->input->post('name');
		$code = $this->input->post('code');

		$this->form_validation->set_rules('system_id', 'System', 'callback_check_for_system['.$system_id.']');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('code', 'Code', 'required');

		if ($this->form_validation->run() == FALSE)
        {
        	$data['system'] = $this->General_m->show_where('1', 'system', 'active');
            $this->load->view('admin/course_add_a', $data);
        }
        else
        {
        	if($_FILES['outline']['name'] != NULL) {
			    $config['upload_path']     = './assets/outline/';
			    $config['allowed_types']   = 'pdf|jpg|png';
			    $config['max_size']        = 2050;

			    $this->load->library('upload', $config);
			    $this->upload->do_upload('outline');

			    $outline_name = $this->upload->data()['file_name'];
			}
			else {
				$outline_name = "";
			}

			$data = array(
					'system_id' => $system_id,
					'name' => $name,
					'code' => $code,
					'outline' => $outline_name,
					'active' => '1'
				);


			$this->General_m->insert($data, 'course');
			redirect('admin/course/index');
			
        }
	}

	public function check_for_system($value)
	{
		if($value == 0) {
			$this->form_validation->set_message('check_for_system', 'Select the system');
			return FALSE;
		}
	}

	public function course_edit($id)
	{
		$data['course'] = $this->General_m->show_where($id,'course','course_id');
		$data['systems'] = $this->General_m->show('system');
		$data['system'] = $this->General_m->show_where('1', 'system', 'active');
		$this->load->view('admin/course_edit_a', $data);
	}

	public function course_edit_do($id)
	{
		$system_id = $this->input->post('system_id');
		$name = $this->input->post('name');
		$code = $this->input->post('code');

		$this->form_validation->set_rules('system_id', 'System', 'callback_check_for_system['.$system_id.']');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('code', 'Code', 'required');

		if ($this->form_validation->run() == FALSE)
        {
        	$data['system'] = $this->General_m->show_where('1', 'system', 'active');
            $this->load->view('admin/course_edit_a', $data);
        }
        else
        {
        	if($_FILES['outline']['name'] != NULL) {
			    $config['upload_path']     = './assets/outline/';
			    $config['allowed_types']   = 'pdf|jpg|png';
			    $config['max_size']        = 2050;

			    $this->load->library('upload', $config);
			    $this->upload->do_upload('outline');

			    $outline_name = $this->upload->data()['file_name'];
			}
			else {
				$outline_name = "";
			}

			$data = array(
					'course_id' => $id,
					'system_id' => $system_id,
					'name' 		=> $name,
					'code' 		=> $code,
					'outline' 	=> $outline_name,
					'active' 	=> '1'
				);

			$this->General_m->update($id, $data,'course', 'course_id');
			redirect('admin/course/index');
			
        }
	}

	public function course_delete($id)
	{
		$this->General_m->delete($id, 'course', 'course_id');
		redirect('admin/course/index');
	}


}
