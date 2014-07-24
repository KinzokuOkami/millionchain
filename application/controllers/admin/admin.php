<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	protected $page = 'Admin';

	public function index()	{
	
		$data = array(
			'title'				=> $this->page . ' | Million Chain',
			'content'			=> 'admin/login',
			
			'current'			=> $this->page
		);

		$this->load->view('admin/page',$data);
	}
}
