<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * This file is the controller file for Sins
 *
 * PHP version 5
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

/*
* Place includes, constant defines and $_GLOBAL settings here.
* Make sure they have appropriate docblocks to avoid phpDocumentor
* construing they are documented by the page-level docblock.
*/


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
