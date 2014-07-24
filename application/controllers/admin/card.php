<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Card extends CI_Controller {

	protected $page = 'Card';
	protected $model = 'cards';
	protected $local = '/millionchain';

	public function index($id = false) {
		$model = $this->model;
		$this->load->model($model);
	
		$data = array(
			'title'				=> $this->page . ' | Million Chain',
			'content'			=> 'admin/common/lists',
			
			'current'			=> $this->page,
			'list'				=> 'admin/' . strtolower($this->page) . '/list-' . strtolower($this->page),
			'addDataLink'		=> 'admin/' . strtolower($this->page) . '/form',
			
			'result'			=> $this->$model->getData($id)
		);
		$this->load->view('admin/page',$data);
	}
	
	public function form($id = false) {
		$model = $this->model;

		if($id != false) {
			//Is Edit Form
			$this->load->model($model);
			$result = $this->$model->getData($id);
			$row = $result[0];
			
			$formAction = 'admin/' . strtolower($this->page) . '/update/' . $id;
			$formType = 'Edit';
		} else {
			//Is Insert Form
			$formAction = 'admin/' . strtolower($this->page) . '/insert';
			$formType = 'Insert';
		}
	
		$data = array(
			'title'				=> $this->page . ' | Million Chain',
			'content'			=> 'admin/common/forms',
			
			'current'			=> $this->page,
			'formType'			=> $formType,
			'form'				=> 'admin/' . strtolower($this->page) . '/form-' . strtolower($this->page),
			'formAction'		=> $formAction,
			'viewListLink'		=> 'admin/' . strtolower($this->page)
		);
		
		//Inputting current data on edit form.
		if($id != false) {
			$data['formNumber'] = $row->card_number;
			$data['formName'] = $row->card_name;
			$data['formPicSmall'] = $row->card_pic_small;
			$data['formPicLarge'] = $row->card_pic_large;
			$data['formStars'] = $row->card_stars;
			$data['formColor'] = $row->card_color;
			$data['formLSType'] = $row->card_ls_type;
			$data['formLSX'] = $row->card_ls_x;
			$data['formLSY'] = $row->card_ls_y;
			$data['formLSZ'] = $row->card_ls_z;
			$data['formSkillType'] = $row->card_skill_type;
			$data['formSkillX'] = $row->card_skill_x;
			$data['formSkillY'] = $row->card_skill_y;
			$data['formSkillZ'] = $row->card_skill_z;
			$data['formAtk'] = $row->card_atk;
			$data['formMaxAtk'] = $row->card_max_atk;
			$data['formHp'] = $row->card_hp;
			$data['formMaxHp'] = $row->card_max_hp;
			$data['formHeal'] = $row->card_heal;
			$data['formMaxHeal'] = $row->card_max_heal;
		}
		
		$this->load->view('admin/page',$data);
	}

	public function insert() {
		$model = $this->model;

		//Caching data from post method
		$data = array();
		$data['number'] = htmlspecialchars($_POST['number'],ENT_QUOTES);
		$data['name'] = htmlspecialchars($_POST['name'],ENT_QUOTES);
		$data['pic_small'] = $_POST['pic_small'];
		$data['pic_large'] = $_POST['pic_large'];
		$data['color'] = $_POST['color'];
		$data['stars'] = $_POST['stars'];
		$data['ls_type'] = $_POST['ls_type'];
		$data['ls_x'] = htmlspecialchars($_POST['ls_x'],ENT_QUOTES);
		$data['ls_y'] = htmlspecialchars($_POST['ls_y'],ENT_QUOTES);
		$data['ls_z'] = htmlspecialchars($_POST['ls_z'],ENT_QUOTES);
		$data['skill_type'] = $_POST['skill_type'];
		$data['skill_x'] = htmlspecialchars($_POST['skill_x'],ENT_QUOTES);
		$data['skill_y'] = htmlspecialchars($_POST['skill_y'],ENT_QUOTES);
		$data['skill_z'] = htmlspecialchars($_POST['skill_z'],ENT_QUOTES);
		$data['atk'] = $_POST['atk'];
		$data['max_atk'] = $_POST['max_atk'];
		$data['hp'] = $_POST['hp'];
		$data['max_hp'] = $_POST['max_hp'];
		$data['heal'] = $_POST['heal'];
		$data['max_heal'] = $_POST['max_heal'];
		
		$error = $this->validate($data);
		
		if(!$error) {
			//Load model
			$this->load->model($model);
			$this->$model->insert($data);
		
			//View
			header("Location: " . site_url('admin/' . strtolower($this->page)));
			die();
		} else {
			//View
			header("Location: " . site_url('admin/' . strtolower($this->page) . '/form'));
			die();
		}
	}
	
	public function update($id) {
		$model = $this->model;

		//Caching data from post method
		$data = array();
		$data['number'] = htmlspecialchars($_POST['number'],ENT_QUOTES);
		$data['name'] = htmlspecialchars($_POST['name'],ENT_QUOTES);
		$data['pic_small'] = $_POST['pic_small'];
		$data['pic_large'] = $_POST['pic_large'];
		$data['color'] = $_POST['color'];
		$data['stars'] = $_POST['stars'];
		$data['ls_type'] = $_POST['ls_type'];
		$data['ls_x'] = htmlspecialchars($_POST['ls_x'],ENT_QUOTES);
		$data['ls_y'] = htmlspecialchars($_POST['ls_y'],ENT_QUOTES);
		$data['ls_z'] = htmlspecialchars($_POST['ls_z'],ENT_QUOTES);
		$data['skill_type'] = $_POST['skill_type'];
		$data['skill_x'] = htmlspecialchars($_POST['skill_x'],ENT_QUOTES);
		$data['skill_y'] = htmlspecialchars($_POST['skill_y'],ENT_QUOTES);
		$data['skill_z'] = htmlspecialchars($_POST['skill_z'],ENT_QUOTES);
		$data['atk'] = $_POST['atk'];
		$data['max_atk'] = $_POST['max_atk'];
		$data['hp'] = $_POST['hp'];
		$data['max_hp'] = $_POST['max_hp'];
		$data['heal'] = $_POST['heal'];
		$data['max_heal'] = $_POST['max_heal'];
		
		$error = $this->validate($data);
		
		if(!$error) {
			//Load model
			$this->load->model($model);

			//Add prefix to old picture (if exists) with del_ and move it to subfolder /del/
			//Getting current data
			$result = $this->$model->getData($id);
			$row = $result[0];
			
			if($row->card_pic_small != $data['pic_small'] && !empty($row->card_pic_small)) {
				$filepath = $_SERVER['DOCUMENT_ROOT'] . $this->local . '/res/images/' . strtolower($this->page) . '/small/';
				rename($filepath . $row->card_pic_small,$filepath . 'del_' . $row->card_pic_small);
			}
			
			if($row->card_pic_large != $data['pic_large'] && !empty($row->card_pic_large)) {
				$filepath = $_SERVER['DOCUMENT_ROOT'] . $this->local . '/res/images/' . strtolower($this->page) . '/large/';
				rename($filepath . $row->card_pic_large,$filepath . 'del_' . $row->card_pic_large);
			}

			$this->$model->update($id,$data);
		
			//View
			header("Location: " . site_url('admin/' . strtolower($this->page)));
			die();
		} else {
			//View
			header("Location: " . site_url('admin/' . strtolower($this->page) . '/form/' . $id));
			die();
		}
	}
	
	public function delete($id) {
		$model = $this->model;

        $this->load->model($model);
		$this->$model->delete($id);
		
		header("Location: " . site_url('admin/' . strtolower($this->page)));
		die();
	}
	
	public function validate($data) {
		$error = false;
		
		/*if(empty($data['number'])) $error = true;
		if(empty($data['pic_small'])) $error = true;
		if(empty($data['pic_large'])) $error = true;
		if(empty($data['stars'])) $error = true;
		if(empty($data['color'])) $error = true;
		if(empty($data['ls'])) $error = true;
		if(empty($data['skill'])) $error = true;*/
		return $error;
	}


	public function check_exist() {
		$targetFolder = $this->local . '/res/images/' . strtolower($this->page) . '/small'; // Relative to the root and should match the upload folder in the uploader script
		
		$fileParts = pathinfo($_FILES['Filedata']['name']);
		
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $targetFolder . '/' . $_POST['savefile-time'] . '.' . $fileParts['extension'])) {
			echo 1;
		} else {
			echo 0;
		}
	}
	
	public function upload() {
		/*
		UploadiFive
		Copyright (c) 2012 Reactive Apps, Ronnie Garcia
		*/
 
		// Set the uplaod directory
		$uploadDir = $this->local . '/res/images/' . strtolower($this->page) . '/small/';

		// Set the allowed file extensions
		$fileTypes = array('jpg', 'jpeg', 'png'); // Allowed file extensions

		$verifyToken = md5('unique_salt' . $_POST['timestamp']);

		if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
			$tempFile   = $_FILES['Filedata']['tmp_name'];
			$uploadDir  = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;
			
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			$targetFile = $uploadDir . $_POST['savefile-time'] . '.' . $fileParts['extension'];

			// Validate the filetype
			if (in_array(strtolower($fileParts['extension']), $fileTypes)) {

				// Save the file
				move_uploaded_file($tempFile, $targetFile);
				echo 1;

			} else {

				// The file type wasn't allowed
				echo 'Invalid file type.';

			}
		}
	}
	
	public function check_exist_c() {
		$targetFolder = $this->local . '/res/images/' . strtolower($this->page) . '/large'; // Relative to the root and should match the upload folder in the uploader script
		
		$fileParts = pathinfo($_FILES['Filedata']['name']);
		
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $targetFolder . '/' . $_POST['savefile-time'] . '.' . $fileParts['extension'])) {
			echo 1;
		} else {
			echo 0;
		}
	}
	
	public function upload_c() {
		/*
		UploadiFive
		Copyright (c) 2012 Reactive Apps, Ronnie Garcia
		*/
 
		// Set the uplaod directory
		$uploadDir = $this->local . '/res/images/' . strtolower($this->page) . '/large/';

		// Set the allowed file extensions
		$fileTypes = array('jpg', 'jpeg', 'png'); // Allowed file extensions

		$verifyToken = md5('unique_salt' . $_POST['timestamp']);

		if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
			$tempFile   = $_FILES['Filedata']['tmp_name'];
			$uploadDir  = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;
			
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			$targetFile = $uploadDir . $_POST['savefile-time'] . '.' . $fileParts['extension'];

			// Validate the filetype
			if (in_array(strtolower($fileParts['extension']), $fileTypes)) {

				// Save the file
				move_uploaded_file($tempFile, $targetFile);
				echo 1;

			} else {

				// The file type wasn't allowed
				echo 'Invalid file type.';

			}
		}
	}
}