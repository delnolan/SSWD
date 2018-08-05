<?php 
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * This file handles all interactions with users
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

/**
 * This class handles all interactions with Users
 *
 * @author     Derek Nolan <derek.nolan@webelevate.ie>
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 */
class Users_Model extends CI_Model {
	
	function get_all_users(){ //This function returns a list of users returning user_id and username
		
		$users = $this->db->get('users')->result();  //Codeigniter function for mySql Select
		$users = json_encode($users); //Convert to json for output
		return $users; //output to controller
	
	}	
	
	function getUsersBySinId($sinId){ //This function returns all users (user_id and username) who have committed this sin (sin_id)
		
		//This gives access to user ids by accessing sins_meta by sin id
		$userIds = $this->db->get_where('sins_meta', array('sin_id' => $sinId))->result();
		
		//An empty array to which we can add our results
		$users = array();
		
		//Below loops through the results to find each user who committed the sin by user id
		foreach($userIds as $user){
			$result = $this->db->get_where('users', array('user_id' => $user->user_id))->row();
			array_push($users,$result); //push to our array for each iteration
		}

		$users = json_encode($users); //convert to json for output
		return $users; //output to controller
		
	}

}
?>