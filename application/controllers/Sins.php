<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sins extends CI_Controller {

	public function index()
	{
		$this->load->model('Sins_Model');
		
		$userId = $this->input->get('userid');
		$userName = $this->input->get('username');
		
		if(isset($userId)){
			$sins = $this->Sins_Model->getSinsByUserId($userId);
			print_r($sins);
			die();
		}
		
		if(isset($userName)){
			$sins = $this->Sins_Model->getSinsByUserName($userName);
			print_r($sins);
			die();
		}
		
		$sins = $this->Sins_Model->getAllSins();
		print_r($sins);
	}
}
