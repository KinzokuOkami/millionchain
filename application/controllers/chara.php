<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class chara extends CI_Controller {

	public function index()
	{
		$this->load->model('cards');
		
		$data = array(
			'cards_result'		=> $this->cards->getData()
		);
		
		$this->load->view('index',$data);
	}
	
	public function stars($num = false)
	{
		$this->load->model('cards');
		
		$data = array(
			'cards_result'		=> $this->cards->getByStars($num)
		);
		
		$this->load->view('index',$data);
	}
	
	public function color($num = false)
	{
		$this->load->model('cards');
		
		$data = array(
			'cards_result'		=> $this->cards->getByColor($num)
		);
		
		$this->load->view('index',$data);
	}
	
	public function leader($num = false)
	{
		$this->load->model('cards');
		
		$data = array(
			'cards_result'		=> $this->cards->getByLS($num)
		);
		
		$this->load->view('index',$data);
	}
	
	public function skill($num = false)
	{
		$this->load->model('cards');
		
		$data = array(
			'cards_result'		=> $this->cards->getBySkill($num)
		);
		
		$this->load->view('index',$data);
	}
	
	public function hp()
	{
		$this->load->model('cards');
		
		$data = array(
			'cards_result'		=> $this->cards->getByHP()
		);
		
		$this->load->view('index',$data);
	}
	
	public function attack()
	{
		$this->load->model('cards');
		
		$data = array(
			'cards_result'		=> $this->cards->getByAtk()
		);
		
		$this->load->view('index',$data);
	}
	
	public function regeneration()
	{
		$this->load->model('cards');
		
		$data = array(
			'cards_result'		=> $this->cards->getByRegen()
		);
		
		$this->load->view('index',$data);
	}
}
