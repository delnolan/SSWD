<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->model('Users_Model');
		$sinId = $this->input->get('sinid');
		
		if(isset($sinId)){
			$users = $this->Users_Model->getUsersBySinId($sinId);
			print_r($users);
			die();
		}
		
		$users = $this->Users_Model->get_all_users();
		print_r($users);
	}
}
