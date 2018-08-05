<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * This file is the controller file for Users
 *
 * PHP version 5.6.30
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @author     Derek Nolan <derek.nolan@webelevate.ie>
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 */


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
