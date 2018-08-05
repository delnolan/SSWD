<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sins extends CI_Controller {

	public function index() //Loads on index.php/Sins 
	{
		$this->load->model('Sins_Model'); //Loads sins model to give us access to Classes and functions
		
		$userId = $this->input->get('userid'); //Gets the userid if it is set with a $_GET request. ie, index.php/Sins?userid=1
		$userName = $this->input->get('username'); //Gets the username if it is set with a $_GET request. ie, index.php/Sins?username=Mary
		
		if(isset($userId)){ // If $_GET request for userid is set execute this block
			$sins = $this->Sins_Model->getSinsByUserId($userId); //Gets sins by user id
			print_r($sins); //Output
			die(); //exit
		}
		
		if(isset($userName)){// If $_GET request for username is set execute this block
			$sins = $this->Sins_Model->getSinsByUserName($userName); //Gets sins by user name
			print_r($sins); //Output
			die(); //Exit
		}
		
		$sins = $this->Sins_Model->getAllSins(); //Gets all sins
		print_r($sins); //Output
	}
}
