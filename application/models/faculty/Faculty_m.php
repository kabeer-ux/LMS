<?php
/**
 * 
 */
class Faculty_m extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}

	public function show_announcement()
	{
		//$this->db->query('SELECT * FROM announcement WHERE audience = all OR audience = faculty AND status = 1 ');
		$this->db->select('*');
		$this->db->from('announcement');
		$this->db->where('status', '1');
		$this->db->where('audience', 'all');
		$this->db->or_where('audience', 'faculty');
		return $this->db->get()->result();

	}

}

