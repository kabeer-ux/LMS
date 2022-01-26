<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('General_m');
	}

	public function index($id=NULL)
	{
		if ($id == 'faculty'){	
			$data['name'] = "List of Faculty Announcement";
			$data['ann'] = $this->General_m->show_where($id, 'announcement', 'audience'); 
		}
		elseif ($id == 'student'){	
			$data['name'] = "List of Students Announcement";
			$data['ann'] = $this->General_m->show_where($id, 'announcement', 'audience'); 
		}
		else{ 
			$data['name'] = "List of All Announcement";
			$data['ann'] = $this->General_m->show('announcement'); 
		}

		$this->load->view('admin/annouce_a', $data);
	}

	public function announce_add_do()
	{
		$audience = $this->input->post('audience');

		$this->form_validation->set_rules('audience', 'audience Name', 'required');

		if($this->form_validation->run() == FALSE) {

			$this->load->view('admin/department_a');
			echo 'Validation Error';

		} else {

			$name = $this->input->post('audience');
			$desc = $this->input->post('desc');

			if($_FILES['media']['name'] != NULL) {
			    $config['upload_path']     = './assets/media/announcement/';
			    $config['allowed_types']   = 'gif|jpeg|jpg|png';
			    $config['max_size']        = 2050;

			    $this->load->library('upload', $config);
			    $this->upload->do_upload('media');

			    $image = $this->upload->data()['file_name'];
			}
			else {
				$image = "";
			} 

			$data = array(
					'audience' => $name,
					'message' => $desc,
					'media' => $image,
					'status' => '1',
				);

			$this->General_m->insert($data, 'announcement');
			redirect('admin/Announcement/index');
		}
	}
}
