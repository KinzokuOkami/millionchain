<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	protected $page = 'Dashboard';

	public function index($id = false) {
	
		$data = array(
			'title'				=> $this->page . ' | Million Chain',
			'content'			=> 'admin/dashboard',
			
			'current'			=> $this->page
		);
		$this->load->view('admin/page',$data);
	}
}