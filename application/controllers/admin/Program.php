<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller {

	public function __construct()	
	{
		parent:: __construct();
		$this->load->model('General_m');
	}

	public function index($id=NULL, $prog_name=NULL)
	{
		if($prog_name == NULL) {
			$data['prog_name'] = "List of All Program"; 
		} else {
			$data['prog_name'] = $prog_name; 
		}

		if($id != NULL){
			$data['show'] = $this->General_m->show_where($id, 'program', 'department_id');
			$data['show_sys'] = $this->General_m->show('system'); 
		}else{
			$data['show'] = $this->General_m->show('program');
			$data['show_sys'] = $this->General_m->show('system');
		}
		
		$data['show_dep'] = $this->General_m->show('department'); 
		$this->load->view('admin/program_a', $data); 
	}

	public function add_program_do()
	{ 
		$depid = $this->input->post('depid');
		$sysid = $this->input->post('sysid');

		$this->form_validation->set_rules('name', 'Program Name', 'required');
		$this->form_validation->set_rules('sname', 'Program Short/Abbreviated Name', 'required');
		$this->form_validation->set_rules('depid', 'Department', 'callback_check_depid[$depid]');
		$this->form_validation->set_rules('sysid', 'System', 'callback_check_sysid[$sysid]');


		if($this->form_validation->run() == TRUE) { 
			$name = $this->input->post('name');
			$sname = $this->input->post('sname');
			$desc = $this->input->post('desc');

			$data = array(
					'department_id' 	=> $depid,
					'system_id' 		=> $sysid,
					'name'				=> $name,
					'sname' 			=> $sname,
					'description' 		=> $desc,
					'active' 			=> '1',
				);


			$this->General_m->insert($data, 'program');
			redirect('admin/Program/index');

		} else {
			$data['show'] = $this->General_m->show('program');
			$data['show_dep'] = $this->General_m->show('department');
			$data['show_sys'] = $this->General_m->show('system');
			$this->load->view('admin/program_a', $data);
		}
	}

	public function check_depid($depid)
	{
		if($depid == 0) {
			$this->form_validation->set_message('check_depid', 'Select the Department');
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
		
	public function program_edit($id)
	{
		$data['showw'] = $this->General_m->show_where($id,'program','program_id');
		$data['show_dep'] = $this->General_m->show('department');
		$data['show_sys'] = $this->General_m->show('system');
		$this->load->view('admin/program_edit_a',$data);
	}

	public function update_program_do($id){
		$depid = $this->input->post('depid');
		$sysid = $this->input->post('sysid');

		$this->form_validation->set_rules('name', 'Program Name', 'required');
		$this->form_validation->set_rules('sname', 'Program Short/Abbreviated Name', 'required');
		$this->form_validation->set_rules('depid', 'Department', 'callback_check_depid[$depid]');
		$this->form_validation->set_rules('sysid', 'System', 'callback_check_sysid[$sysid]');


		if($this->form_validation->run() == TRUE) { 
			$name = $this->input->post('name');
			$sname = $this->input->post('sname');
			$desc = $this->input->post('desc');

			$data = array(
					'program_id'		=> $id,
					'department_id' 	=> $depid,
					'system_id' 		=> $sysid,
					'name'				=> $name,
					'sname' 			=> $sname,
					'description' 		=> $desc,
					'active' 			=> '1',
				);

			echo '<pre>';
			var_dump($data);


			$this->General_m->update($id, $data,'program', 'program_id');
			redirect('admin/Program/index');

		} else {
			$data['show'] = $this->General_m->show('program');
			$data['show_dep'] = $this->General_m->show('department');
			$data['show_sys'] = $this->General_m->show('system');
			$this->load->view('admin/program_edit/'.$id, $data);
		}
	}

	public function program_delete($id)
	{
		$this->General_m->delete($id, 'program', 'program_id');
		redirect('admin/Program/index');
	}
}
