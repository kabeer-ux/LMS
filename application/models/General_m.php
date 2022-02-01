<?php
/**
 * 
 */
class General_m extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}

	public function show_query($query)
	{
		$ans = $this->db->query($query);
		return $ans->result();
	}

	public function show($tbl_name)
	{
		$this->db->select('*');
		$this->db->from($tbl_name);
		return $this->db->get()->result();
	}

	public function show_where($id, $tbl_name, $where)
	{
		$this->db->select('*');
		$this->db->from($tbl_name);
		$this->db->where($where, $id);
		return $this->db->get()->result();
	} 

	public function show_1_join($id, $tbl_name_1, $tbl_name_2, $key, $where)
	{
		$this->db->select('*');
		$this->db->from($tbl_name_1);
		$this->db->join($tbl_name_2, $tbl_name_1.'.'.$key.' = '.$tbl_name_2.'.'.$key);
		$this->db->where($tbl_name_1.'.'.$where, $id);
		return $this->db->get()->result();
	}

	public function show_2_join($id, $tbl_name_1, $tbl_name_2, $key, $where)
	{
		$this->db->select('*');
		$this->db->from($tbl_name_1);
		$this->db->join($tbl_name_2, $tbl_name_1.'.'.$key.' = '.$tbl_name_2.'.'.$key);
		$this->db->where($tbl_name_2.'.'.$where, $id);
		return $this->db->get()->result();
	}

	public function show_1_join_mystar($id, $tbl_name_1, $tbl_name_2, $key, $mystar, $where)
	{
		$this->db->select($mystar);
		$this->db->from($tbl_name_1);
		$this->db->join($tbl_name_2, $tbl_name_1.'.'.$key.' = '.$tbl_name_2.'.'.$key);
		$this->db->where($tbl_name_1.'.'.$where, $id);
		return $this->db->get()->result();
	}

	public function show_2_join_mystar($id, $tbl_name_1, $tbl_name_2, $tbl_name_3, $key, $key1, $mystar, $where)
	{
		$this->db->select($mystar);
		$this->db->from($tbl_name_1);
		$this->db->join($tbl_name_2, $tbl_name_1.'.'.$key.' = '.$tbl_name_2.'.'.$key);
		$this->db->join($tbl_name_3, $tbl_name_2.'.'.$key1.' = '.$tbl_name_3.'.'.$key1);
		$this->db->where($tbl_name_3.'.'.$where, $id);
		return $this->db->get()->result();
	}

	public function insert($value, $tbl_name)
	{
		$this->db->insert($tbl_name, $value);
	}

	public function insert_andid($value, $tbl_name)
	{
		$this->db->insert($tbl_name, $value);
		return $this->db->insert_id();
	}

	public function update($id, $value, $tbl_name, $where)
	{
		$this->db->where($where, $id);
		$this->db->update($tbl_name, $value);
	}

	public function delete($id,$tbl_name, $where)
	{	
		$this->db->where($where, $id);
		$this->db->delete($tbl_name);
	}


}