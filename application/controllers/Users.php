<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index() //Loads on index.php/Users
	{
		$this->load->model('Users_Model'); //Gives us access to User_Model.php classes and functions
		$sinId = $this->input->get('sinid'); //Gets the sin id if it is set using a $_GET request
		
		if(isset($sinId)){ //If sin id is set using a $_GET request then execute this block
			$users = $this->Users_Model->getUsersBySinId($sinId); //Get all users by sin id
			print_r($users); //Output
			die(); //Exit
		}
		
		$users = $this->Users_Model->get_all_users(); //Get all users
		print_r($users); //Output
	}
}
