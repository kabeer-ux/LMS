<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('General_m');
	}

	public function index()
	{
		$data['show_hod'] = $this->General_m->show('hod');
		$data['show_fac'] = $this->General_m->show('faculty');
		$data['show'] = $this->General_m->show('department');
		$this->load->view('admin/department_a', $data);
	}

	public function dep_add()
	{
		$this->form_validation->set_rules('name', 'Deparment Name', 'required');
		$this->form_validation->set_rules('sname', 'Deparment Short/Abbreviated Name', 'required');

		if($this->form_validation->run() == TRUE) {
			
			$name = $this->input->post('name');
			$sname = $this->input->post('sname');
			$desc = $this->input->post('desc');

			$config['upload_path']   = './assets/media/pics/';
	        $config['allowed_types'] = 'gif|jpg|png';

	        $this->load->library('upload', $config);

	        $this->upload->do_upload('icon');
	        $pic_data = $this->upload->data();
	        $icon_name = $pic_data['file_name'];

			$data = array(
					'name' => $name,
					'sname' => $sname,
					'description' => $desc,
					'active' => '1',
					'icon' => $icon_name
				); 

			$this->General_m->insert($data, 'department');
			redirect('admin/Department/index');

		} else {
			$this->load->view('admin/department_a');
		}
	}
		
	public function dep_edit($id)
	{	
		$data['show'] = $this->General_m->show_where($id, 'department', 'department_id');
		$this->load->view('admin/dep_edit_a',$data);
	}

	public function update_department_do($id)
	{
		$this->form_validation->set_rules('name', 'Deparment Name', 'required');
		$this->form_validation->set_rules('sname', 'Deparment Short/Abbreviated Name', 'required');

		if($this->form_validation->run() == TRUE) { 

			$old_icon = $this->input->post('old_icon');
			$new_icon = $_FILES['icon']['name'];

			if ($new_icon == TRUE) 
			{
				$update_icon = $_FILES['icon']['name'];
				$config = [
					'upload_path'    =>  './assets/media/pics/',
					'allowed_types'  =>  'gif|jpg|png',
					'file_name'      =>  $update_icon,
				];

		        $this->load->library('upload', $config);
		        if ($this->upload->do_upload('icon')) {
		        	if (file_exists('../assets/media/pics/'.$old_icon)) 
		        	{
		        		unlink('../assets/media/pics/'.$old_icon);
		        	}
		        }
			}else{
				$update_icon = $old_icon;
			}

			$name = $this->input->post('name');
			$sname = $this->input->post('sname');
			$desc = $this->input->post('desc');

			$data = array(
					'department_id' 	=> $id,
					'name'				=> $name,
					'sname' 			=> $sname,
					'description' 		=> $desc,
					'icon' 				=> $update_icon,
					'active' 			=> '1',
				);

			// echo '<pre>';
			// var_dump($data);

			$this->General_m->update($id, $data,'department', 'department_id');
			redirect('admin/Department/index');
		}
	}
}
