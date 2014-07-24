<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	protected $model = 'admins';

	public function index() {
		$data = array();
		$data['user'] = $_POST['user'];
		$data['pass'] = $_POST['pass'];
		
		$error = true;
		$error = $this->validate($data);
		
		if($error == false) {
			header("Location: " . site_url('admin/dashboard'));
			die();
		} else {
			header("Location: " . site_url('admin'));
			die();
		}
	}
	
	public function validate($data) {
		$model = $this->model;
		//Check if user really enters username and password
		if(empty($data['user']) || empty($data['pass'])) $error = true;
		else {
			$this->load->model($model);
			
			$result = $this->$model->getData($data['user']);
			
			if(empty($result)) $error = true;	//username not exist
			else {
				$row = $result[0];
				if(md5($data['pass']) != $row->admin_pass) $error = true;	//Wrong password
				else {
					$this->session->set_userdata('login_state', TRUE);
					$error = false;
				}
			}
		}
		
		return $error;
	}
}
