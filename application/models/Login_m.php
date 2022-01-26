<?php
/**
 * 
 */
class Login_m extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}

	public function flogin($user, $pass)
	{
		$md5 = md5($pass);

		$this->db->select('*');
		$this->db->from('faculty');
		$this->db->where('email', $user);
		$this->db->where('password', $md5);
		return $this->db->get()->result();
	}

	public function slogin($user, $pass)
	{
		$md5 = md5($pass);

		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('email', $user);
		$this->db->where('password', $md5);
		return $this->db->get()->result();
	}

	public function hodlogin($user, $pass)
	{
		$md5 = md5($pass);

		$this->db->select('*');
		$this->db->from('hod');
		$this->db->join('faculty', 'hod.faculty_id = faculty.faculty_id');
		$this->db->where('faculty.email', $user);
		$this->db->where('hod.password', $md5);
		return $this->db->get()->result();
	}

}

