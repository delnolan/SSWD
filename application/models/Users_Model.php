<?php 
class Users_Model extends CI_Model {
	
	function get_all_users(){
		
		$users = $this->db->get('users')->result();  
		$users = json_encode($users);
		return $users;
	
	}	

}
?>