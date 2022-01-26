<?php
/**
 * 
 */
class Lmsadmin extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
	}

	public function index()
	{
		redirect('admin/Login/index');
	}
}