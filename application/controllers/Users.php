<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->model('Users_Model');
		
		$users = $this->Users_Model->get_all_users();
		print_r($users);
	}
}
